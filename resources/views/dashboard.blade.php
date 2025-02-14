@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Panel de Control</h1>

    <div class="row">
        <!-- Tarjeta de Empleados -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Empleados</h5>
                    <p class="card-text">Gestiona los empleados de la empresa.</p>
                    <a href="{{ route('employees.index') }}" class="btn btn-primary">Ver empleados</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Tipos de Trabajo -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Tipos de Trabajo</h5>
                    <p class="card-text">Administra los diferentes tipos de labores.</p>
                    <a href="{{ route('work_types.index') }}" class="btn btn-success">Ver tipos de trabajo</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Registros de Trabajo -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Registros de Trabajo</h5>
                    <p class="card-text">Consulta y administra los registros laborales.</p>
                    <a href="{{ route('work_records.index') }}" class="btn btn-warning">Ver registros</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
