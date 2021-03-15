<h1>Информация о баре </h1>
<p>Название: {{$bar->name}}</p>
<p>Жанр музыки: {{$bar->music->name}}</p>
<p>Кол-во человек в баре: {{count($peoples)}}</p>
<h2>Список посетителей:</h2>
<table>
    <thead>
    <th>Имя</th>
    <th>Жанры</th>
    <th>Что делает</th>
    </thead>
    <tbody>
    @foreach($peoples as $people)
        <tr>
            <td>{{$people->name}}</td>
            <td>{{implode(',',$people->musics->pluck('name')->toArray())}}</td>
            <td>{{$people->action}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<a href="{{ route('logout') }}"
   onclick="event.preventDefault();
   document.getElementById('logout-form').submit();">
    Выйти
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>


