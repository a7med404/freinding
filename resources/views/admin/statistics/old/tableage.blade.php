<thead>
    <tr>

        <th>ID</th>
        <th>Age</th>
        <th>From</th>
        <th>To</th>
        <th>Count</th>
    </tr>
</thead>
@foreach ($data_age as $key => $age)
<tr>
    <td>{{ ++$key }}</td>
    <td>{{ $age['age'] }}</td>
    <td>{{ $age['from'] }}</td>
    <td>{{ $age['to'] }}</td>
    <td>{{ $age['count'] }}</td>
</tr>
@endforeach

