@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Employees</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($employees as $employee)
        <div class="bg-white rounded-lg shadow-md p-4">
            <h2 class="text-lg font-semibold">{{ $employee->name }}</h2>
            <p class="text-gray-600">ID: {{ $employee->id }}</p>
            <a href="{{ route('employees.show', $employee) }}" class="text-blue-500 hover:underline">View Details</a>
        </div>
        @endforeach
    </div>
    
    <div class="mt-6">
        {{ $employees->links() }}
    </div>
</div>
@endsection