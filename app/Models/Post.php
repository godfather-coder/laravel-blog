<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected  $fillable=[
        'name',
        'description',
        'text',
        'image',
        'user_id'
    ];

    public function user() :belongsTo{
        return  $this->belongsTo(User::class,'user_id','id');
    }

    public function comments() :hasMany{
        return  $this->hasMany(Comments::class,'post_id','id');
    }
}
