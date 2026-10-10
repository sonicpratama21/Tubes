@extends('layouts.app')
@section('title', 'Tambah Kamar')

@section('content')
    <h1>Tambah Kamar</h1>
    <form action="{{ route('kamar.store') }}" method="POST">
        @csrf
        @include('kamar._form')
    </form>
@endsection