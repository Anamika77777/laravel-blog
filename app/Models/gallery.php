<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    use HasFactory;

public $uploadDirectory = '/storage/auth/posts/';

    public const POST_IMAGE = 1;

    protected $fillable = [
        'id',
        'image', // Add this line
        'type', // Add this line
    ];


    public function image():Attribute
    {
        return Attribute::make(
            get: fn ($image)=> $this->uploadDirectory. $image
        );
    }
}
