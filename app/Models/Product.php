<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = ['size' => 'array', 'cake' => 'array', 'vegetable' => 'array', 'meat' => 'array', 'sauce' => 'array',];

    protected $fillable = ['name', 'size', 'cake', 'vegetable', 'meat', 'sauce', 'price', 'user_id'];


    use HasFactory;

    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo('App\Models\User');

    }
}
