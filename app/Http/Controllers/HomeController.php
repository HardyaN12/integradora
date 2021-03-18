<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrito;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', ['productos' => Producto::all()]);
    }

    public function agregar(Request $request)
    {
        $usuario = Auth::user();
        $carrito = $usuario->carrito;
        if (is_null($carrito)) {
            $carrito = new Carrito();
            $usuario->carrito()->save($carrito);
        }
        $producto = Producto::find($request->id_producto);
        $carrito->productos()->syncWithoutDetaching([$producto->id => ['cantidad' => 1]]);
        return view('carrito', ['productos' => $carrito->productos]);

    }

    public function mostrar(Request $request)
    {
        $usuario = Auth::user();
        $carrito = $usuario->carrito;
        if (is_null($carrito)) {
            $carrito = new Carrito();
            $usuario->carrito()->save($carrito);
        }
        return view('carrito', ['productos' => $carrito->productos]);
    }

    public function modificar(Request $request)
    {
        $usuario = Auth::user();
        $carrito = $usuario->carrito;
        $cantidad = $request->cantidad;
        $producto = Producto::find($request->id_producto);
        $carrito->productos()->updateExistingPivot($producto->id, ['cantidad' => $cantidad]);
        return view('carrito', ['productos' => $carrito->productos]);
    }

    public function eliminar(Request $request)
    {
        $usuario = Auth::user();
        $carrito = $usuario->carrito;
        $cantidad = $request->cantidad;
        $producto = Producto::find($request->id_producto);
        $carrito->productos()->detach($producto->id);

        return view('carrito', ['productos'=>$carrito->productos]);
    }

    //  Editar perfil de comprador

    public function editar()
    {
        return view('perfil');
    }

}
