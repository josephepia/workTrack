@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">{{ __('Work Records') }}</h1>
            <a href="{{ route('work_records.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Agregar</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($workRecords as $workRecord)
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold">{{ $workRecord->workType->name }}</h2>
                    <p class="text-gray-600">Empleado: {{ $workRecord->employee->name }}</p>
                    <p class="text-gray-600">Lote: {{ $workRecord->lot->name }}</p>
                    <p class="text-gray-600">Fecha: {{ $workRecord->date }}</p>
                    <p class="text-gray-600">Tarifa: ${{ $workRecord->tariff }}</p>
                    <p class="text-gray-600">Cantidad: {{ $workRecord->amount }}</p>
                    <div class="mt-2 flex space-x-2">
                        <a href="{{ route('work_records.show', $workRecord) }}" class="text-blue-500">Ver detalle</a>
                        <a href="{{ route('work_records.edit', $workRecord) }}" class="text-yellow-500">Editar</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $workRecords->links() }}
        </div>
    </div>
@endsection