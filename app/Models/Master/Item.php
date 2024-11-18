<?php

namespace App\Models\Master;

use App\Models\Transaction\Sale;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'price',
        'image',
        'description',
        'stock',
    ];
    protected $table = 'master_items';
}
