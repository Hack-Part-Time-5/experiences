@extends('layouts.app')

@section('content')
<h1>Listado de Curriculums:</h1>
<table class="table table-success table-hover">
    <thead>
        <tr>
            <th class="col">Curriculums disponibles</th>
            <th class="col">Herramientas</th>
        </tr>
    </thead>
    @foreach ($users as $user )
    <tbody>
        <tr>
            <td><a class="nav-link" href="{{ route ('users.show', $user) }}">{{$user->name . ' (' . $user->email . ')'}}</a></td>
            <td>
                {{-- filtrado herramientas duplicadas --}}
                @php
                    $showedTool = [];
                @endphp
                @foreach ($user->experiences as $experiences)
                    @foreach ($experiences->tools as $tool )
                        @if (!isset($showedTool[$tool->id]))  
                                <img src="{{ $tool->img }}" alt="{{ $tool->name }}" style="height: 1.2rem">   
                            @php
                                $showedTool[$tool->id] = true;
                            @endphp
                        @endif
                    @endforeach
                @endforeach
            </td>
        </tr>
    </tbody>
    @endforeach
</table>

@endsection





{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    {{ __('You are logged in!') }}
</div>
</div>
</div>
</div>
</div> --}}
