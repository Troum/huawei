@foreach($declined as $decline)
    <tr data-id="{{$decline->id}}" data-declined>
        <td scope="row">{{$decline->name}}</td>
        <td>{{$decline->email}}</td>
        <td>{{$decline->address}}</td>
        <td>{{$decline->phone}}</td>
        <td>{{$decline->imei}}</td>
        <td>{{$decline->created_at->format('d/m/Y')}}</td>
        <td>{{$decline->moderator}}</td>
    </tr>
@endforeach
<tr data-pagination>
    <td colspan="5" class="w-100 d-flex justify-content-center border-0 text-center">
        {{$declined->links('vendor.pagination.bootstrap-4')}}
    </td>
</tr>