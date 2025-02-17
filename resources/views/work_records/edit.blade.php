@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Editar Registro de Labores</h2>

        <form action="{{ route('work_records.update', $workRecord) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="employee_id" class="block text-gray-700 font-medium">Empleado</label>
                <select name="employee_id" id="employee_id" class="w-full border rounded p-2">
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ $workRecord->employee_id == $employee->id ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="lot_id" class="block text-gray-700 font-medium">Lote</label>
                <select name="lot_id" id="lot_id" class="w-full border rounded p-2">
                    @foreach($lots as $lot)
                        <option value="{{ $lot->id }}" {{ $workRecord->lot_id == $lot->id ? 'selected' : '' }}>
                            {{ $lot->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="work_type_id" class="block text-gray-700 font-medium">Tipo de Trabajo</label>
                <select name="work_type_id" id="work_type_id" class="w-full border rounded p-2">
                    @foreach($workTypes as $workType)
                        <option value="{{ $workType->id }}" {{ $workRecord->work_type_id == $workType->id ? 'selected' : '' }}>
                            {{ $workType->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="tariff" class="block text-gray-700 font-medium">Tarifa</label>
                <input type="number" name="tariff" id="tariff" value="{{ $workRecord->tariff }}" class="w-full border rounded p-2" step="0.01">
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-gray-700 font-medium">Cantidad</label>
                <input type="number" name="amount" id="amount" value="{{ $workRecord->amount }}" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700 font-medium">Fecha</label>
                <input type="date" name="date" id="date" value="{{ $workRecord->date->format('Y-m-d') }}" class="w-full border rounded p-2">
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('work_records.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancelar</a>
                
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Actualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection
