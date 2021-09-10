<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price','type','image','tags','category_id'];

    public function setCategoryAttribute($value)
    {
        $this->attributes['tags'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['tags'] = json_decode($value);
    }
}
