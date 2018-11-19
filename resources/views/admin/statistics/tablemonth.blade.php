<thead>
    <tr>

        <th>ID</th>
        <th>Month </th>
        <th>From</th>
        <th>To</th>
        <th>Count</th>

    </tr>
</thead>

@foreach ($data_month as $key => $month)

<tr>

    <td>{{ ++$key }}</td>

    <td>{{ $month['month'] }}</td>
    <td>{{ $month['from'] }}</td>
    <td>{{ $month['to'] }}</td>
    <td>{{ $month['count'] }}</td>

</tr>

@endforeach

