<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\File;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('service.index',['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
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
            'service_name' => 'required',
            'cost' => 'required|integer|min:100|max:10000',
            'haircut_pic' => 'required|mimes:jpg,png,jpeg,gif|max:5048'
        ]);

        $Service = new Service();
        $Service->service_name = $req->input('service_name');
        $Service->cost = $req->input('cost');
        if($req->hasfile('haircut_pic'))
        {
            $file = $req->file('haircut_pic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/images3/', $filename);
            $Service->haircut_pic = $filename;
        }
        $Service->save();
        return redirect('/service');
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
    public function edit($service_id)
    {
        $services = Service::find($service_id);
        return view('service.edit')->with('services', $services);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $service_id)
    {
        $Service = Service::find($service_id);
        $Service->service_name = $req->input('service_name');
        $Service->cost = $req->input('cost');
        if($req->hasfile('haircut_pic'))
        {
            $destination = 'uploads/images3/'.$Service->haircut_pic;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $req->file('haircut_pic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/image3s/', $filename);
            $Service->haircut_pic = $filename;
        }
        $Service->update();
        return redirect('/service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($service_id)
    {
        $service_id = Service::find($service_id);
        $destination = 'uploads/images3/'.$service_id->owner_pic;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $service_id->delete();
        return redirect('/service');
    }
}
