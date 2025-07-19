<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    //

    public function index(?int $id=null){

        $editclient= null;
        if($id!==null){
            $editclient = Client::find($id);
        }

        $search = request()->query('search');

        if($search){
            $allclient= Client::where('name','like','%'.$search.'%')->simplePaginate(3);
        }else{
            $allclient= Client::simplePaginate(3);
        }

        return view("admin.client",compact(['editclient','allclient']));
    }

    public function store(Request $request,?int $id=null){

        $request->validate([
            'name'=> 'required',
            'profession' => 'required',
            'photo' => "required|image|mimes:jpeg,jpg,png,gif,webp,svg|max:2048"
        ]);

        $data = $request->only(['name', 'note','profession']);
        if ($id != null) {
            //user edit section is hare

            $currentEditUser = Client::find($id);

            if ($request->hasFile('photo')) {

                //delete if user already have profile picture...
                if ($currentEditUser->photo != null) {
                    Storage::delete($currentEditUser->photo);
                }

                $path = $request->file('photo')->store('client');
                $data['photo'] = $path;
            }

            Client::where('id', '=', $id)->update($data);
            return redirect()->route('admin.client',['page'=>request()->query('page'),'search'=>request()->query('search')])->with("success", "Successfully Edit the Client");
        }


      

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('client');
            $data['photo'] = $path;
        }


        Client::create($data);

        return back()->with("success", "Successfully added the Client");



    }

    public function destroy(int $id){

         $data = Client::find($id);
        if ($data) {

            //unlink image from directory....
            Storage::delete($data->photo);
            $data->delete();
        }



        return redirect()->route('admin.client')->with('success', 'Successfully Delete team');


    }






}
