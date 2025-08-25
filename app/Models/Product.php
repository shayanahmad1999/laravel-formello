<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id', 'title', 'slug', 'description', 'quantity', 'price', 'in_stock', 'status'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
