<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Menu;
use Redirect;
use Illuminate\Http\RedirectResponse;

class MenuController extends Controller
{
    public function getMenu(){
        $menu = Menu::all();
        return view('backend.menu',['menu' => $menu]);
    }

    public function setMenu(Request $request){
        $data = $request->validate([
            'title' => ['required'],
            'link' => ['required'],
            'is_active' => 'nullable|boolean',
        ]);
        $menu = new Menu();
        $menu->menu_name = $data['title'];
        $menu->link = $data['link'];
        $menu->is_active = $request->has('is_active') ? 1 : 0;
        $menu->save();
        return redirect('/menu')->with('success','Data update success');
    }

    public function editMenu(Request $request){
        $data = $request->validate([
            'menu_name' => ['required'],
            'menu_link' => ['required'],
            'menu_id' => ['required'],
            'is_active' => 'nullable|boolean',
        ]); 
        $menuId = $data['menu_id'];
            $menu = Menu::find($menuId);
            $menu->menu_name = $data['menu_name'];
            $menu->link = $data['menu_link'];
            $menu->is_active = $request->has('is_active') ? 1 : 0;
            $menu->save();
            return redirect('/menu')->with('success','Data update success');
    }

    public function removeMenu(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'menu_id' => ['required'],
        ]);
        $menuId = $validated['menu_id'];
        $menu = Menu::find($menuId);
        //dd($menu);
        $menu->delete();
        return redirect('/menu')->with('success', 'Page removed successfully');
    }
}
