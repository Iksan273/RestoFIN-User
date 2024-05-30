<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'price', 'imageUrl'];
    // public $timestamps = false;

    public function categories(){
        return $this->belongsTo(Category::class, "categories_id");
    }
}
