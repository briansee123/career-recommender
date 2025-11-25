@extends('layouts.user')

@section('title', 'Your Personality Result')

@push('styles')
<style>
    .result-box {
        background:white;
        padding:20px;
        border-radius:12px;
        width:90%;
        max-width:600px;
        margin:20px auto;
        box-shadow:0 4px 15px rgba(0,0,0,0.1);
    }

    .title {
        font-size:24px;
        font-weight:bold;
        text-align:center;
        margin-bottom:20px;
    }

    .mbti {
        font-size:32px;
        font-weight:bold;
        text-align:center;
        color:#6c63ff;
        margin-bottom:20px;
    }

    .job-box {
        background:#f7f7f7;
        padding:15px;
        border-radius:10px;
        margin-top:20px;
    }

    .job-box h3 {
        color:#444;
        margin-bottom:10px;
    }
</style>
@endpush

@section('content')

<div class="result-box">

    <div class="title">Your Personality Type</div>

    <div class="mbti">{{ $mbti }}</div>

    <hr>

    <h3>Scores</h3>
    <p>E: {{ $scores['E'] }} | I: {{ $scores['I'] }}<br>
       S: {{ $scores['S'] }} | N: {{ $scores['N'] }}<br>
       T: {{ $scores['T'] }} | F: {{ $scores['F'] }}<br>
       J: {{ $scores['J'] }} | P: {{ $scores['P'] }}</p>

    <div class="job-box">
        <h3>Career Suggestions</h3>

        <p>{{ $career }}</p>
    </div>

</div>

<h3>AI Career Recommendations</h3>
<div style="padding: 15px; background: #f8f8ff; border-radius: 10px; margin-top: 10px;">
    {!! nl2br(e($ai)) !!}
</div>


@endsection
