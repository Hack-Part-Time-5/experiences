@extends('layouts.app')

@section('content')
    <x-card 
        title="{{ $experience->role . ' en ' . $experience->company }}" 
        subtitle="{{'Desde: ' . $experience->from . ' || Hasta: ' . $experience->to }}">
        <x-slot:content> 
            <p>{{ $experience->description}}</p>
            <div>
                @foreach ($experience->tools as $tool)
                    <img class="me-2" src="{{ $tool->img }}" alt="{{ $tool->name }}" style="height: 2.3rem">
                @endforeach
            </div>
        </x-slot:content> 
    </x-card>   
    <div class="d-flex justify-content-center gap-5 my-4">
            <a href="{{ route ('experiences.index')}}" class="btn btn-primary btn-sm">Volver</a>
            <a href="{{ route ('experiences.edit', $experience ) }}" class="btn btn-warning btn-sm">Modificar</a>
            <form method="post" action="{{ route('experience.destroy', $experience)}}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
            </form>
    </div>
@endsection