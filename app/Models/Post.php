<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];
    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, $filters) //Post::newQuery()->filter()
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%'));
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    //    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    //    {
    //        return $this->belongsTo(\App\Models\User::class, 'user_id');
    //    }

}
