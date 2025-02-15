<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Menu extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];


    //untuk ngakalin Route::resource yang default detail berdasarkan id, di ubah menjadi slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class); // join ke table kategori, 1 menu 1 kategori
    }
}
