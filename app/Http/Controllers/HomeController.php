<?php

namespace App\Http\Controllers;

use App\ApprovedParticipant;
use App\DeclinedParticipants;
use App\Http\Requests\AddRequest;
use App\Imei;
use App\MistakeParticipants;
use GuzzleHttp\Client;
use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use ElForastero\Transliterate\TransliterationFacade;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function dash($string)
	{
		return str_replace(' ','_', TransliterationFacade::make($string));
	}

	public function index(Request $request)
	{
		$participants = Participant::paginate(150);
		$approved = ApprovedParticipant::paginate(150);
		$declined = DeclinedParticipants::paginate(150);
		$mistakes = MistakeParticipants::paginate(150);

		$allRegistered = count(Participant::all());
		$allDeclined = count(DeclinedParticipants::all());
		$allMistakes = count(MistakeParticipants::all());
		$allApproved = count(ApprovedParticipant::all());

		$count = $allApproved+$allDeclined+$allMistakes+$allRegistered;

		if ($request->ajax()) {

			if($request->id === 'registered')
			{
				return view('tables.registered',['participants' => $participants])->render();
			}
			elseif($request->id === 'approved')
			{
				return view('tables.approved',['approved' => $approved])->render();
			}
			elseif($request->id === 'mistakes')
			{
				return view('tables.mistakes',['mistakes' => $mistakes])->render();
			}
			elseif($request->id === 'declined')
			{
				return view('tables.declined',['declined' => $declined])->render();
			}
			else {
				return view('tables.tabs',['participants' => $participants, 'approved' => $approved, 'mistakes' => $mistakes, 'declined' => $declined])->render();
			}

		}
		return view('home', compact('participants', 'approved', 'declined', 'mistakes', 'allRegistered','allApproved', 'allMistakes', 'allDeclined','count'));
	}

	public function open(Request $request)
	{
		$participant = Participant::whereId($request->id)->first();

		return response()->json(['src' => $participant->directory.'/'.$participant->photo, 'imei' => $participant->imei], Response::HTTP_OK);
	}

	public function mistakes(Request $request)
	{
		$participant = MistakeParticipants::whereId($request->mistakes)->first();

		return response()->json(['src' => 'images/mistakes/'.$participant->directory.'/'.$participant->photo, 'imei' => $participant->imei_one."\n\n".$participant->imei_two], Response::HTTP_OK);
	}

	public function declined(Request $request)
	{
		$participant = DeclinedParticipants::whereId($request->declined)->first();

		return response()->json(['src' => 'images/declined/'.$participant->directory.'/'.$participant->photo, 'imei' => $participant->imei], Response::HTTP_OK);
	}

	public function approve(Request $request)
	{
		$participant = Participant::whereId($request->id)->first();

		ApprovedParticipant::create([
			'name' => $participant->name,
			'phone' => $participant->phone,
			'email' => $participant->email,
			'address' => $participant->address,
			'imei' => $participant->imei,
			'photo' => $participant->photo,
			'moderator' => Auth::user()->name
		]);

		$approved = DB::table('approved_participants')->latest()->limit(1)->first();

		if ($approved->id < 10) {
			DB::table('approved_participants')->whereRaw('id = '.$approved->id.'')->update(['number' => '0000'.$approved->id]);
		}
		if ($approved->id > 9 && $approved->id <100 ) {
			DB::table('approved_participants')->whereRaw('id = '.$approved->id.'')->update(['number' => '000'.$approved->id]);
		}
		if ($approved->id > 99 && $approved->id < 1000 ) {
			DB::table('approved_participants')->whereRaw('id = '.$approved->id.'')->update(['number' => '00'.$approved->id]);
		}
		if ($approved->id > 999 && $approved->id < 10000 ) {
			DB::table('approved_participants')->whereRaw('id = '.$approved->id.'')->update(['number' => '0'.$approved->id]);
		}
		if ($approved->id > 9999 && $approved->id < 100000 ) {
			DB::table('approved_participants')->whereRaw('id = '.$approved->id.'')->update(['number' => $approved->id]);
		}

		Storage::disk('public')->move('images/'.$participant->directory.'/'.$participant->photo, 'images/approved/'.$approved->directory.'/'.$approved->photo);
		Storage::disk('public')->deleteDirectory('images/'.$participant->directory);
		$participant->delete();

		$approved = DB::table('approved_participants')->latest()->limit(1)->first();

		$phone = str_replace('+','', $approved->phone);
		$message = 'Спасибо за ожидание! Ваш код участника '.$approved->number.'. Даты розыгрышей и результаты смотрите на videtbolshe.by. Желаем удачи!';
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'http://api.rocketsms.by/json/send');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "username=101520868&password=ghjcgtrnghtcc&phone=".$phone."&text=".$message."&sender=videtbolshe");

		$result = @json_decode(curl_exec($curl), true);
		if ($result && isset($result['id'])) {

			DB::table('approved_participants')->whereRaw('id = '.$approved->id.'')->update(['status' => $result['id']]);

			return response()->json(['success' => 'Cообщение '.$approved->name.' было успешно отправлено']);
		} elseif ($result && isset($result['error'])) {
			return response()->json(['error' => $result['error']]);
		} else {
			return response()->json(['service' => 'Произошла ошибка сервиса']);
		}
	}

	public function decline(Request $request)
	{
		$declined = Participant::whereId($request->id)->first();

		$phone = str_replace('+','', $declined->phone);

		switch ($request->reason)
		{
			case '1':
				$message = 'Ваша заявка не обработана: '.$request->custom_reason.'.';
				break;
			case '2':
				$message = 'Ваша заявка не обработана: в гарантийном талоне отсутствует печать продавца. Пожалуйста, зарегистрируйтесь с правильным фото на videtbolshe.by еще раз.';
				break;
			case '3':
				$message = 'Ваша заявка не обработана: в гарантийном талоне не указан IMEI смартфона. Пожалуйста, зарегистрируйтесь с правильным фото на videtbolshe.by еще раз.';
				break;
			case '4':
				$message = 'Ваша заявка не обработана: в гарантийном талоне не указана модель смартфона. Пожалуйста, зарегистрируйтесь с правильным фото на videtbolshe.by еще раз.';
				break;
			case '5':
				$message = 'Ваша заявка не обработана: в гарантийном талоне не указано место продажи. Пожалуйста, зарегистрируйтесь с правильным фото на videtbolshe.by еще раз.';
				break;
			case '6':
				$message = 'Ваша заявка не обработана: в гарантийном талоне не указана дата продажи. Пожалуйста, зарегистрируйтесь с правильным фото на videtbolshe.by еще раз.';
				break;
			case '7':
				$message = 'Ваша заявка не обработана: загруженное фото чека / гарантийного талона нечеткое. Пожалуйста, зарегистрируйтесь с правильным фото на videtbolshe.by еще раз.';
				break;
			case '8':
				$message = 'Ваша заявка не обработана: на загруженном фото чека не видно даты продажи смартфона. Пожалуйста, зарегистрируйтесь с правильным фото на videtbolshe.by еще раз.';
				break;
			case '9':
				$message = 'В рекламной игре "Вокруг света с Huawei" участвуют смартфоны, приобретенные с 24 августа по 30 сентября 2018 года. Нам жаль, но ваш смартфон был приобретен ранее. Следите за нашими новыми акциями в социальных сетях vk.com/huaweimobileby';
				break;
			case '10':
				$message = 'В рекламной игре "Вокруг света с Huawei" участвуют смартфоны, приобретенные в салонах наших партнеров. Нам жаль, но ваш смартфон был приобретен не у партнера. Следите за новыми акциями в социальных сетях vk.com/huaweimobileby';
				break;
			case '11':
				$message = 'Ваша заявка не обработана: на фото не гарантийный талон / чек. Пожалуйста, зарегистрируйтесь с правильным фото на videtbolshe.by еще раз.';
				break;
			case '12':
				$message = 'Ваша заявка не обработана: гарантийный талон не заполнен. Пожалуйста, зарегистрируйтесь с правильным фото на videtbolshe.by еще раз.';
				break;

		}

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'http://api.rocketsms.by/json/send');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "username=101520868&password=ghjcgtrnghtcc&phone=".$phone."&text=".$message."&sender=videtbolshe");

		$result = @json_decode(curl_exec($curl), true);
		if ($result && isset($result['id'])) {
			switch ($request->reason)
			{
				case '1':
					DB::table( 'imeis' )->whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->update( [ 'status' => 'active' ] );
					$imeis = Imei::whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->first();

					MistakeParticipants::create([
						'name' => $declined->name,
						'phone' => $declined->phone,
						'email' => $declined->email,
						'address' => $declined->address,
						'imei_one' => $imeis->imei_one,
						'imei_two' => $imeis->imei_two,
						'photo' => $declined->photo,
						'directory' => $declined->directory,
						'error' => $request->custom_reason,
						'moderator' => Auth::user()->name
					]);

					Storage::disk('public')->move('images/'.$declined->directory.'/'.$declined->photo, 'images/mistakes/'.$declined->directory.'/'.$declined->photo);
					Storage::disk('public')->deleteDirectory('images/'.$declined->directory);

					$declined->delete();

					break;
				case '2':
					DB::table( 'imeis' )->whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->update( [ 'status' => 'active' ] );
					$imeis = Imei::whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->first();

					MistakeParticipants::create([
						'name' => $declined->name,
						'phone' => $declined->phone,
						'email' => $declined->email,
						'address' => $declined->address,
						'imei_one' => $imeis->imei_one,
						'imei_two' => $imeis->imei_two,
						'photo' => $declined->photo,
						'directory' => $declined->directory,
						'error' => 'в гарантийном талоне отсутствует печать продавца',
						'moderator' => Auth::user()->name
					]);

					Storage::disk('public')->move('images/'.$declined->directory.'/'.$declined->photo, 'images/mistakes/'.$declined->directory.'/'.$declined->photo);
					Storage::disk('public')->deleteDirectory('images/'.$declined->directory);

					$declined->delete();
					break;
				case '3':
					DB::table( 'imeis' )->whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->update( [ 'status' => 'active' ] );
					$imeis = Imei::whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->first();

					MistakeParticipants::create([
						'name' => $declined->name,
						'phone' => $declined->phone,
						'email' => $declined->email,
						'address' => $declined->address,
						'imei_one' => $imeis->imei_one,
						'imei_two' => $imeis->imei_two,
						'photo' => $declined->photo,
						'directory' => $declined->directory,
						'error' => 'в гарантийном талоне не указан IMEI смартфона',
						'moderator' => Auth::user()->name
					]);

					Storage::disk('public')->move('images/'.$declined->directory.'/'.$declined->photo, 'images/mistakes/'.$declined->directory.'/'.$declined->photo);
					Storage::disk('public')->deleteDirectory('images/'.$declined->directory);

					$declined->delete();
					break;
				case '4':
					DB::table( 'imeis' )->whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->update( [ 'status' => 'active' ] );
					$imeis = Imei::whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->first();

					MistakeParticipants::create([
						'name' => $declined->name,
						'phone' => $declined->phone,
						'email' => $declined->email,
						'address' => $declined->address,
						'imei_one' => $imeis->imei_one,
						'imei_two' => $imeis->imei_two,
						'photo' => $declined->photo,
						'directory' => $declined->directory,
						'error' => 'в гарантийном талоне не указана модель смартфона',
						'moderator' => Auth::user()->name
					]);

					Storage::disk('public')->move('images/'.$declined->directory.'/'.$declined->photo, 'images/mistakes/'.$declined->directory.'/'.$declined->photo);
					Storage::disk('public')->deleteDirectory('images/'.$declined->directory);

					$declined->delete();
					break;
				case '5':
					DB::table( 'imeis' )->whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->update( [ 'status' => 'active' ] );
					$imeis = Imei::whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->first();

					MistakeParticipants::create([
						'name' => $declined->name,
						'phone' => $declined->phone,
						'email' => $declined->email,
						'address' => $declined->address,
						'imei_one' => $imeis->imei_one,
						'imei_two' => $imeis->imei_two,
						'photo' => $declined->photo,
						'directory' => $declined->directory,
						'error' => 'в гарантийном талоне не указано место продажи',
						'moderator' => Auth::user()->name
					]);

					Storage::disk('public')->move('images/'.$declined->directory.'/'.$declined->photo, 'images/mistakes/'.$declined->directory.'/'.$declined->photo);
					Storage::disk('public')->deleteDirectory('images/'.$declined->directory);

					$declined->delete();
					break;
				case '6':
					DB::table( 'imeis' )->whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->update( [ 'status' => 'active' ] );
					$imeis = Imei::whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->first();

					MistakeParticipants::create([
						'name' => $declined->name,
						'phone' => $declined->phone,
						'email' => $declined->email,
						'address' => $declined->address,
						'imei_one' => $imeis->imei_one,
						'imei_two' => $imeis->imei_two,
						'photo' => $declined->photo,
						'directory' => $declined->directory,
						'error' => 'в гарантийном талоне не указана дата продажи',
						'moderator' => Auth::user()->name
					]);

					Storage::disk('public')->move('images/'.$declined->directory.'/'.$declined->photo, 'images/mistakes/'.$declined->directory.'/'.$declined->photo);
					Storage::disk('public')->deleteDirectory('images/'.$declined->directory);

					$declined->delete();
					break;
				case '7':
					DB::table( 'imeis' )->whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->update( [ 'status' => 'active' ] );
					$imeis = Imei::whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->first();

					MistakeParticipants::create([
						'name' => $declined->name,
						'phone' => $declined->phone,
						'email' => $declined->email,
						'address' => $declined->address,
						'imei_one' => $imeis->imei_one,
						'imei_two' => $imeis->imei_two,
						'photo' => $declined->photo,
						'directory' => $declined->directory,
						'error' => 'загруженное фото чека / гарантийного талона нечеткое',
						'moderator' => Auth::user()->name
					]);

					Storage::disk('public')->move('images/'.$declined->directory.'/'.$declined->photo, 'images/mistakes/'.$declined->directory.'/'.$declined->photo);
					Storage::disk('public')->deleteDirectory('images/'.$declined->directory);

					$declined->delete();
					break;
				case '8':
					DB::table( 'imeis' )->whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->update( [ 'status' => 'active' ] );
					$imeis = Imei::whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->first();

					MistakeParticipants::create([
						'name' => $declined->name,
						'phone' => $declined->phone,
						'email' => $declined->email,
						'address' => $declined->address,
						'imei_one' => $imeis->imei_one,
						'imei_two' => $imeis->imei_two,
						'photo' => $declined->photo,
						'directory' => $declined->directory,
						'error' => 'на загруженном фото чека не видно даты продажи смартфона',
						'moderator' => Auth::user()->name
					]);

					Storage::disk('public')->move('images/'.$declined->directory.'/'.$declined->photo, 'images/mistakes/'.$declined->directory.'/'.$declined->photo);
					Storage::disk('public')->deleteDirectory('images/'.$declined->directory);

					$declined->delete();
					break;
				case '9':

					DeclinedParticipants::create([
						'name' => $declined->name,
						'phone' => $declined->phone,
						'email' => $declined->email,
						'address' => $declined->address,
						'imei' => $declined->imei,
						'photo' => $declined->photo,
						'directory' => $declined->directory,
						'moderator' => Auth::user()->name
					]);

					Storage::disk('public')->move('images/'.$declined->directory.'/'.$declined->photo, 'images/declined/'.$declined->directory.'/'.$declined->photo);
					Storage::disk('public')->deleteDirectory('images/'.$declined->directory);

					$declined->delete();

					break;
				case '10':

					DeclinedParticipants::create([
						'name' => $declined->name,
						'phone' => $declined->phone,
						'email' => $declined->email,
						'address' => $declined->address,
						'imei' => $declined->imei,
						'photo' => $declined->photo,
						'directory' => $declined->directory,
						'moderator' => Auth::user()->name
					]);

					Storage::disk('public')->move('images/'.$declined->directory.'/'.$declined->photo, 'images/declined/'.$declined->directory.'/'.$declined->photo);
					Storage::disk('public')->deleteDirectory('images/'.$declined->directory);

					$declined->delete();

					break;
				case '11':
					DB::table( 'imeis' )->whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->update( [ 'status' => 'active' ] );
					$imeis = Imei::whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->first();

					MistakeParticipants::create([
						'name' => $declined->name,
						'phone' => $declined->phone,
						'email' => $declined->email,
						'address' => $declined->address,
						'imei_one' => $imeis->imei_one,
						'imei_two' => $imeis->imei_two,
						'photo' => $declined->photo,
						'directory' => $declined->directory,
						'error' => 'на фото не гарантийный талон / чек',
						'moderator' => Auth::user()->name
					]);

					Storage::disk('public')->move('images/'.$declined->directory.'/'.$declined->photo, 'images/mistakes/'.$declined->directory.'/'.$declined->photo);
					Storage::disk('public')->deleteDirectory('images/'.$declined->directory);

					$declined->delete();
					break;
				case '12':
					DB::table( 'imeis' )->whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->update( [ 'status' => 'active' ] );
					$imeis = Imei::whereRaw( 'imei_one ="' . $declined->imei . '" or imei_two = "' . $declined->imei . '"' )->first();

					MistakeParticipants::create([
						'name' => $declined->name,
						'phone' => $declined->phone,
						'email' => $declined->email,
						'address' => $declined->address,
						'imei_one' => $imeis->imei_one,
						'imei_two' => $imeis->imei_two,
						'photo' => $declined->photo,
						'directory' => $declined->directory,
						'error' => 'гарантийный талон не заполнен',
						'moderator' => Auth::user()->name
					]);

					Storage::disk('public')->move('images/'.$declined->directory.'/'.$declined->photo, 'images/mistakes/'.$declined->directory.'/'.$declined->photo);
					Storage::disk('public')->deleteDirectory('images/'.$declined->directory);

					$declined->delete();
					break;

			}
			return response()->json(['success' => 'Cообщение '.$declined->name.' было успешно отправлено']);
		} elseif ($result && isset($result['error'])) {
			return response()->json(['error' => $result['error']]);
		} else {
			return response()->json(['service' => 'Произошла ошибка сервиса']);
		}

	}

	public function status(Request $request)
	{
		$approved = ApprovedParticipant::whereId($request->status)->first();
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'http://api.rocketsms.by/json/status');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "username=101520868&password=ghjcgtrnghtcc&id=".$approved->status);
		$result = @json_decode(curl_exec($curl), true);
		if ($result && isset($result['status'])) {
			switch ($result['status'])
			{
				case 'QUEUED':
					return response()->json(['status' => 'Сообщение в очереди на отправку', 'participant' => $approved], Response::HTTP_OK);
				case 'SENT':
					return response()->json(['status' => 'Сообщение отправлено', 'participant' => $approved], Response::HTTP_OK);
				case 'DELIVERED':
					return response()->json(['status' => 'Сообщение доставлено', 'participant' => $approved], Response::HTTP_OK);
				case 'FAILED':
					return response()->json(['status' => 'Сообщение не доставлено', 'participant' => $approved], Response::HTTP_OK);
			}
		} elseif ($result && isset($result['error'])) {
			return response()->json(['error' => $result['error']]);
		} else {
			return response()->json(['service' => 'Произошла ошибка сервиса']);
		}
	}

	public function add(AddRequest $request)
	{
		ApprovedParticipant::create([
			'name' => $request->name,
			'phone' => $request->phone,
			'email' => $request->email,
			'address' => $request->address,
			'imei' => $request->imei,
			'photo' => $this->dash($request->file('photo')->getClientOriginalName()),
			'moderator' => Auth::user()->name
		]);

		$approved = DB::table('approved_participants')->latest()->limit(1)->first();

		$request->file('photo')->move('images/approved/'.$approved->directory, $approved->photo);

		if ($approved->id < 10) {
			DB::table('approved_participants')->whereRaw('id = '.$approved->id.'')->update(['number' => '0000'.$approved->id]);
		}
		if ($approved->id > 9 && $approved->id <100 ) {
			DB::table('approved_participants')->whereRaw('id = '.$approved->id.'')->update(['number' => '000'.$approved->id]);
		}
		if ($approved->id > 99 && $approved->id < 1000 ) {
			DB::table('approved_participants')->whereRaw('id = '.$approved->id.'')->update(['number' => '00'.$approved->id]);
		}
		if ($approved->id > 999 && $approved->id < 10000 ) {
			DB::table('approved_participants')->whereRaw('id = '.$approved->id.'')->update(['number' => '0'.$approved->id]);
		}
		if ($approved->id > 9999 && $approved->id < 100000 ) {
			DB::table('approved_participants')->whereRaw('id = '.$approved->id.'')->update(['number' => $approved->id]);
		}

		$approved = DB::table('approved_participants')->latest()->limit(1)->first();

		$phone = str_replace('+','', $approved->phone);
		$message = 'Спасибо за ожидание! Ваш код участника '.$approved->number.'. Даты розыгрышей и результаты смотрите на videtbolshe.by. Желаем удачи!!';
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'http://api.rocketsms.by/json/send');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "username=101520868&password=ghjcgtrnghtcc&phone=".$phone."&text=".$message."&sender=videtbolshe");

		$result = @json_decode(curl_exec($curl), true);
		if ($result && isset($result['id'])) {

			DB::table('approved_participants')->whereRaw('id = '.$approved->id.'')->update(['status' => $result['id']]);
			return response()->json(['success' => 'Cообщение '.$approved->name.' было успешно отправлено']);

		} elseif ($result && isset($result['error'])) {
			return response()->json(['error' => $result['error']]);
		} else {
			return response()->json(['service' => 'Произошла ошибка сервиса']);
		}
	}
}
