<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        // 'created_at',
        'title',
        'image',
        'category_id',
        'content',
        'no_of_views',
        'published',
        'trending',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
}
}