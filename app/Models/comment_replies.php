<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_replies extends Model
{
    use HasFactory;
    protected $fillable = ['post_id','comment_id','comment'];

}
