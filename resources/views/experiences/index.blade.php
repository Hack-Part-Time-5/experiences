@extends('layouts.app')

@section('content')
<h1>Listado de experiencias:</h1>
<table class="table table-success table-hover">
    <thead>
        <tr>
            <th scope="col">Compañia</th>
            <th scope="col">Puesto</th>
            <th scope="col">Desde</th>
            <th scope="col">Hasta</th>
            <th scope="col">Herramientas</th>
        </tr>
    </thead>
    @foreach ($exps as $exp )
        <tbody>
            <tr>
                <td><a class="nav-link" href="{{ route ('experiences.show', $exp) }}">{{$exp->company}}</a></td>
                <td><a class="nav-link" href="{{ route ('experiences.show', $exp) }}">{{$exp->role}}</a></td>
                <td><a class="nav-link" href="{{ route ('experiences.show', $exp) }}">{{$exp->from}}</a></td>
                <td><a class="nav-link" href="{{ route ('experiences.show', $exp) }}">{{$exp->to}}</a></td>
                <td>
                    @foreach ($exp->tools as $tool )
                        <img src="{{ $tool->img }}" alt="{{ $tool->name }}" style="height: 1.2rem">
                    @endforeach
                </td>
            </tr>
        </tbody>
    @endforeach
</table>
{{-- Aqui se filtran experiencias segun la herramienta que seleccionemos --}}
<h2>Filtrar por herramientas:</h2>
<div class="d-flex">
    @foreach ($tools as $tool )
        <a href="{{ route('exptool.index', $tool->id) }}"><img class="me-2" src=" {{ $tool->img }}" alt=" {{ $tool->name }}" style="height:1.5rem"></a>
    @endforeach
</div>

@endsection
