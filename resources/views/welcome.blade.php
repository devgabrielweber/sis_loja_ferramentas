@extends('layouts.main')
@section('title', 'Menu')
@section('content')

<table>
    <tr>
        <th>Evento</th>
        <th>Descrição</th>
        <th>Cidade</th>
        <th>Privado</th>
    </tr>
    @foreach($events as $event)
        <tr>
        <td>{{ $event->title }}</td>
        <td>{{ $event->description }}</td>
        <td>{{ $event->city }}</td>
        <td>{{ $event->private }}</td>
        </tr>
    @endforeach
</table>
    

@endsection