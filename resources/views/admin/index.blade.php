<?php
@extends('layouts.layout')

@section('title', 'Administration')

@section('content')
    <div class="content-wrapper">
        <h1 class="h3 mb-4 text-gray-800">Gestion des utilisateurs</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle actuel</th>
                    <th>Changer le rôle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->first_name }} {{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form action="{{ route('admin.updateRole', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="role" class="form-select">
                                    @foreach (\App\Models\User::ROLES as $role)
                                        <option value="{{ $role }}" {{ $user->role === $role ? 'selected' : '' }}>
                                            {{ $role }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Modifier</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<?php
Route::middleware(['auth', 'role:Administrateur'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
