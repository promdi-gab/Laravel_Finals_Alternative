<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Pet;
use Illuminate\Support\Facades\File;

class petController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::all();
        return view('pet.index',[
            'pets' => $pets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Owner::all();
        return view('pet.create',['owners' => $owners]);
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
            'pet_name' => 'required|unique:pets',
            'age' => 'required|integer|min:1|max:100',
            'sex' => 'required',
            'breed' => 'required',
            'owner_id' => 'required',
            'pet_pic' => 'required|mimes:jpg,png,jpeg,gif|max:5048'
        ]);

        $Pet = new Pet;
        $Pet->pet_name = $req->input('pet_name');
        $Pet->age = $req->input('age');
        $Pet->sex = $req->input('sex');
        $Pet->breed = $req->input('breed');
        $Pet->owner_id  = $req->input('owner_id');
        if($req->hasfile('pet_pic'))
        {
            $file = $req->file('pet_pic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/images2/', $filename);
            $Pet->pet_pic = $filename;
        }
        $Pet->save();
        return redirect('/pet');
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
    public function edit($pet_id)
    {
        $pet = Pet::find($pet_id);
        $owners = Owner::all();
        return view('pet.edit',[
            'pets' => $pet,
            'owners' => $owners
        ]);
    }

