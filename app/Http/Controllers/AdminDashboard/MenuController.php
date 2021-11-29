<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\controller;
use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.menu.index', [
            'title' => 'Data Menu',
            'menu' => Menu::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create', [
            'title'     => 'Tambah Menu',
            'kategori'  => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama'          => 'required|max:255',
            'slug'          => 'required|unique:menus',
            'kategori_id'   => 'required',
            'image'         => 'image|file|max:1024', //1024kb = 1mb
            'harga'         => 'required|integer',
            'keterangan'    => 'required'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('menus-images'); //setting penyimpanan .env = FILESYSTEM_DRIVER=public lalu cmd php artisan storage:link . maka dalam folder public akan ada folder storage menu-images . agar gambar bisa di akses public
        }

        Menu::create($validateData);
        return redirect('/admin/menu')->with('success', 'Menu berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('admin.menu.show', [
            'title' => 'Detail Menu',
            'menu'  => $menu
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', [
            'title'     => 'Edit Menu',
            'menu'      => $menu,
            'kategori'  => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $rules = [
            'nama'          => 'required|max:255',
            'kategori_id'   => 'required',
            'image'         => 'image|file|max:1024', //1024kb = 1mb
            'harga'         => 'required|integer',
            'keterangan'    => 'required'
        ];

        if ($request->slug != $menu->slug) {
            $rules['slug'] = 'required|unique:menus';
        }

        $validateData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->imagelama) {
                Storage::delete($request->imagelama);
            }
            $validateData['image'] = $request->file('image')->store('menus-images'); //setting penyimpanan .env = FILESYSTEM_DRIVER=public lalu cmd php artisan storage:link . maka dalam folder public akan ada folder storage blog-images . agar gambar bisa di akses public
        }

        Menu::where('id', $menu->id)->update($validateData);
        return redirect('/admin/menu')->with('success', 'Menu berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    { {
            if ($menu->image) {
                Storage::delete($menu->image);
            }
            Menu::destroy($menu->id);
            return redirect('/admin/menu')->with('success', 'Menu berhasil di hapus');
        }
    }

    //membuat slug otomatis
    public function slugMenu(Request $request)
    {
        $slug = SlugService::createSlug(Menu::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
