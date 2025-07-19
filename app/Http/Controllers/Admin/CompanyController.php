<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    //


    public function index(){
        $company = Company::all()->first();
        return view("admin.company",compact("company"));
    }


    public function create(Request $request){


        $company = Company::all()->first();

        $companyData = $request->only(['name',
                'email',
                'email2',
                'phone',
                'phone2',
                'footer_text',
                'whatsapp',
                'facebook',
                'instagram',
                'linkdin',
                'map',
                'address'
            ]);

        if($company){
            
            if($request->hasFile('logo') && $company->logo != null){
                Storage::delete($company->logo);
            }

            if($request->hasFile('logo') && $company->logo != null){
                $path = $request->file('logo')->store('company');
                $companyData['logo'] = $path;
            }

            

            // return response()->json($companyData);
            // unset($companyData['_token']);

            Company::where('id','=',$company->id)->update($companyData);

        }else{
             if($request->hasFile('logo')){
            $path = $request->file('logo')->store('company');
            $companyData['logo'] = $path;
            }

            Company::create($companyData);
        }


       

        return back()->with('success','Successfully stored company detail');

    }



}
