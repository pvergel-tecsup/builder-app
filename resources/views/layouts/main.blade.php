<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejemplo de Query Builder</title>
</head>
<body>
    <h1>Productos</h1>
    <ul>
        <li><a href="{{ route('productos.index') }}">Inicio</a></li>
        <li><a href="{{ route('productos.list') }}">Consulta</a></li>
        <li><a href="{{ route('productos.create') }}">Agregar</a></li>
    </ul>
    @yield('contenido')
</body>
</html>