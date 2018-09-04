@foreach($participants as $participant)
    <tr data-id="{{$participant->id}}" data-show>
        <td scope="row">{{$participant->name}}</td>
        <td>{{$participant->email}}</td>
        <td>{{$participant->address}}</td>
        <td>{{$participant->phone}}</td>
        <td>{{$participant->imei}}</td>
        <td>{{$participant->created_at->format('d/m/Y')}}</td>
    </tr>
@endforeach
<tr data-pagination>
    <td colspan="5" class="w-100 d-flex justify-content-center border-0 text-center">
        {{$participants->links('vendor.pagination.bootstrap-4')}}
    </td>
</tr>
