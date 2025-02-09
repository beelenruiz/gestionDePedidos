<?php

namespace App\Livewire\Forms;

use App\Models\Pedidos;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormUpdatePedido extends Form
{
    public ?Pedidos $pedido=null;

    #[Rule(['required', 'string', 'min:5', 'max:20', 'unique:pedidos,nombre'])]
    public string $nombre = "";

    #[Rule(['required', 'in:Procesado,Pendiente'])]
    public string $estado = "";

    #[Rule(['required'])]
    public ?float $cantidad = null;

    public function rules(): array {
        return [
            'nombre' => ['required', 'string', 'min:5', 'max:20', 'unique:pedidos,nombre,'. $this->pedido->id]
        ];
    }

    public function setPedido(Pedidos $pedidos) {
        $this -> pedido = $pedidos;
        $this -> nombre = $pedidos -> nombre;
        $this -> estado = $pedidos -> estado;
        $this -> cantidad = $pedidos -> cantidad;
    }

    public function formUpdate(){
        $this -> validate();

        $this -> pedido -> update([
            'nombre' => $this -> nombre,
            'estado' => $this -> estado,
            'cantidad' => $this -> cantidad
        ]);
    }

    public function formReset(){
        $this -> resetValidation();
        $this -> reset();
    }
}
