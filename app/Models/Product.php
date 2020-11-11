<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function imageable(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
    public function editPath() {
        return url("/dashboard/edit-product/{$this->id}");
    }
}
