<?php

namespace App\Models\Finance;

use App\Models\User;
use App\Models\Finance\FinanceCategory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $fillable = ['user_id','date','type','category_id','desc','amount','inventory_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function financeCategories()
    {
        return $this->belongsTo(FinanceCategory::class, 'category_id', 'id');
    }
}
