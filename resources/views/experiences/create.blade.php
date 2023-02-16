@extends('layouts.app')

@section('content')
<x-card title="Nueva Experiencia" subtitle="Indica todos los campos de la experiencia">
    <x-slot:content>
        <form method="post" action="{{ route ('experiences.store') }}" type="plain/text">
            {{-- Cross side resource force (para evitar referencias cruzadas) --}}
            @csrf
            <div class="mb-3">
                <label for="company" class="form-label">Compañia</label>
                <input type="text" class="form-control" id="company" aria-describedby="company" name="company" placeholder="Company">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Puesto</label>
                <input type="text" class="form-control" id="role" name="role" placeholder="Puesto en la compañia">
            </div>
            <div class="mb-3">
                <label for="from" class="form-label">Desde</label>
                <input type="date" class="form-control" id="from" name="from">
            </div>
            <div class="mb-3">
                <label for="to" class="form-label">Hasta</label>
                <input type="date" class="form-control" id="to" name="to">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripcion</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="5" style="resize:
                none" placeholder="Descripcion del puesto"></textarea>
            </div>
            <div class="mb-3">
                <label for="tools" class="form-label fs-4">Herramientas:</label>
                <div class="row">
                    @foreach ($tools as $tool)
                    <div class="col-3">
                        <input class="me-2" type="checkbox" name="tools[]" id="tool_{{$tool->id }}" value="{{ $tool->id }}">{{ $tool->name }} 
                    </div>
                    @endforeach
                </div>
            </div>
            
            <button type="button" id="btn-create" class="btn btn-primary">Enviar</button>
        </form>
    </x-slot:content>
</x-card>
@endsection
