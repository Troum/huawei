@foreach($mistakes as $mistake)
    <tr data-id="{{$mistake->id}}" data-mistakes>
        <td scope="row">{{$mistake->name}}</td>
        <td>{{$mistake->email}}</td>
        <td>{{$mistake->address}}</td>
        <td>{{$mistake->phone}}</td>
        <td>{{$mistake->imei_one}}</td>
        <td>{{$mistake->imei_two}}</td>
        <td>{{$mistake->created_at->format('d/m/Y')}}</td>
        <td>{{$mistake->error}}</td>
        <td>{{$mistake->moderator}}</td>
    </tr>
@endforeach
<tr data-pagination>
    <td colspan="5" class="w-100 d-flex justify-content-center border-0 text-center">
        {{$mistakes->links('vendor.pagination.bootstrap-4')}}
    </td>
</tr>