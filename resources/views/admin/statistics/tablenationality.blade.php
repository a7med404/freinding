<thead>
    <tr>
        <th>#</th>
        <th>NATIONALITY </th>
        <th>TOTAL</th>
    </tr>
</thead>

@foreach ($data_nationality as $key => $data)
@if(!empty($data->nationality))
<tr>
    <td>{{ ++$key }}</td>
    <td>{!!nationalityData($data->nationality)!!}</td>
    <td>{{ $data->total }}</td>

</tr>
@endif
@endforeach

