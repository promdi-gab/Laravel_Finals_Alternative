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
