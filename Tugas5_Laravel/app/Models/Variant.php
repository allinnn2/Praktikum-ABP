<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'processor', 'memory', 'storage', 'product_id'];

    // Relasi: Varian ini milik produk siapa?
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}