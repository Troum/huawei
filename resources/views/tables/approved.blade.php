@foreach($approved as $value)
    <tr data-check="{{$value->id}}" data-approved>
        <td scope="row">{{$value->name}}</td>
        <td>{{$value->email}}</td>
        <td>{{$value->address}}</td>
        <td>{{$value->phone}}</td>
        <td>{{$value->imei}}</td>
        <td>{{$value->number}}</td>
        <td>{{$value->created_at->format('d/m/Y')}}</td>
        <td>{{$value->moderator}}</td>
    </tr>
@endforeach
<tr data-pagination>
    <td colspan="5" class="w-100 d-flex justify-content-center border-0 text-center">
        {{$approved->links('vendor.pagination.bootstrap-4')}}
    </td>
</tr>