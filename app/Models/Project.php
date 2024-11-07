<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    //mass assignment
    protected $fillable = [
        'title',
        'slug',
        'url',
        'cover',
        'description',
        'type_id'
    ];

    //Relationships
    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
