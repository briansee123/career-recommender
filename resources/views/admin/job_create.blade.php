@extends('layouts.admin')

@section('title', 'Add New Job')

@push('styles')
<style>
    .form-container {
        background: white;
        padding: 25px;
        border-radius: 10px;
        max-width: 700px;
        margin: auto;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .form-container h2 {
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        font-weight: 600;
    }

    input, textarea {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #bbb;
    }

    textarea {
        resize: none;
        height: 120px;
    }

    .btn-submit {
        background: #28a745;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-submit:hover {
        background: #218838;
    }
</style>
@endpush

@section('content')

<div class="form-container">
    <h2>Add New Job</h2>

    <form action="{{ route('admin.job.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Job Title</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Job Description</label>
            <textarea name="description"></textarea>
        </div>

        <div class="form-group">
            <label>Requirements</label>
            <textarea name="requirements"></textarea>
        </div>

        <div class="form-group">
            <label>Salary</label>
            <input type="text" name="salary">
        </div>

        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location">
        </div>

        <button class="btn-submit">Create Job</button>
    </form>
</div>

@endsection
