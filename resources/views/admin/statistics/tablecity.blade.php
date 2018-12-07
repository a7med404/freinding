<thead>
    <tr>
        <th>#</th>
        <th>CITY </th>
        <th>TOTAL</th>
    </tr>
</thead>

@foreach ($data_city as $key => $data)
@if(!empty($data->address))
<tr>
    <td>{{ ++$key }}</td>
    <td>{{ $data->address }}</td>
    <td>{{ $data->total }}</td>
</tr>
@endif
@endforeach