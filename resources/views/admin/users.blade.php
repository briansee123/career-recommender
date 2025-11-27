@extends('layouts.admin')

@section('title', 'User Management')

@push('styles')
<style>

    .top-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .page-title {
        font-size: 26px;
        font-weight: bold;
    }

    .add-btn {
        background: #6c63ff;
        padding: 10px 20px;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        transition: 0.3s;
    }

    .add-btn:hover {
        background: #554fff;
    }

    /* Search Box */
    .search-box input {
        width: 260px;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #aaa;
    }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    th {
        background: #6c63ff;
        color: white;
        padding: 14px;
        text-align: left;
    }

    td {
        padding: 14px;
        border-bottom: 1px solid #ddd;
    }

    .action-btn {
        padding: 6px 12px;
        margin-right: 5px;
        font-size: 14px;
        border-radius: 6px;
        color: white;
        text-decoration: none;
    }

    .edit { background: #17a2b8; }
    .suspend { background: #ffc107; color:black; }
    .ban { background: #dc3545; }
    .delete { background: #6c757d; }

    .action-btn:hover {
        opacity: 0.85;
    }

</style>
@endpush


@section('content')

<div class="top-section">
    <div class="page-title">User Management</div>
    <a class="add-btn" href="#">+ Add New User</a>
</div>

<div class="search-box">
    <input type="text" placeholder="Search user...">
</div>

<br>

<table>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>User Type</th>
        <th>Actions</th>
    </tr>

    {{-- Example Static Rows (Will be dynamic later) --}}
    <tr>
        <td>1</td>
        <td>Brian See</td>
        <td>brian@example.com</td>
        <td style="color:green; font-weight:bold;">Active</td>
        <td>User</td>
        <td>
            <a class="action-btn edit" href="#">Edit</a>
            <a class="action-btn suspend" href="#">Suspend</a>
            <a class="action-btn ban" href="#">Ban</a>
            <a class="action-btn delete" href="#">Delete</a>
        </td>
    </tr>

    <tr>
        <td>2</td>
        <td>Admin Master</td>
        <td>admin@example.com</td>
        <td style="color:green; font-weight:bold;">Active</td>
        <td style="font-weight:bold;">Admin</td>
        <td>
            <a class="action-btn edit" href="#">Edit</a>
            <a class="action-btn suspend" href="#">Suspend</a>
            <a class="action-btn ban" href="#">Ban</a>
            <a class="action-btn delete" href="#">Delete</a>
        </td>
    </tr>

</table>

@endsection
