@extends('layouts.user')

@section('content')
<div class="test-container">

    <h2>MBTI Personality Test</h2>
    <p>Answer all questions below:</p>

    <form action="{{ route('user.test.answer') }}" method="POST">
        @csrf

        @foreach ($questions as $q)
            <div class="question-box">
                <h4>{{ $loop->iteration }}. {{ $q->question }}</h4>

                <label>
                    <input type="radio" name="q{{ $q->id }}" value="A" required>
                    {{ $q->option_a }}
                </label><br>

                <label>
                    <input type="radio" name="q{{ $q->id }}" value="B" required>
                    {{ $q->option_b }}
                </label><br>
            </div>

            <hr>
        @endforeach

        <button type="submit" class="btn-submit">Submit Test</button>
    </form>

</div>


<style>
.test-container {
    width: 90%;
    max-width: 700px;
    margin: 30px auto;
    background: white;
    padding: 25px;
    border-radius: 12px;
}

.question-box {
    margin-bottom: 20px;
}

.btn-submit {
    padding: 12px 20px;
    background: #4caf50;
    color: white;
    border-radius: 8px;
    font-size: 18px;
    border: none;
    cursor: pointer;
}
</style>
@endsection
