@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employee Details</h1>
        <p><strong>Name:</strong> {{ $employee->name }}</p>
        <p><strong>Email:</strong> {{ $employee->email }}</p>
        <p><strong>Phone:</strong> {{ $employee->phone }}</p>
        <p><strong>Position:</strong> {{ $employee->position }}</p>
        <p><strong>Salary:</strong> ${{ number_format($employee->salary, 2) }}</p>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
