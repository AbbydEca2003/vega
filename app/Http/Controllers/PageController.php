<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Page;
use Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function getPage(){
        $page = Page::all();
        return view('backend.pages',['page' => $page]);
    }

    public function setPage(Request $request){
        $data = $request->validate([
            'title' => ['required'],
            'message' => ['required'],
        ]);
        $page = new Page;
        $page->title = $data['title'];
        $page->message = $data['message'];
        $page->save();
        return redirect('/page')->with('success','Data update success');
    }

    // public function editPage(Request $request){
        
    //     $data = $request->validate([
    //         'page_id' => ['required'],
    //     ]);
    //     return redirect('/editPage');
        // if($request->input('submit') === 'Save'){
        //     $page = Page::find($data['page_id']);
        //     $page->title = $data['title'];
        //     $page->message = $data['message'];
        //     $page->save();
        //     return redirect('/')->with('success','Data update success');
        // }
    // }

    public function removePage(Request $request): RedirectResponse
    {
        //dd($request);
        $validated = $request->validate([
            'page_id' => ['required'],
        ]);
        $pageId = $validated['page_id'];
        $page = Page::find($pageId);
        $page->delete();
        return redirect('/page')->with('success', 'Page removed successfully');
    }

    public function editPage(){
             $data = $request->validate([
            'page_id' => ['required'],
        ]);
        Storage::disk('local')->put('example.txt', 'Contents');
        dd('sa');

    }
}
