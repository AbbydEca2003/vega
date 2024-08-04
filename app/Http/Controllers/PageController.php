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

    public function setPage(Request $request){
        $data = $request->validate([
            'title' => ['required'],
        ]);
        $page = new Page;
        $page->title = $data['title'];
        $page->save();
        return redirect('/page')->with('success','Data update success');
    }

    public function createPage(Request $request){
        $page = $this->page;
        $message = $request->validate([
            'title' => ['required'],
            'code' => ['required'],
        ]);
        // Get the content from the textarea
        $title = $request->input('title');
        $content = $request->input('code');

        $pageDetail = new Page;
        $pageDetail->title = $message['title'];
        $pageDetail->status = 'active';
        $pageDetail->save();
        //dd($message);
        // Define the file path
        $filePath = resource_path('views/frontend/'.$title.'.blade.php');
       
        // Write the content to the file
        File::put($filePath, $content);
        return view('/backend.pages',['page' => $page]);
    }         

    public function editPage(Request $request){
        $validated = $request->validate([
            'page_id' => ['required'],
        ]);
        $pageId = $validated['page_id'];
        $pageTitle = Page::find($pageId);
        // Path to the file within the resources/views directory
        $filePath = resource_path('views/frontend/'.$pageTitle->title.'.blade.php');
            
        // Check if the file exists
        if (!File::exists($filePath)) {
            dd('error');
            abort(404, 'File not found.');
        }
    
        // Read the file content
        $fileContent = File::get($filePath);
    
        return view('/backend/editPage',['info'=>$fileContent]);
    }

    public function SaveEditPage(Request $request){
        
        $data = $request->validate([
            'page_id' => ['required'],
        ]);
        return redirect('/saveEditPage');
        if($request->input('submit') === 'Save'){
            $page = Page::find($data['page_id']);
            $page->title = $data['title'];
            $page->message = $data['message'];
            $page->save();
            return redirect('/')->with('success','Data update success');
        }
    }

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

}
