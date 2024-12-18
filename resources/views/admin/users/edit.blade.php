@extends('layouts.admin')

@section('content')
    <h1>Edit Pengguna</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" required>

        <label for="password">Password (kosongkan jika tidak ingin mengubah):</label>
        <input type="password" name="password" id="password">

        <label for="password_confirmation">Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation">

        <button type="submit">Update</button>
    </form>
@endsection
