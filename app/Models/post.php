<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class post extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['gallery_id','user_id','category_id','title','description', 'status'];

    public function tags(){
        return $this->belongsToMany(tags::class,'post_tag', 'post_id', 'tag_id');
    }

   
 public function category(){
        return $this->belongsTo(category::class, 'category_id','id');
    }
    public function user(){
        return $this->belongsTo(user::class,'user_id', 'id');
    }

    public function gallery(){
        return $this->belongsTo(gallery::class);
    }
    public function comments(){
        return $this->hasMany(comment::class);
    }
}