@extends('layouts.admin')

@section('title', 'Test Questions')

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
    table {
        width: 100%;
        background: white;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
    }
    th, td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }
    th {
        background: #f1f1f1;
    }
    .btn-edit { background:#007bff; color:white; padding:6px 12px; border-radius:6px; }
    .btn-delete { background:#dc3545; color:white; padding:6px 12px; border-radius:6px; }
</style>
@endpush

@section('content')

@if(session('success'))
    <div style="background:#d4edda; padding:12px; border-radius:6px; margin-bottom:15px;">
        {{ session('success') }}
    </div>
@endif

<div class="page-title">Test Questions</div>

<a href="{{ route('admin.test.create') }}" class="btn-add">+ Add Question</a>

<table>
    <tr>
        <th>ID</th>
        <th>Question</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>

    @foreach ($questions as $q)
    <tr>
        <td>{{ $q->id }}</td>
        <td>{{ $q->question }}</td>
        <td>{{ $q->category }}</td>
        <td>
            <a href="{{ route('admin.test.edit', $q->id) }}" class="btn-edit">Edit</a>

            <form action="{{ route('admin.test.delete', $q->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn-delete" onclick="return confirm('Delete question?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection
