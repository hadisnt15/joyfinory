<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;

class FinanceCategory extends Model
{
    // protected $table = 'finance_categories';

    protected $fillable = ['category_name','category_description','active'];

    public function finances()
    {
        return $this->hasMany(Finance::class, 'id', 'category_id');
    }
}
