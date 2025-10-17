<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'img',
        'condition_id',
        'name',
        'brand',
        'content',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'item_category', 'item_id', 'category_id');
    }

    public function favorites(){
        return $this->hasMany(Favorite::class,'item_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'item_id');
    }

    public function is_liked_by_auth_user(){
        $id = Auth::id();

        $likers = array();
        foreach ($this->favorites as $favorite) {
            array_push($likers, $favorite->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
