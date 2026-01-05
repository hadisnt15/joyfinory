<?php

namespace App\Models\Inventory;

use App\Models\Inventory\Item;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $fillable = ['item_category_name','item_category_description','active'];

    public function items()
    {
        return $this->hasMany(Item::class, 'id', 'item_category_id');
    }

    // public function inventories()
    // {
    //     return $this->hasMany(Inventory::class, 'id', 'in')
    // }
}
