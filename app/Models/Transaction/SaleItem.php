<?php

namespace App\Models\Transaction;

use App\Models\Master\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = ['sale_id', 'item_id', 'price', 'qty', 'total_price'];

    protected $table = 'sale_item';

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
