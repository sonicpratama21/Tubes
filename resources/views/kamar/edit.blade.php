@extends('layouts.app')
@section('title', 'Edit Kamar')

@section('content')
    <h1>Edit Kamar</h1>
    <form action="{{ route('kamar.update', $kamar) }}" method="POST">
        @csrf
        @method('PUT')
        @include('kamar._form')
    </form>
@endsection