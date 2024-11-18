<?php

namespace App\Models\Transaction;

use App\Models\Master\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['sale_id', 'total'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'sale_item', 'sale_id', 'item_id')
            ->withPivot('qty');
    }
}
