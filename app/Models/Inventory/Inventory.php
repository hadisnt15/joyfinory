<?php

namespace App\Models\Inventory;

use App\Models\User;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemSource;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['user_id','date','type','desc','quantity','unit_price','item_source_id','item_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inventoryCategories()
    {
        return $this->belongsTo(ItemCategory::class, 'inventory_category_id', 'id');
    }
    
    public function inventorySources()
    {
        return $this->belongsTo(ItemSource::class, 'item_source_id', 'id');
    }
    
    public function inventoryItems()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    // public function inventoryCategoryItems()
    // {
    //     return $this->belongsTo(Item::class, 'item_id', 'id');
    // }

}
