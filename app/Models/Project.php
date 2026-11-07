<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
