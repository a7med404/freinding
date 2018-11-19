<thead>
    <tr>

        <th>ID</th>
        <th>Year</th>
        <th>From</th>
        <th>To</th>
        <th>Count</th>
    </tr>
</thead>
@foreach ($data_year as $key => $year)
<tr>
    <td>{{ ++$key }}</td>
    <td>{{ $year['year'] }}</td>
    <td>{{ $year['from'] }}</td>
    <td>{{ $year['to'] }}</td>
    <td>{{ $year['count'] }}</td>
</tr>
@endforeach

