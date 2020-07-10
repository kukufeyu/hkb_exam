<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;

class CompanyController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Companies = Companies::paginate(10);

        return view('company.index', compact('Companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
            'name'=>'required',
			'email'=>'email',
			'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

		$image = $request->file('logo');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
		
        $company = new Companies([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'logo' => $new_name,
            'website' => $request->get('website')
        ]);
		
        $company->save();
        return redirect('/company')->with('success', 'New company added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Companies = Companies::find($id);
        return view('company.edit', compact('Companies'));    
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
        $request->validate([
            'name'=>'required',
			'email'=>'email',
			'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

		$image = $request->file('logo');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
		
		
        $companies = Companies::find($id);
        $companies->name =  $request->get('name');
        $companies->email = $request->get('email');
        $companies->logo = $new_name;
        $companies->website = $request->get('website');
    
        $companies->save();

        return redirect('/company')->with('success', 'Company data has been updated!');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Companies::find($id);
        $companies->delete();

        return redirect('/company')->with('success', 'Company has been deleted');
    }
}
