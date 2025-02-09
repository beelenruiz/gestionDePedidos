<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedidos extends Model
{
    /** @use HasFactory<\Database\Factories\PedidosFactory> */
    use HasFactory;
    
    protected $fillable = ['nombre', 'estado', 'cantidad', 'user_id'];

    //Relacion 1:n con users
    public function user(): BelongsTo {
        return $this -> belongsTo(User::class);
    }
}