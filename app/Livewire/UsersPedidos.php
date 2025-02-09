<?php

namespace App\Livewire;

use App\Livewire\Forms\FormUpdatePedido;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class UsersPedidos extends Component
{
    public FormUpdatePedido $uform;
    public bool $openUpdate=false;

    #[On('onPedidoNuevo')]
    public function render()
    {
        $pedidos = Pedidos::where('user_id', Auth::user() -> id) -> get();
        return view('livewire.users-pedidos', compact('pedidos'));
    }

    public function cambiarEstado(Pedidos $pedidos)
    {
        $this->authorize('update', $pedidos);
        $estado = ($pedidos->estado == 'Pendiente') ? 'Procesado' : 'Pendiente';
        $pedidos->update([
            'estado' => $estado,
        ]);
    }

    // metodo para borrar
    public function delete(Pedidos $pedidos) {
        $this -> authorize('delete', $pedidos);
        $pedidos -> delete();
        $this -> dispatch('mensaje', 'Pedido eliminado');
    }

    //metodo para editar
    public function edit(Pedidos $pedidos){
        $this->authorize('update', $pedidos);
        $this->uform->setPedido($pedidos);
        $this->openUpdate=true;
    }

    public function update(){
        $this->authorize('update', $this->uform->pedido);
        $this->uform->formUpdate();
        $this->cancelar();
        $this->dispatch('mensaje', 'Pedido editado');
    }

    public function cancelar(){
        $this->openUpdate=false;
        $this->uform->formReset();
    }
}
