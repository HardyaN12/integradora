<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = DB::table('pedidos')
            ->join('users', 'users_id', '=', 'pedidos.users_id')
            ->select('pedidos_id', 'pedidos.estado','pedidos.fecha', 'users.name as cliente')
            ->paginate(1);
        return view('admin.home', ['pedidos'=>$pedidos]);
    }
}
