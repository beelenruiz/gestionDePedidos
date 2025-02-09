<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){
        $pedidos = Pedidos::with('user')
        -> where('estado', 'Pendiente') -> orderBy('id', 'desc') -> paginate(5);
        
        return view('welcome', compact('pedidos'));
    }
}
