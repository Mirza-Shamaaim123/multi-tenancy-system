<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $fillable = [
        'name',
        'code',
        'description',
        'category_id',
        'image',
        'status',
    ];
    public function category()
{
    return $this->belongsTo(Category::class);
}

}
