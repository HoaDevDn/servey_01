<table class="table table">
    <thead class="thead-default">
        <tr>
            <th>
                Username
            </th>
            <th>
                Email
            </th>
            <th>
                Time
            </th>
            <th>
                Detail
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listUserAnswer as $key => $value)
            <tr>
                <td>
                    {{ $value->name }}
                </td>
                <td>
                    {{ $value->email }}
                </td>
                <td>
                    {{ $value->created_at }}
                </td>
                <td>
                    {{ $value->created_at }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

