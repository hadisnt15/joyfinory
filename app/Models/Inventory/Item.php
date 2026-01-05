<?php

namespace App\Models\Inventory;

use App\Models\Inventory\ItemCategory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['item_name','item_description','item_uom','item_category_id','active'];

    public function itemCategories()
    {
        return $this->belongsTo(ItemCategory::class, 'item_category_id', 'id');
    }

    public function itemInventories()
    {
        return $this->hasMany(Inventory::class, 'id', 'item_id');
    }
}
