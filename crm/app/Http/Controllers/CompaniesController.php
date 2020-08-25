<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use App\Company;
use App\Employee;

class CompaniesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $companies = Company::orderBy('name','asc')->paginate(10);
        return view('companies.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Company";
        return view('companies.create')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z\s]*$/',
            'email' => 'required|email|unique:companies',
            'company_logo' => 'image|nullable|max:1999|dimensions:min_width=100,min_height=100',
            'website' => 'required|url|unique:companies'
        ]);

        //Handle file upload
        if($request->hasFile('company_logo')){

            // Get filename with the extension
            $filenameWithExt = $request->file('company_logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('company_logo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('company_logo')->storeAs('public/company_logos', $fileNameToStore);
            
        }else{
            $fileNameToStore = 'noimage.png';
        }

        // Add new Company
        $companies = new Company;

        $companies->name = ucwords($request->input('name'));
        $companies->email = $request->input('email');
        $companies->logo = $fileNameToStore;
        $companies->website = $request->input('website');
        $companies->save();

        $lastID = $companies->id;

        return redirect('/companies'.'/'.$lastID)->with('success', 'New Company Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies = Company::find($id);
        return view('companies.show')->with('companies', $companies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //if Auth is not equal to Admin
        //return redirect view('companies')->with('error', 'Unauthorized Page');

        $companies = Company::find($id);
        return view('companies.edit')->with('companies', $companies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z\s]*$/',
            'email' => 'required|email',
            'company_logo' => 'image|nullable|max:1999|dimensions:min_width=100,min_height=100',
            'website' => 'required|url'
        ]);
        
        //Handle file upload
        if($request->hasFile('company_logo')){
            $companies = Company::find($id);
            // Get filename with the extension
            $filenameWithExt = $request->file('company_logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('company_logo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('company_logo')->storeAs('public/company_logos', $fileNameToStore);
            // Delete file if exists
            Storage::delete('public/company_logos/'.$companies->logo);
        }

        // Update Company
        $companies = Company::find($id);

        $companies->name = ucwords($request->input('name'));
        $companies->email = $request->input('email');
        if($request->hasFile('company_logo')){
            $companies->logo = $fileNameToStore;
        }
        $companies->website = $request->input('website');
        $companies->save();

        return redirect('/companies'.'/'.$id)->with('success', 'Company Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //if Auth is not equal to Admin
        //return redirect view('companies')->with('error', 'Unauthorized Page');

        $companies = Company::find($id);
        $companies->delete();

        return redirect('/companies')->with('success', 'Company Deleted');
    }
}
