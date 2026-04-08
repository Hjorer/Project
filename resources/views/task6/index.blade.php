<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Логин</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->login }}</td>
                <td>{{ $member->profile->name ?? '—' }}</td>
                <td>{{ $member->profile->surname ?? '—' }}</td>
                <td>{{ $member->profile->email ?? '—' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<table border="1">
    <thead>
        <tr>
            <th>Логин</th>
            <th>Город</th>
            <th>Страна</th>
        </tr>
    </thead>
    <tbody>
        @foreach($members as $member)
            <tr>
                <td>{{ $member->login }}</td>
                <td>{{ $member->city->Name ?? 'Город не указан' }}</td>
                <td>{{ $member->city->country->Name ?? '—' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<table border="1">
    <thead>
        <tr>
            <th>Страна</th>
            <th>Список городов</th>
        </tr>
    </thead>
    <tbody>
        @foreach($countries as $country)
            <tr>
                <td><strong>{{ $country->Name }}</strong></td>
                <td>
                    @if($country->cities->count() > 0)
                        <ul>
                            @foreach($country->cities as $city)
                                <li>{{ $city->Name }}</li>
                            @endforeach
                        </ul>
                    @else
                        Городов нет
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
