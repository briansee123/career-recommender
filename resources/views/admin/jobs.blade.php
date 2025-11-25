@extends('layouts.admin')

@section('title', 'Job Management')

@push('styles')
<style>
    .page-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .btn-add {
    background: #28a745;
    color: white;
    padding: 10px 16px;
    text-decoration: none;
    border-radius: 6px;
    font-weight: bold;
    margin-bottom: 15px;
}


    .btn-add:hover {
        background: #218838;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background: #f1f1f1;
        text-align: left;
    }

    .btn-edit {
        background: #007bff;
        padding: 6px 12px;
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-delete {
        background: #dc3545;
        padding: 6px 12px;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        margin-left: 6px;
    }

    .btn-edit:hover { background: #0056b3; }
    .btn-delete:hover { background: #c82333; }

    .alert-success {
        background: #d4edda; 
        padding:12px; 
        border-radius:6px; 
        color:#155724; 
        margin-bottom:15px;
    }
</style>
@endpush

@section('content')

{{-- SUCCESS MESSAGE --}}
@if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
    <div class="page-title">Job Management</div>

    <a href="{{ route('admin.job.create') }}" class="btn-add">+ Add New Job</a>
</div>


<table>
    <tr>
        <th>ID</th>
        <th>Job Title</th>
        <th>Location</th>
        <th>Salary</th>
        <th>Actions</th>
    </tr>

    @foreach ($jobs as $job)
    <tr>
        <td>{{ $job->id }}</td>
        <td>{{ $job->title }}</td>
        <td>{{ $job->location }}</td>
        <td>{{ $job->salary }}</td>
        <td>
            <a href="{{ route('admin.job.edit', $job->id) }}" class="btn-edit">Edit</a>
            <form action="{{ route('admin.job.delete', $job->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')

    <button class="btn-delete" onclick="return confirm('Delete this job?')">
        Delete
    </button>
</form>

        </td>
    </tr>
    @endforeach

</table>

@endsection
