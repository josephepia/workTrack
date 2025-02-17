@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-6">
    <div class="bg-white shadow-md rounded-2xl p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">
            {{ isset($workRecord) ? 'Editar Registro de Labores' : 'Nuevo Registro de Labores' }}
        </h2>

        <form method="POST" action="{{ isset($workRecord) ? route('work_records.update', $workRecord) : route('work_records.store') }}">
            @csrf
            @if(isset($workRecord))
                @method('PUT')
            @endif

            <div class="grid grid-cols-2 gap-4">
                <!-- Empleado -->
                <div>
                    <label class="block text-gray-700">Empleado</label>
                    <select name="employee_id" required class="w-full border rounded-lg p-2">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" 
                                {{ isset($workRecord) && $workRecord->employee_id == $employee->id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Lote -->
                <div>
                    <label class="block text-gray-700">Lote</label>
                    <select name="lot_id" required class="w-full border rounded-lg p-2">
                        @foreach($lots as $lot)
                            <option value="{{ $lot->id }}" 
                                {{ isset($workRecord) && $workRecord->lot_id == $lot->id ? 'selected' : '' }}>
                                {{ $lot->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tipo de Labor -->
                <div>
                    <label class="block text-gray-700">Tipo de labor</label>
                    <select name="work_type_id" required class="w-full border rounded-lg p-2">
                        @foreach($workTypes as $workType)
                            <option value="{{ $workType->id }}" 
                                {{ isset($workRecord) && $workRecord->work_type_id == $workType->id ? 'selected' : '' }}>
                                {{ $workType->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tarifa -->
                <div>
                    <label class="block text-gray-700">Tarifa</label>
                    <input type="number" name="tariff" step="0.01" required 
                        class="w-full border rounded-lg p-2"
                        value="{{ old('tariff', $workRecord->tariff ?? '') }}">
                </div>

                <!-- Fecha -->
                <div>
                    <label class="block text-gray-700">Fecha</label>
                    <input type="date" name="date" required 
                        class="w-full border rounded-lg p-2"
                        value="{{ old('date', isset($workRecord) ? $workRecord->date->format('Y-m-d') : '') }}">
                </div>

                <!-- Cantidad -->
                <div>
                    <label class="block text-gray-700">Cantidad</label>
                    <input type="number" name="amount" step="1" required 
                        class="w-full border rounded-lg p-2"
                        value="{{ old('amount', $workRecord->amount ?? '') }}">
                </div>
            </div>

            <div class="flex justify-between items-center mt-6">
                <!-- Botón Volver -->
                <a href="{{ route('work_records.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">
                    Volver a la lista
                </a>

                <div class="flex gap-2">
                    <!-- Botón Eliminar -->
                    @if(isset($workRecord))
                        <form method="POST" action="{{ route('work_records.destroy', $workRecord) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg"
                                onclick="return confirm('¿Estás seguro de eliminar este registro?')">
                                Eliminar
                            </button>
                        </form>
                    @endif

                    <!-- Botón Guardar -->
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection