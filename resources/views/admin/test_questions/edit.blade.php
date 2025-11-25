@extends('layouts.admin')

@section('title', 'Edit Question')

@push('styles')
<style>
    .form-box {
        background:white; padding:20px; border-radius:10px; width:600px; margin:auto;
    }
    .input-box { margin-bottom:15px; }
    .input-box label { font-weight:bold; display:block; }
    .input-box input { width:100%; padding:10px; border-radius:8px; border:1px solid #aaa; }
    .save-btn { width:100%; padding:12px; background:#6c63ff; border:none; border-radius:10px; color:white; font-size:18px; }
</style>
@endpush

@section('content')

<div class="form-box">
    <h2>Edit Test Question</h2>

    <form action="{{ route('admin.test.update', $question->id) }}" method="POST">
        @csrf

        <div class="input-box">
            <label>Question</label>
            <input type="text" name="question" value="{{ $question->question }}" required>
        </div>

        <div class="input-box">
            <label>Option A</label>
            <input type="text" name="option_a" value="{{ $question->option_a }}" required>
        </div>

        <div class="input-box">
            <label>Option B</label>
            <input type="text" name="option_b" value="{{ $question->option_b }}" required>
        </div>

        <div class="input-box">
            <label>Option C</label>
            <input type="text" name="option_c" value="{{ $question->option_c }}">
        </div>

        <div class="input-box">
            <label>Option D</label>
            <input type="text" name="option_d" value="{{ $question->option_d }}">
        </div>

        <div class="input-box">
            <label>Category</label>
            <input type="text" name="category" value="{{ $question->category }}" required>
        </div>

        <button class="save-btn">Update Question</button>
    </form>

</div>

@endsection
