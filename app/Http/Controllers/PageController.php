<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Page;
use Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public  $page;
    public function __construct() {
        $this->page = Page::all();
    }

    public function getPage(){
        $page = $this->page;
        return view('backend.pages',['page' => $page]);
    }

    public function createPage(Request $request): RedirectResponse{
        $page = $this->page;
       
        // Get the content from the textarea
        $title = $request->input('title');
        $content = $request->input('code');
        $status = $request->input('is_active');

            $pageDetail = new Page;
            $pageDetail->title = $title;
            $pageDetail->status = $request->has('is_active') ? 1 : 0;
            $pageDetail->content = $content;
            $pageDetail->save();
            
        return redirect('/page')->with('success','Page edit success');
        //return view('/backend.pages',['page' => $page]);
    }         

    public function setPage(Request $request): RedirectResponse{
        $page = $this->page;
       
        // Get the content from the textarea
        $title = $request->input('title');
        $content = $request->input('code');
        $status = $request->input('is_active');
        $pageId = $request->input('pageId');
            $pageDetail =  Page::find($pageId);
            $pageDetail->title = $title;
            $pageDetail->status = $request->has('is_active') ? 1 : 0;
            $pageDetail->content = $content;
            $pageDetail->save();
            
        return redirect('/page')->with('success','Page edit success');
        //return view('/backend.pages',['page' => $page]);
    }       

        //Go to edit page
    public function editPage(Request $request){
        $page = $this->page;
        $validated = $request->validate([
            'page_id' => ['required'],
            'page_title' => ['required'],
            'is_active' => 'nullable|boolean',
            'page_status' => ['required'],
        ]);

        $title = $validated['page_title'];
        $pageId = $validated['page_id'];
        $status = $validated['page_status'];
        $pageTitle = Page::find($pageId);
        $content = $pageTitle->content;
        return view('/backend/editPage',compact('title', 'pageId','page','status', 'content'));
    }


    public function removePage(Request $request): RedirectResponse
    {
        //dd($request);
        $validated = $request->validate([
            'page_id' => ['required'],
        ]);
        $pageId = $validated['page_id'];
        $page = Page::find($pageId);
        $pageTitle = $page->title;
        $page->delete();
        return redirect('/page')->with('success', 'Page removed successfully');
    }

}
