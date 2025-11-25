@extends('layouts.admin')

@section('title', 'Edit Job')

@push('styles')
<style>
    .form-container {
        width: 600px;
        background: white;
        padding: 25px;
        border-radius: 12px;
        margin: 20px auto;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    }

    .form-container h2 {
        margin-bottom: 20px;
        font-size: 22px;
        font-weight: bold;
        text-align: center;
    }

    .input-box {
        margin-bottom: 16px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
    }

    input, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    .btn-save {
        width: 100%;
        background: #007bff;
        padding: 12px;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 18px;
        cursor: pointer;
    }

    .btn-save:hover {
        background: #0056b3;
    }
</style>
@endpush

@section('content')

<div class="form-container">
    <h2>Edit Job</h2>

    <form action="{{ route('admin.job.update', $job->id) }}" method="POST">
        @csrf

        <div class="input-box">
            <label>Job Title</label>
            <input type="text" name="title" value="{{ $job->title }}" required>
        </div>

        <div class="input-box">
            <label>Description</label>
            <textarea name="description" rows="4">{{ $job->description }}</textarea>
        </div>

        <div class="input-box">
            <label>Requirements</label>
            <textarea name="requirements" rows="3">{{ $job->requirements }}</textarea>
        </div>

        <div class="input-box">
            <label>Salary</label>
            <input type="text" name="salary" value="{{ $job->salary }}">
        </div>

        <div class="input-box">
            <label>Location</label>
            <input type="text" name="location" value="{{ $job->location }}">
        </div>

        <button class="btn-save">Save Changes</button>
    </form>
</div>

@endsection
