@extends('layout.app')

@section('content')
    <main>
        @error('role')
            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
        @enderror
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <p class="breadcrumb-item active" style="font-size: 23px;">Selamat datang, <b>{{ Auth::user()->name }}</b></p>
            <ol class="breadcrumb mb-4">
            </ol>
            <div class="row d-flex justify-content-center">
            </div>
        </div>
    </main>
@endsection
