@extends('layouts.admin')

@section('title', 'Test Questions Management')

@push('styles')
<style>

    .page-title {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 25px;
    }

    .question-box {
        background: white;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .question-label {
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 8px;
        display: block;
    }

    .question-box textarea {
        width: 100%;
        height: 80px;
        border-radius: 8px;
        border: 1px solid #aaa;
        padding: 10px;
        resize: vertical;
    }

    .add-btn {
        background: #6c63ff;
        padding: 10px 20px;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        transition: 0.3s;
        display: inline-block;
        margin-bottom: 10px;
    }

    .add-btn:hover {
        background: #554fff;
    }

    .delete-btn {
        background: #dc3545;
        padding: 8px 14px;
        color: white;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        float: right;
        margin-top: -40px;
    }

    .save-btn {
        width: 100%;
        padding: 14px;
        background: #6c63ff;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 18px;
        cursor: pointer;
        transition: 0.3s;
        margin-top: 20px;
    }

    .save-btn:hover {
        background: #554fff;
    }

</style>
@endpush


@section('content')

<div class="page-title">Personality Test Questions</div>

{{-- Add New Question --}}
<a href="#" class="add-btn">+ Add New Question</a>

{{-- Example Question 1 --}}
<div class="question-box">
    <label class="question-label">Question 1</label>
    <textarea>What is your strongest skill?</textarea>

    <a href="#" class="delete-btn">Delete</a>
</div>

{{-- Example Question 2 --}}
<div class="question-box">
    <label class="question-label">Question 2</label>
    <textarea>Describe your personality in a few words.</textarea>

    <a href="#" class="delete-btn">Delete</a>
</div>

{{-- Example Question 3 --}}
<div class="question-box">
    <label class="question-label">Question 3</label>
    <textarea>How do you work best: alone or in teams?</textarea>

    <a href="#" class="delete-btn">Delete</a>
</div>

{{-- Save changes --}}
<button class="save-btn">Upload Changes</button>

@endsection
