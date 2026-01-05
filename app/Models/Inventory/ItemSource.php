<?php

namespace App\Models\Inventory;

use App\Models\Inventory\Inventory;
use Illuminate\Database\Eloquent\Model;

class ItemSource extends Model
{
    protected $fillable = ['item_source_name','item_source_description','item_source_platform','item_source_type','active'];

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'id', 'item_source_id');
    }
}
