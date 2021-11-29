<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Kategori extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];


    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function sluggable(): array
    {
        return [
            'slug_kategori' => [
                'source' => 'nama_kategori'
            ]
        ];
    }

    public function menu()
    {
        return $this->hasMany(Menu::class); // join ke table Menu,  1 kategori banyak menu
    }
}
