@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@push('styles')
<style>

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .stat-card {
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.10);
        text-align: center;
    }

    .stat-title {
        font-size: 18px;
        color: #555;
        margin-bottom: 10px;
    }

    .stat-number {
        font-size: 32px;
        font-weight: bold;
        color: #6c63ff;
    }

</style>
@endpush


@section('content')

<h1>Dashboard Overview</h1>
<p>Welcome, Admin. Here are the latest system statistics:</p>

<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-title">Total Users</div>
        <div class="stat-number">132</div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Job Applications</div>
        <div class="stat-number">48</div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Personality Tests Taken</div>
        <div class="stat-number">86</div>
    </div>

</div>

@endsection
