<!-- resources/views/employees/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Employees</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($employees as $employee)
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-lg font-semibold">{{ $employee->name }}</h2>
                <a href="{{ route('employees.show', $employee) }}" class="text-blue-500">View Details</a>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $employees->links() }}
    </div>
</div>
@endsection