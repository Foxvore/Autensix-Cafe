<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu.index', [
            "menus" => Menu::all()
        ]);
    }

    public function create()
    {
        return view("menu.create");
    }

    public function store(Request $request)    {
        $validatedData = $request->validate([
            'nameMenu' => 'required',
            'descMenu' => 'required',
            'photoMenu' => 'image|file',
            'price' => 'required'
        ]);

        if ($request->file('photoMenu')) {
           $validatedData['photoMenu'] = $request->file('photoMenu')->store('images');
        }

        Menu::create($validatedData);

        return redirect('/menu')->with('success', "Menu data has been created");
    }

    public function show(Menu $menu)
    {
       // 
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', [
            'menu' => $menu
        ]);
    }

    public function update(Request $request, Menu $menu)
    {
        $rules = [
            'nameMenu' => 'required',
            'descMenu' => 'required',
            'photoMenu' => 'image|file',
            'price' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('photoMenu')) {
            Storage::delete($menu->photoMenu);
            $validatedData['photoMenu'] = $request->file('photoMenu')->store('images');
        }

        Menu::where("id", $menu->id)->update($validatedData);

        return redirect('/menu')->with('success', 'Menu data has been edited!');
    }

    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);

        if ($menu->photoMenu) {
            Storage::delete($menu->photoMenu);
        }

        return redirect('/menu')->with('success', 'Menu data has been Deleted!');
    }
}
