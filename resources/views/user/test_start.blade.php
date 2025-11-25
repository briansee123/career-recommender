@extends('layouts.app')

@section('title', 'Career Test')

@push('styles')
<style>
    .start-box {
        width: 420px;
        background: white;
        margin: 80px auto;
        padding: 30px;
        border-radius: 16px;
        text-align: center;
        box-shadow: 0 5px 18px rgba(0,0,0,0.15);
    }

    .start-btn {
        width: 100%;
        background: #6c63ff;
        color: white;
        padding: 12px;
        border-radius: 10px;
        border: none;
        cursor:pointer;
        transition: 0.3s;
        font-size: 18px;
        margin-top: 20px;
    }

    .start-btn:hover {
        background:#584fff;
    }

    .title {
        font-size: 24px;
        font-weight: bold;
        color:#444;
    }
</style>
@endpush

@section('content')

<div class="start-box">

    <div class="title">Career Personality Test</div>

    <p style="margin-top:10px; color:#666;">
        Answer a few simple questions to find your MBTI personality type.
    </p>

    <form action="{{ route('user.test.answer') }}" method="POST">
        @csrf
        <input type="hidden" name="question_id" value="{{ $question->id }}">
        <input type="hidden" name="answer" value="start">
        <button class="start-btn">Start Test</button>
    </form>

</div>

@endsection
