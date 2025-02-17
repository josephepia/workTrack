@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Lista de Empleados</h1>
        <a href="{{ route('employees.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">+ Nuevo</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($employees as $employee)
            <div class="bg-white p-4 shadow-md rounded-lg">
                <h2 class="text-lg font-semibold">{{ $employee->name }}</h2>
                <div class="mt-2 flex justify-between">
                    <a href="{{ route('employees.show', $employee) }}" class="text-blue-500 hover:underline">Ver</a>
                    <a href="{{ route('employees.edit', $employee) }}" class="text-yellow-500 hover:underline">Editar</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $employees->links() }}
    </div>
</div>
@endsection
