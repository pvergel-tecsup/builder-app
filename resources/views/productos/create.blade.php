@extends('layouts.main')

@section('contenido')

<h2>Nuevo Producto</h2>

<form action="{{ route('productos.create') }}" method="POST">
    @csrf

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required><br>

    <label for="marca">Marca</label>
    <input type="text" name="marca"><br>

    <label for="precio">Precio</label>
    <input type="number" name="precio" required><br>

    <label for="stock">Stock</label>
    <input type="number" name="stock" required><br>

    <label for="id_categoria">Categoría</label>
    <select name="id_categoria">
        <option value="">[ SELECCIONE ]</option>
        @foreach ($categorias as $item)
            <option value="{{ $item->id_categoria }}">{{ $item->descripcion }}</option>
        @endforeach
    </select><br>

    <button type="submit">Enviar</button> 
    <a href="{{ route('productos.index') }}">Regresar</a>
</form>

@endsection