<table class="table table">
    <thead class="thead-default">
        <tr>
            <th>
                {{ trans('result.user_name') }}
            </th>
            <th>
                {{ trans('result.email') }}
            </th>
            <th>
                {{ trans('result.time') }}
            </th>
            <th>
                {{ trans('result.detail') }}
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

