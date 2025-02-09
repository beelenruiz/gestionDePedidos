<?php

namespace App\Livewire;

use App\Livewire\Forms\FormNewPedido;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewPedido extends Component
{
    use WithFileUploads;
    public bool $openNew = false;
    public FormNewPedido $cform;

    public function render()
    {
        return view('livewire.new-pedido');
    }

    public function store(){
        $this -> cform -> formStore();
        $this -> cancelar();
        $this -> dispatch('onPedidoNuevo') -> to(UsersPedidos::class);
        $this -> dispatch('mensaje', 'Nuevo Pedido');
    }

    public function cancelar(){
        $this -> openNew = false;
        $this -> cform -> formReset();
    }
}
