<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\Companies;
class EmployeeController extends Controller
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
        $Employees = Employees::paginate(10);
        return view('employee.index', compact('Employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$Companies = Companies::all();
        return view('employee.create', compact('Companies'));
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
            'first_name'=>'required',
			'last_name'=>'required',
			'email'=>'email'
        ]);

        $employee = new Employees([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
			'company_id' => $request->get('company_id')
        ]);
        $employee->save();
        return redirect('/employee')->with('success', 'New employee added');
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
        $Employees = Employees::find($id);
		$Companies = Companies::all();
        return view('employee.edit', compact('Employees','Companies'));   
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
            'first_name'=>'required',
			'last_name'=>'required',
			'email'=>'email'
        ]);

        $employees = Employees::find($id);
        $employees->first_name =  $request->get('first_name');
		$employees->last_name =  $request->get('last_name');
        $employees->email = $request->get('email');
        $employees->phone = $request->get('phone');
        $employees->company_id = $request->get('company_id');
    
        $employees->save();

        return redirect('/employee')->with('success', 'Employee data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Employees::find($id);
        $employees->delete();

        return redirect('/employee')->with('success', 'Employee has been deleted');
    }
}
