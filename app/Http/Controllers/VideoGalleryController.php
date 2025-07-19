<?php

namespace App\Http\Controllers;

use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoGalleryController extends Controller
{
    

    public function index(Request $request, ?int $id = null){

     
        $editgallery = null;
        if ($id != null) {
            $editgallery = VideoGallery::find($id);
        }

        $searchValue = $request->query("search", null);
        if ($searchValue != null) {
            $allgallery = VideoGallery::where("title", "like", "%" . $searchValue . "%")->orderBy('id', 'desc')->simplePaginate(3);
        } else {
            $allgallery = VideoGallery::orderBy('id', 'desc')->simplePaginate(3);
        }
        return view('admin.videogallery', compact('allgallery', 'editgallery'));
    }


    public function store(Request $request, ?int $id = null)
    {

        $request->validate([
            'title' => 'required',
            'video'=> ['required', 'regex:/<iframe\s+[^>]*src="https:\/\/www\.youtube\.com\/embed\/[a-zA-Z0-9_-]{11}"[^>]*><\/iframe>/'],
        ]);
        $data = $request->only(['title', 'description','video']);

        if ($id != null) {
            //user edit section is hare
            $currentEditUser = VideoGallery::find($id);
            VideoGallery::where('id', '=', $id)->update($data);
            return redirect()->route('admin.videogallery',['page'=>$request->query('page')])->with("success", "Successfully Edit the user");
        }  
        VideoGallery::create($data);
        return back()->with("success", "Successfully added the Category");

    }

    public function destory(int $id)
    {

        $data = VideoGallery::find($id);
        if ($data) {

            //unlink image from directory....
           
            $data->delete();
        }

        return redirect()->route('admin.videogallery')->with('success', 'Successfully Delete Video Gallery');
    }

}
