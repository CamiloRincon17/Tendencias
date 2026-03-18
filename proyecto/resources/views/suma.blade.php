<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma</title>
</head>
<body>  
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
    resultado: {{ $suma }}
</body>
</html>