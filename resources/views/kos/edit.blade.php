@extends('layouts.app')
@section('title', 'Edit Kos')

@section('content')
    <h1>Edit Kos</h1>
    <form action="{{ route('kos.update', $kos) }}" method="POST">
        @csrf
        @method('PUT')
        @include('kos._form')
    </form>
@endsection