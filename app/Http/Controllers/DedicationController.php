<?php

namespace App\Http\Controllers;

use App\Http\Requests\DedicationRequest;
use Illuminate\Http\Request;
use App\Dedication;

class DedicationController extends Controller
{
    public $filterapproval = 'Pending';

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
        if( $this->filterapproval == 'All') {
            return redirect()->route('dedication.all');
        } elseif( $this->filterapproval == 'Approved') {
            return redirect()->route('dedication.approved');
        } elseif( $this->filterapproval == 'Pending') {
            return redirect()->route('dedication.pending');
        };
    }

    public function approved()
    {
        $this->filterapproval = 'Approved';
        return view("admin.dedication.index")->withFilterapproval('Approved')->withDedications(Dedication::whereApproved(1)->get());
    }

    public function pending()
    {
        $this->filterapproval = 'Pending';
        return view("admin.dedication.index")->withFilterapproval('Pending')->withDedications(Dedication::whereApproved(0)->get());
    }

    public function all()
    {
        $this->filterapproval = 'All';
        return view("admin.dedication.index")->withFilterapproval('All')->withDedications(Dedication::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dedication.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DedicationRequest $request)
    {
        $dedication = new Dedication;
        $dedication->name = $request->name;
        $dedication->father = $request->father;
        $dedication->mother = $request->mother;
        $dedication->dedication_date = $request->dedication_date;
        $dedication->birthday = $request->birthday;
        $dedication->gender = $request->gender;
        $dedication->user_id = \Auth::id();

        if($request->hasFile('requirement'))
        {
            $requirement = $request->requirement;
            $requirement_new_name = 'bcert' . $dedication->id . '.' . $requirement->extension();
            $requirement->move('upload/dedication', $requirement_new_name);
            $dedication->requirement = 'upload/dedication/' . $requirement_new_name;
        }

        $dedication->save();

        \Session::flash('success', "You have successfully added Child Dedication {$dedication->name}");

        return redirect()->route('dedication.index');
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
    public function edit(Dedication $dedication)
    {
        return view('admin.dedication.edit')->with('dedication', $dedication);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DedicationRequest $request, Dedication $dedication)
    {
        $dedication->name = $request->name;
        $dedication->name = $request->name;
        $dedication->father = $request->father;
        $dedication->mother = $request->mother;
        $dedication->dedication_date = $request->dedication_date;
        $dedication->birthday = $request->birthday;
        $dedication->gender = $request->gender;

        if($request->hasFile('requirement'))
        {
            $requirement = $request->requirement;
            $requirement_new_name = 'bcert' . $dedication->id . '.' . $requirement->extension();
            $requirement->move('upload/dedication', $requirement_new_name);
            $dedication->requirement = 'upload/dedication/' . $requirement_new_name;
        }

        $dedication->save();

        \Session::flash('success', "You have successfully updated Child Dedication {$dedication->name}");

        return redirect()->route('dedication.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dedication $dedication)
    {
        $dedication->delete();
        \Session::flash('success', "You have successfully deleted Dedication {$dedication->name}");

        return redirect()->route('dedication.index');
    }

    public function printPDF(Dedication $dedication)
    {
        $pdf = \PDF::loadView('admin.dedication.printPDF', compact('dedication'));
        return $pdf->stream();
    }

    public function approve(Dedication $dedication)
    {
        $dedication->approved = 1;
        $dedication->approved_user_id=\Auth::id();

        $dedication->save();

        \Session::flash('success', "You have successfully approved Child Dedication {$dedication->name}");

        return redirect()->route('dedication.index');
    }


}
