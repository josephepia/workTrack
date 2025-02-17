@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Lista de lotes</h1>
        <a href="{{ route('lots.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">+ Nuevo</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($lots as $lot)
            <div class="bg-white p-4 shadow-md rounded-lg">
                <h2 class="text-lg font-semibold">{{ $lot->name }}</h2>
                <div class="mt-2 flex justify-between">
                    <a href="{{ route('lots.show', $lot) }}" class="text-blue-500 hover:underline">Ver</a>
                    <a href="{{ route('lots.edit', $lot) }}" class="text-yellow-500 hover:underline">Editar</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $lots->links() }}
    </div>
</div>
@endsection
