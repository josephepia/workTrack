@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold">{{ $lot->name }}</h1>
        <a href="{{ route('lots.index') }}" class="text-blue-500">Volver a la lista</a>
        <form action="{{ route('lots.destroy', $lot) }}" method="POST" onsubmit="return confirm('¿Está seguro?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">{{ __('Eliminar') }}</button>
        </form>
    </div>
</div>
@endsection

