<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
        'precio_venta' => 'decimal:2',
    ];

    protected $fillable = [
        'nombre',
        'precio_venta',
        'categoria_id',
        'descripcion',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categoria_id', 'id');
    }
}
