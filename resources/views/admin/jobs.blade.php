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
        float: right;
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

</style>
@endpush

@section('content')

<div class="page-title">Job Management</div>

<a href="{{ route('admin.job.create') }}" class="btn-add">+ Add New Job</a>

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
            <a href="{{ route('admin.job.delete', $job->id) }}" class="btn-delete"
               onclick="return confirm('Delete this job?')">Delete</a>
        </td>
    </tr>
    @endforeach

</table>

@endsection
