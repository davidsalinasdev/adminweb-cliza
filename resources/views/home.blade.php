@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="container p-3 my-3 bg-danger text-white" style="border-radius: 15px 15px 15px 15px;">
        <h1 class="text-center">Gobierno Autónomo Municipal de Cliza</h1>
        <p class="text-center">Sistema de Administración del Portal Web</p>
    </div>
    <div class="text-center">
        <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="Logo institucional" style="max-width: 350px;">
    </div>
</div>
@endsection