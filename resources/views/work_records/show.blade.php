@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Detalles del Registro de Trabajo</h2>

        <div class="mb-4">
            <p class="text-gray-700"><strong>Empleado:</strong> {{ $workRecord->employee->name }}</p>
            <p class="text-gray-700"><strong>Lote:</strong> {{ $workRecord->lot->name }}</p>
            <p class="text-gray-700"><strong>Tipo de Trabajo:</strong> {{ $workRecord->workType->name }}</p>
            <p class="text-gray-700"><strong>Tarifa:</strong> ${{ number_format($workRecord->tariff, 2) }}</p>
            <p class="text-gray-700"><strong>Cantidad:</strong> {{ $workRecord->amount }}</p>
            <p class="text-gray-700"><strong>Fecha:</strong> {{ $workRecord->date }}</p>
        </div>

        <div class="flex justify-between mt-6">
            <!-- Botón para regresar -->
            <a href="{{ route('work_records.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Volver a la Lista</a>

            <div class="flex gap-2">
                <!-- Botón para editar -->
                <a href="{{ route('work_records.edit', $workRecord) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Editar</a>

                <!-- Botón para eliminar -->
                <form action="{{ route('work_records.destroy', $workRecord) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
