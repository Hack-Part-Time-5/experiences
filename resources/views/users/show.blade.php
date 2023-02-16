@extends('layouts.app')

@section('content')

<h1 class="text-center mb-4"> {{ $user->name }}</h1>
<h3 class="text-center mb-4"> Email de contacto: {{ $user->email }}</h3>
<hr class="mb-4">
<h3 class="text-center mb-4">Experiencias de interés</h3>

@foreach ($user->experiences as $experience )
    <div class="row">
        <div class="d-flex justify-content-center mb-3">
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
        </div>
    </div>
@endforeach
<div class="d-flex justify-content-center">
    <a href="{{ route ('home')}}" class="btn btn-primary">Volver</a>
</div>
@endsection