<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = DB::table('productos')
                         ->select('nombre','marca','precio')
                         ->orderBy('nombre', 'asc')
                         ->get();
        return view('productos.index', compact('productos'));
    }

    public function list()
    {
        $categorias = DB::table('categorias')
                          ->select('id_categoria', 'descripcion')
                          ->get();
        $productos = DB::table('productos')
                         ->join('categorias', 'productos.id_categoria', '=', 'categorias.id_categoria')
                         ->select('productos.id_producto', 'productos.nombre','productos.marca','productos.precio', 'categorias.descripcion as categoria')
                         ->orderBy('productos.nombre', 'asc')
                         ->get();
        return view('productos.search', compact('categorias'), compact('productos'));
    }

    public function search(Request $request)
    {
       $categorias = DB::table('categorias')
                         ->select('id_categoria', 'descripcion')
                         ->get();
       $productos = DB::table('productos')
                        ->join('categorias', 'productos.id_categoria', '=', 'categorias.id_categoria')
                        ->select('productos.id_producto', 'productos.nombre','productos.marca','productos.precio', 'categorias.descripcion as categoria')
                        ->where('productos.id_categoria', $request->categoria)
                        ->orderBy('productos.nombre', 'asc')
                        ->get();
       return view('productos.search', compact('categorias'), compact('productos'));
    }

    public function create()
    {
        $categorias = DB::table('categorias')
                          ->select('id_categoria', 'descripcion')
                          ->get();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        DB::table('productos')->insert([
            'nombre' => $request->nombre,
            'marca' => $request->marca,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'id_categoria' => $request->id_categoria
        ]);
        return redirect()->route('productos.index');
    }

    public function edit(string $id)
    {
        $categorias = DB::table('categorias')
                          ->select('id_categoria', 'descripcion')
                          ->get();
        $producto = DB::table('productos')
                        ->select('id_producto', 'nombre', 'marca', 'precio', 'stock', 'id_categoria')
                        ->where('id_producto', $id)
                        ->first();
        return view('productos.edit', compact('categorias'), compact('producto'));
    }

    public function update(Request $request, string $id)
    {
        DB::table('productos')
            ->where('id_producto', $id)
            ->update([
                'nombre' => $request->nombre,
                'marca' => $request->marca,
                'precio' => $request->precio,
                'stock' => $request->stock,
                'id_categoria' => $request->id_categoria
            ]);
        return redirect()->route('productos.index');
    }
}
