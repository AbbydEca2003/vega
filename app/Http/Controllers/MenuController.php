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
        ]);
        $menu = new Menu();
        $menu->menu_name = $data['title'];
        $menu->link = $data['link'];
        $menu->save();
        return redirect('/menu')->with('success','Data update success');
    }

    public function editMenu(Request $request){
        dd('s');
        $data = $request->validate([
            'menu_name' => ['required'],
            'link' => ['required'],
            'user_id' => ['required'],
        ]);
        $userId = $data['user_id'];
        if ($request->input('submit') === 'Save menu') {
            $menu = Menu::find($userId);
            $menu->menu_name = $data['menu_name'];
            $menu->link = $data['link'];
            $menu->save();
            return redirect('/menu')->with('success','Data update success');
        }else{
            Menu::destroy($userId);
            return redirect('/menu')->with('success','User removed success');
        }
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
