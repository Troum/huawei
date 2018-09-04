<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Http\Requests\RegistrationRequest;
use App\Imei;
use App\Mail\FeedbackMail;
use App\MistakeParticipants;
use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use ElForastero\Transliterate\TransliterationFacade;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Agent\Agent;

class IndexController extends Controller
{
	public function dash($string)
	{
		return str_replace(' ','_', TransliterationFacade::make($string));
	}

	public function index()
	{

		$agent = new Agent();
		$browser = $agent->browser();
		if($browser === 'IE')
		{
			return view('ie');
		}
		else{
			if($agent->isDesktop())
			{
				return view('desktop');
			}
			elseif ($agent->isTablet())
			{
				return view('mobile');
			}
			else
			{
				return view('mobile');
			}
		}

	}

	public function cities()
	{
		$cities = File::get(public_path('assets/custom/cities.json'));
		return $cities;
	}
	public function districts()
	{
		$districts = File::get(public_path('assets/custom/districts.json'));
		return $districts;
	}
	public function regions()
	{
		$regions = File::get(public_path('assets/custom/regions.json'));
		return $regions;
	}

	public function check(RegistrationRequest $request) {

		$imei = DB::table( 'imeis' )
		          ->whereRaw( 'imei_one ="' . $request->imei . '" or imei_two = "' . $request->imei . '"' )
		          ->first();
		$participant = DB::table('mistake_participants')->whereRaw('imei_one = "' . $request->imei . '" or imei_two = "' . $request->imei . '"')->first();

		if(isset($participant)) {

			if($participant->phone !== $request->phone)
			{
				return response()->json( [ 'error' => 'Ваша заявка не принята: номер телефона отсутствует в базе. Если Вы считаете, что видите это сообщение по ошибке, пожалуйста, напишите на info@videtbolshe.by или воспользуйтесь формой обратной связи в нижней части страницы' ], Response::HTTP_OK );
			}

			else
			{
				if ( $imei->imei_one === $request->imei ) {
					$receivedImei = $imei->imei_one;
				}
				if ( $imei->imei_two === $request->imei ) {
					$receivedImei = $imei->imei_two;
				}
				$name   = $request->name;
				$index  = $request->index;
				$region = $request->region;
				$city   = $request->city;
				$street   = $request->street;
				$build  = $request->build;
				$phone  = $request->phone;
				$email  = $request->email;
				$photo  = $request->file( 'photo' );

				$address = $index . ' ' . $region . ' ' . $city . ' '. $street .' ' . $build;

				Participant::create( [
					'name'    => $name,
					'phone'   => $phone,
					'email'   => $email,
					'address' => $address,
					'imei'    => $receivedImei,
					'photo'   => $this->dash( $photo->getClientOriginalName() ),
				] );

				$repeat = DB::table( 'participants' )->latest()->limit( 1 )->first();

				DB::table( 'imeis' )->whereRaw( 'imei_one ="' . $repeat->imei . '" or imei_two = "' . $repeat->imei . '"' )->update( [ 'status' => 'inactive' ] );

				$photo->move( 'images/' . $repeat->directory, $this->dash( $photo->getClientOriginalName() ) );

				Storage::disk('public')->deleteDirectory('images/mistakes/'.$participant->directory);

				DB::table('mistake_participants')->where('id','=', $participant->id)->delete();

				return response()->json( [ 'success' => 'Спасибо! Ваша повторная заявка в обработке. Ожидайте ответ в ближайшее время.' ], Response::HTTP_OK );
			}
		}
		else {

			if ( isset( $imei ) ) {
				if ( $imei->status !== 'inactive' ) {
					if ( $imei->imei_one === $request->imei ) {
						$receivedImei = $imei->imei_one;
					}
					if ( $imei->imei_two === $request->imei ) {
						$receivedImei = $imei->imei_two;
					}
					$name   = $request->name;
					$index  = $request->index;
					$region = $request->region;
					$city   = $request->city;
					$street   = $request->street;
					$build  = $request->build;
					$phone  = $request->phone;
					$email  = $request->email;
					$photo  = $request->file( 'photo' );

					$address = $index . ' ' . $region . ' ' . $city . ' '. $street .' ' . $build;

					Participant::create( [
						'name'    => $name,
						'phone'   => $phone,
						'email'   => $email,
						'address' => $address,
						'imei'    => $receivedImei,
						'photo'   => $this->dash( $photo->getClientOriginalName() ),
					] );

					$participant = DB::table( 'participants' )->latest()->limit( 1 )->first();

					DB::table( 'imeis' )->whereRaw( 'imei_one ="' . $participant->imei . '" or imei_two = "' . $participant->imei . '"' )->update( [ 'status' => 'inactive' ] );

					$photo->move( 'images/' . $participant->directory, $this->dash( $photo->getClientOriginalName() ) );

					return response()->json( [ 'success' => 'Спасибо! Ваша заявка в обработке. Ожидайте ответ в ближайшее время.' ], Response::HTTP_OK );
				} elseif ( $imei->status === 'inactive' && $request->imei === $imei->imei_one ) {
					return response()->json( [ 'error' => 'Один из двух IMEI вашего устройства уже был загеристрирован. Если вы считаете, что видите это сообщение по ошибке, пожалуйста, напишите на info@videtbolshe.by или воспользуйтесь формой обратной связи в нижней части страницы' ], Response::HTTP_OK );
				} elseif ( $imei->status === 'inactive' && $request->imei === $imei->imei_two ) {
					return response()->json( [ 'error' => 'Один из двух IMEI вашего устройства уже был загеристрирован. Если вы считаете, что видите это сообщение по ошибке, пожалуйста, напишите на info@videtbolshe.by или воспользуйтесь формой обратной связи в нижней части страницы' ], Response::HTTP_OK );
				} elseif ( $imei->status === 'inactive' ) {
					return response()->json( [ 'error' => 'Этот IMEI уже загеристрирован. Если Вы считаете, что видите это сообщение по ошибке, пожалуйста, напишите на info@videtbolshe.by или воспользуйтесь формой обратной связи в нижней части страницы' ], Response::HTTP_OK );
				}
			} else {
				return response()->json( [ 'error' => 'Пожалуйста, проверьте номер IMEI. Если Вы считаете, что видите это сообщение по ошибке, пришлите четкое фото гарантийного талона или чека и  Ваш контактный номер на info@videtbolshe.by или воспользуйтесь формой обратной связи в нижней части страницы' ], Response::HTTP_OK );
			}
		}

	}

	public function feedback(FeedbackRequest $request)
	{
		Mail::to('info@videtbolshe.by')->send(new FeedbackMail($request->contact, $request->message));
		return response()->json(['success' => 'Спасибо за ваше сообщение! Мы свяжемся с вами в ближайшее время. Команда поддержки видетьбольше.бел'], Response::HTTP_OK);
	}


}
