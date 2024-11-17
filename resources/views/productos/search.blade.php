@extends('layouts.main')

@section('contenido')

<h2>Búsqueda de Productos</h2>

<form action="{{ route('productos.search') }}" method="POST">
    @csrf
    <select name="categoria" required>
        <option value="">[- SELECCIONE -]</option>
        @foreach ($categorias as $item)
            <option value="{{ $item->id_categoria }}" >{{ $item->descripcion }}</option>
        @endforeach
    </select>
    <button type="submit">Buscar</button>
</form>

<table>
    <thead>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Marca</th>
        <th>Precio</th>
        <th>&nbsp;</th>
    </thead>
    <tbody>
    @foreach ($productos as $item)
        <tr>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->categoria }}</td>
            <td>{{ $item->marca }}</td>
            <td>{{ $item->precio }}</td>
            <td>
                <a href="{{ route('productos.edit', ['id' => $item->id_producto]) }}">Editar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection