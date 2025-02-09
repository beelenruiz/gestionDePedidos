<?php

namespace App\Livewire\Forms;

use App\Models\Pedidos;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormNewPedido extends Form
{
    #[Rule(['required', 'string', 'min:5', 'max:20', 'unique:pedidos, nombre'])]
    public string $nombre = "";

    #[Rule(['required', 'in:Procesado,Pendiente'])]
    public string $estado = "";

    #[Rule(['required'])]
    public float $cantidad;

    public function formStore(){
        $this -> validate();
        Pedidos::create([
            'nombre' => $this -> nombre,
            'user_id' => Auth::user()->id,
            'estado' => $this -> estado,
            'cantidad' => $this -> cantidad
        ]);
    }

    public function formReset(){
        $this -> resetValidation();
        $this -> reset();
    }
}
