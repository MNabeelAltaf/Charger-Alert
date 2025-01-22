<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'path', 'thumbnail', 'category_id','position', 'animation_type'];

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
