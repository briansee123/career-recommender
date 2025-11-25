@extends('layouts.user')

@section('title', 'Personality Test')

@section('content')

<div class="container" style="max-width:700px; margin:auto; margin-top:40px;">

    <h2 style="text-align:center; margin-bottom:20px;">
        Personality Test
    </h2>

    <div class="card" style="padding:20px; border-radius:10px; background:#fff;">

        <h4>{{ $question->question }}</h4>

        <form action="{{ route('user.test.answer') }}" method="POST">
            @csrf

            <input type="hidden" name="question_id" value="{{ $question->id }}">

            <div style="margin-top:20px;">
                <label style="display:block; padding:10px; border:1px solid #ddd; border-radius:6px; cursor:pointer;">
                    <input type="radio" name="answer" value="A" required>
                    {{ $question->option_a }}
                </label>

                <label style="display:block; padding:10px; border:1px solid #ddd; border-radius:6px; cursor:pointer; margin-top:10px;">
                    <input type="radio" name="answer" value="B" required>
                    {{ $question->option_b }}
                </label>
            </div>

            <button type="submit" style="
                margin-top:20px;
                width:100%;
                padding:12px;
                background:#6c63ff;
                border:none;
                border-radius:8px;
                color:white;
                font-size:18px;
                cursor:pointer;">
                Next
            </button>

        </form>

    </div>

</div>

@endsection
