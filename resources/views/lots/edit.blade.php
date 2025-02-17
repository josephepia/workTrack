@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">{{ isset($lot) ? 'Editar lote' : 'Crear lote' }}</h1>
        <form method="POST" action="{{ isset($lot) ? route('lots.update', $lot) : route('lots.store') }}">
            @csrf
            @isset($lot)
                @method('PUT')
            @endisset
            <div class="mb-4">
                <label class="block text-sm font-medium">Nombre</label>
                <input type="text" name="name" value="{{ old('name', $lot->name ?? '') }}" class="w-full border rounded-lg p-2">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
</div>
@endsection