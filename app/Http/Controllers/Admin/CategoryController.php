<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //

    public function index(Request $request, ?int $id = null)
    {

        $editCategory = null;
        if ($id != null) {
            $editCategory = Category::find($id);
        }

        $searchValue = $request->query("search", null);
        if ($searchValue != null) {
            $allCategories = Category::where("name", "like", "%" . $searchValue . "%")->orderBy('id', 'desc')->simplePaginate(3);
        } else {
            $allCategories = Category::orderBy('id', 'desc')->simplePaginate(3);
        }
        ;

        return view('admin.service', compact('allCategories', 'editCategory'));
    }


    public function store(Request $request, ?int $id = null)
    {

        $request->validate([
            'name'=> 'required',
            'description' => 'required',
            'img' => "required|image|mimes:jpeg,jpg,png,gif,webp,svg|max:2048"
        ]);


        $data = $request->only(['description', 'name']);
        if ($id != null) {
            //

            $currentEditUser = Category::find($id);

            if ($request->hasFile('img')) {

                //delete if user already have profile picture...
                if ($currentEditUser->img != null) {
                    Storage::delete($currentEditUser->img);
                }


                $path = $request->file('img')->store('service');
                $data['img'] = $path;
            }

            Category::where('id', '=', $id)->update($data);


             $backRoute =   route('admin.category');
           $backRoute = $backRoute."?page=".$request->page;
            
            return redirect()->route('admin.category',['page'=>$request->query('page'),'search'=>$request->query('search')])->with("success", "Successfully Edit the user");
        }


      

        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('service');
            $data['img'] = $path;
        }
        Category::create($data);

        return back()->with("success", "Successfully added the Category");


    }

    public function destroy(int $id)
    {

        $data = Category::find($id);
        if ($data) {

            //unlink image from directory....
            Storage::delete($data->img);
            $data->delete();
        }

        return redirect()->route('admin.category')->with('success', 'Successfully Delete Category');


    }















}
