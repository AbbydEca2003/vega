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

    // public function setPage(Request $request){
    //     $data = $request->validate([
    //         'title' => ['required'],
    //     ]);
    //     $page = new Page;
    //     $page->title = $data['title'];
    //     $page->save();
    //     return redirect('/page')->with('success','Data update success');
    // }

    public function createPage(Request $request): RedirectResponse{
        $page = $this->page;
        
        $message = $request->validate([
            'title' => ['required'],
            'code' => ['required'],
            'is_active' => 'nullable|boolean',
        ]);
       //dd($page);
        // Get the content from the textarea
        $title = $request->input('title');
        $content = $request->input('code');
        
       
        // Define the file path
        $filePath = resource_path('views/frontend/'.$title.'.blade.php');
        
        if (!File::exists($filePath)) {
            $pageDetail = new Page;
            $pageDetail->title = $message['title'];

            $pageDetail->status = $request->has('is_active') ? 1 : 0;
            $pageDetail->save();
            
        }
        // Write the content to the file
        File::put($filePath, $content);
        return redirect('/page')->with(['page' => $page])->with('success','Page edit success');
        //return view('/backend.pages',['page' => $page]);
    }         

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
        // Path to the file within the resources/views directory
        $filePath = resource_path('views/frontend/'.$pageTitle->title.'.blade.php');
            
        // Check if the file exists
        if (!File::exists($filePath)) {
            abort(404, 'File not found.');
        }
    
        // Read the file content
        $fileContent = File::get($filePath);
        return view('/backend/editPage',compact('title', 'fileContent', 'pageId','page','status'));
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
        $filePath = resource_path('views/frontend/'.$pageTitle.'.blade.php');
        File::delete($filePath);
        //Artisan::call('view:clear');
        $page->delete();
        return redirect('/page')->with('success', 'Page removed successfully');
    }

}
