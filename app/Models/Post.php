<?php

namespace App\Models;

use Faker\Provider\en_UG\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];
    protected $guarded = [];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

}
