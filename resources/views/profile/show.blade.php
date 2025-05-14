@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Mon Profil</h2>
    <ul class="space-y-2">
        <li><strong>Nom :</strong> {{ $user->name }}</li>
        <li><strong>Email :</strong> {{ $user->email }}</li>
        <li><strong>Date d'inscription :</strong> {{ $user->created_at->format('d/m/Y') }}</li>
    </ul>
</div>
@endsection
