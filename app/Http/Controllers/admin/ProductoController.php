<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\Imagen;


class ProductoController extends Controller
{
    public function index()
    {
        $productos = DB::table('productos')
            ->paginate(15);
        return view('admin.producto', ['productos' => $productos]);

    }

    public function filtrar(Request $request)
    {
        $opc = $request->opc;
        $valor = $request->valor;
        $operador = '>=';
        if ($opc == 'nombre') {
            $operador = 'like';
            $valor = $valor . '%';
        }
        $productos = DB::table('productos')
            ->where($opc, $operador, $valor)
            ->paginate(1);
        return view('admin.producto', ['productos' => $productos]);
    }

    public function registrar(Request $request)
    {
        $producto = new Producto();

        $nombre = $request->nombre;
        $precio = $request->precio;
        $descripcion = $request->descripcion;


        if (isset($request->producto_id)) {
            $id = $request->producto_id;
            $producto = Producto::find($id);
        }
        $producto->nombre = $nombre;
        $producto->precio = $precio;
        $producto->descripcion = $descripcion;
        $producto->save();

        if (is_array($request->descImagen) || is_object($request->descImagen)) {

            foreach ($request->descImagen as $clave => $valor) {
                $imagen = new Imagen();
                if (isset($request->idImagen[$clave])) {
                    $id = $request->idImagen[$clave];
                    $imagen = Imagen::find($id);

                }
                $imagen->descripcion = $valor;

                if (isset($request->imagen[$clave])) {
                    $campo = $request->imagen[$clave];
                    $ruta = $campo->store('img/productos');
                    $imagen->ruta = $ruta;

                }

                $producto->imagenes()->save($imagen);
            }





        }
            return redirect()->route('producto_index');
    }

    public function eliminar(Request $request)
    {
        try {
            $idProducto = $request->producto_id;
            Producto::find($idProducto)->delete();
        } catch (\Exception $exception) {
            return redirect()->route('producto_index')
                ->withErrors(['message' => 'producto asociado a un carrito']);
        }
        return redirect()->route('producto_index');

    }

    public function editar($id)
    {
        $producto = Producto::find($id);
        return view('admin.formularioProducto')
            ->with(['producto' => $producto]);
    }
}
