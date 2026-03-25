@extends('Layouts.app')
@section('content')

    <h1>Sumar dos numeros</h1>
    <form action="/suma" method="post">
        @csrf
        <label for="num1">Numero 1: </label>
        <input type="number" id="num1" name="num1" required>
        <br>
        <br>
        <label for="num2">Numero 2:</label>
        <input type="number" id="num2" class="num2" name="num2" required>
        <br>
        <br>
        <input type="submit" value="Sumar">
    </form>
    <br>
    @if($resultado != null)
    <h2>resultado:{{ $resultado }}</h2>        
    @endif
    <a href="/suma">Volver </a>
@endsection
