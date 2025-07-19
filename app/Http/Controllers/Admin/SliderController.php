<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class SliderController extends Controller
{
    //

    public function index(Request $request, ?int $id = null)
    {

        $editSlider = null;
        if ($id != null) {
            $editSlider = Slider::find($id);
        }

        $search = $request->input('search');
        if ($search) {
            $allSlider = Slider::where('title', 'like', '%' . $search . '%')->simplePaginate(10);
        } else {
            $allSlider = Slider::simplePaginate(3);
        }
        return view("admin.slider", compact("editSlider", "allSlider"));
    }

    public function store(Request $request, ?int $id = null)
    {

        $request->validate([
            "title"=> "required",
            "description"=> "required",
            'img' => "required|image|mimes:jpeg,jpg,png,gif,webp,svg|max:2048"
        ]);



     



        $data = $request->only(['title', 'description']);
        if ($id != null) {

            $currentEditUser = Slider::find($id);

            if ($request->hasFile('img')) {

                //delete if user already have profile picture...
                if ($currentEditUser->img != null && Storage::exists($currentEditUser->img)) {
                    Storage::delete($currentEditUser->img);
                }

                $path = $request->file('img')->store('slider');
                $data['img'] = $path;
            }

            Slider::where('id', '=', $id)->update($data);
            return redirect()->route('admin.slider', ['page' => $request->query('page'), 'search' => $request->query('search')])->with('success', "Successfully updated");
        }


        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('slider');
            $data['img'] = $path;
        }


        Slider::create($data);

        return back()->with("success", "Successfully added the Slider");
    }

    public function destroy(int $id)
    {

        $slider = Slider::find($id);
        if ($slider) {
            //unlink image from directory....
            Storage::delete($slider->img);
            $slider->delete();
        }

        return redirect()->route('admin.slider')->with('success', 'Successfully Delete Slider Item');

    }




}
