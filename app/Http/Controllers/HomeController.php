<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use App\Models\Team;
use App\Models\About;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){

        $carousels =Slider::all();
        $about = About::all()->first();
        $services = Category::all();
        $projects = Product::with('image')->get();
        $teams = Team::all();
        $clients = Client::all();

        
        
        return view("user.home",compact(['carousels','about','services','projects','teams','clients']));
    }

    public function about(){

        $about = About::all()->first();
        $teams = Team::all();

        return view('user.about',compact(['about','teams']));
    }

    public function services(){

        
        $services = Category::all();
        
        $clients = Client::all();

        return view('user.service',compact(['services','clients']));
    }

    public function project(){

        $projects = Product::with('image')->get();
        return view('user.project',compact(['projects']));
    }

    public function contact(){


        return view('user.contact');
    }


    public function storeContact(Request $request){

        $request->validate([
            'name' => 'required|min:3',
            'email'=> 'required|email',
            'phone' => ['nullable', 'regex:/^01[3-9]\d{8}$/'],
            'message' => 'required',
        ]);

        $data = $request->only(['name','phone','email','message']);
        Contact::create($data);
        return back();

    }

    public function getTeam(){

        $teams = Team::all();
        return view('user.team',compact(['teams']));
    }

    public function testimonial(){

        $clients = Client::all();
        return view('user.testimonial',compact(['clients']));
    }

    public function fqaTemplate(){

        return view('user.fqa');
    }
    


}
