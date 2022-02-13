<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Pet;
use App\Models\Employee;

class consultationController extends Controller
{
    public function search()
    {
        $pets = Pet::with('owner')->get();
        $consultations = Consultation::with('employee')->get();
        $consultations = Consultation::with('pet')->get();
        $search = $_GET['search'];
        $consultations = Consultation::join('pets', 'consultations.pet_id', 'pets.pet_id')
        ->select('consultations.*', 'pets.pet_id','pets.pet_name',)
        ->where('pets.pet_name', 'LIKE', '%'.$search.'%')
        ->get();
        return view('consultation.search',[
            'consultations' => $consultations,
            'pets' => $pets
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultations = Consultation::with('employee')->get();
        $consultations = Consultation::with('pet')->get();
        return view('consultation.index',[
            'consultations' => $consultations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pets = Pet::all();
        $employees = Employee::all();
        return view('consultation.create',[
            'pets' => $pets,
            'employees' => $employees
        ]);
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
            'employee_id' => 'required',
            'pet_id' => 'required',
            'date_of_Consultation' => 'required',
            'disease_Injuries' => 'required',
            'price' => 'required|integer|min:100|max:10000',
            'comments' => 'required'
        ]);

        $Consultation = new Consultation();
        $Consultation->employee_id = $req->input('employee_id');
        $Consultation->pet_id = $req->input('pet_id');
        $Consultation->date_of_Consultation = $req->input('date_of_Consultation');
        $Consultation->disease_Injuries = $req->input('disease_Injuries');
        $Consultation->price = $req->input('price');
        $Consultation->comments = $req->input('comments');
        $Consultation->save();
        return redirect('/consultation');
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
    public function edit($consultation_id)
    {
        $consultations = Consultation::find($consultation_id);
        $pets = Pet::all();
        $employees = Employee::all();
        return view('consultation.edit',[
            'consultations' => $consultations,
            'pets' => $pets,
            'employees' => $employees
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $consultation_id)
    {

        $Consultation = Consultation::find($consultation_id);
        $Consultation->employee_id = $req->input('employee_id');
        $Consultation->pet_id = $req->input('pet_id');
        $Consultation->date_of_Consultation = $req->input('date_of_Consultation');
        $Consultation->disease_Injuries = $req->input('disease_Injuries');
        $Consultation->price = $req->input('price');
        $Consultation->comments = $req->input('comments');
        $Consultation->update();
        return redirect('/consultation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($consultation_id)
    {
        $consultation = consultation::find($consultation_id);
        $consultation->delete();
        return redirect('/consultation');
    }
}
