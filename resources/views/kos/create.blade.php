@extends('layouts.app')
@section('title', 'Tambah Kos')

@section('content')
    <h1>Tambah Kos</h1>
    <form action="{{ route('kos.store') }}" method="POST">
        @csrf
        @include('kos._form')
    </form>
@endsection