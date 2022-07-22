<?php
use Cviebrock\EloquentTaggable\Taggable;
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersBlog extends Model{
    use SoftDeletes;
   
    protected $fillable = [
        'category','title','description','image','highlightedText'
    ];
    

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likedUsers()
    {
        return $this->belongsToMany('App\User')->withTimesStamps();
    }
  
  

}

