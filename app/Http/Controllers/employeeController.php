<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class employeeController extends Controller
{
    public function login()
    {
        return view('employee.login');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $req)
    {
       $check = Employee::where('email', $req->email)->first();
       if ($check) {
            if(Hash::check($req->password, $check->password)) {
                $req->session()->put('id', $check->employee_id);
                return redirect('dashboard');
            } else{
                return view('employee.login');
            }
       } else{
            return view('employee.login');
       }
    }

    public function dashboard()
    {
       $employee = array();
        if (Session::has('id')){
          $employee = Employee::where('employee_id', Session::get('id'))->first();
        }
        return view('employee.dashboard', compact('employee'));
    }

    public function logout()
    {
        if (Session::has('id')){
            Session::pull('id');
            return redirect('login');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index',['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'full_name' => 'required',
            'email' => 'required|unique:employees',
            'password' => 'required',
            'employee_pic' => 'required|mimes:jpg,png,jpeg,gif|max:5048'
        ]);

        $Employee = new Employee();
        $Employee->full_name = $req->input('full_name');
        $Employee->email = $req->input('email');
        $Employee->password = Hash::make($req->input('password'));
        if($req->hasfile('employee_pic'))
        {
            $file = $req->file('employee_pic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/images4/', $filename);
            $Employee->employee_pic = $filename;
        }
        $Employee->save();
        return redirect('/login');
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
    public function edit($employee_id)
    {
        $employees = Employee::find($employee_id);
        return view('employee.edit')->with('employees', $employees);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $employee_id)
    {

        $Employee = Employee::find($employee_id);
        $Employee->full_name = $req->input('full_name');
        $Employee->email  = $req->input('email');
        $Employee->password = Hash::make($req->input('password'));
        if($req->hasfile('employee_pic'))
        {
            $destination = 'uploads/image4/'.$Employee->employee_pic;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $req->file('employee_pic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/images4/', $filename);
            $Employee->employee_pic = $filename;
        }
        $Employee->update();
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee_id)
    {
        $Employee = Employee::find($employee_id);
        $destination = 'uploads/images4/'.$Employee->owner_pic;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $Employee->delete();
        return redirect('/employee');
    }
}
