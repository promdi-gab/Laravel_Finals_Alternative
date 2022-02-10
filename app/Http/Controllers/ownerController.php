<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use Illuminate\Support\Facades\File;

class ownerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::all();
        return view('owner.index',['owners' => $owners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.create');
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
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'owner_pic' => 'required|mimes:jpg,png,jpeg,gif|max:5048'
        ]);

        $Owner = new Owner;
        $Owner->first_name = $req->input('first_name');
        $Owner->last_name = $req->input('last_name');
        $Owner->phone_number = $req->input('phone_number');
        if($req->hasfile('owner_pic'))
        {
            $file = $req->file('owner_pic');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/images/', $filename);
            $Owner->owner_pic = $filename;
        }
        $Owner->save();
        return redirect('/owner');
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
    public function edit($owner_id)
    {
        $owner = Owner::find($owner_id);
        return view('owner.edit')->with('owners', $owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $owner_id)
    {
        $Owner = Owner::find($owner_id);
        $Owner->first_name = $req->input('first_name');
        $Owner->last_name = $req->input('last_name');
        $Owner->phone_number = $req->input('phone_number');
        if($req->hasfile('owner_pic'))
        {
            $destination = 'uploads/images/'.$Owner->owner_pic;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $req->file('owner_pic');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/images/', $filename);
            $Owner->owner_pic = $filename;
        }
        $Owner->update();
        return redirect('/owner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($owner_id)
    {
        $Owner = Owner::find($owner_id);
        $destination = 'uploads/images/'.$Owner->owner_pic;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $Owner->delete();
        return redirect('/owner');
    }
}
