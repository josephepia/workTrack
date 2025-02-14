<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WorkTrak')</title>
    @vite('resources/css/app.css')
    @stack('styles')
</head>
<body class="bg-gray-100">


    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-lg font-bold">WorkTrak</a>
            <div>
                <a href="{{ route('work_types.index') }}" class="px-3">Tipos de Trabajo</a>
                <a href="{{ route('employees.index') }}" class="px-3">Empleados</a>
                <a href="{{ route('work_records.index') }}" class="px-3">Registros</a>
            </div>
        </div>
    </nav>


    <div class="container mx-auto mt-6">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>
