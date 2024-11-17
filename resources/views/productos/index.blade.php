@extends('layouts.main')

@section('contenido')

<h2>Lista de Productos</h2>
<table>
    <thead>
        <th>Nombre</th>
        <th>Marca</th>
        <th>Precio</th>
    </thead>
    <tbody>
    @foreach ($productos as $item)
        <tr>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->marca }}</td>
            <td>{{ $item->precio }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection