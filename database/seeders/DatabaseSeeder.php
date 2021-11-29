<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Menu;
use App\Models\Kategori;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //user
        User::create([
            'name' => 'qbotsista',
            'username' => 'qbotsista',
            'email' => 'qbotsista@gmail.com',
            'password' => bcrypt('12345')
        ]);

        //kategori
        Kategori::create([
            'nama_kategori' => 'Foods',
            'slug_kategori' => 'foods'
        ]);

        Kategori::create([
            'nama_kategori' => 'Drinks',
            'slug_kategori' => 'drinks'
        ]);

        Kategori::create([
            'nama_kategori' => 'Cake',
            'slug_kategori' => 'cake'
        ]);

        //menu
        Menu::create([
            'nama' => 'Tea Jus',
            'slug' => 'tea-jus',
            'kategori_id' => 2,
            'harga' => 15000,
            'keterangan' => 'OK'
        ]);
    }
}
