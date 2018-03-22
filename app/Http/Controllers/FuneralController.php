<?php

namespace App\Http\Controllers;

use App\Funeral;
use App\Http\Requests\FuneralRequest;
use Illuminate\Http\Request;

class FuneralController extends Controller
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
            return redirect()->route('funeral.all');
        } elseif( $this->filterapproval == 'Approved') {
            return redirect()->route('funeral.approved');
        } elseif( $this->filterapproval == 'Pending') {
            return redirect()->route('funeral.pending');
        };
    }

    public function approved()
    {
        $this->filterapproval = 'Approved';
        return view("admin.funeral.index")->withFilterapproval('Approved')->withFunerals(Funeral::whereApproved(1)->get());
    }

    public function pending()
    {
        $this->filterapproval = 'Pending';
        return view("admin.funeral.index")->withFilterapproval('Pending')->withFunerals(Funeral::whereApproved(0)->get());
    }

    public function all()
    {
        $this->filterapproval = 'All';
        return view("admin.funeral.index")->withFilterapproval('All')->withFunerals(Funeral::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.funeral.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuneralRequest $request)
    {
        $funeral = new Funeral;
        $funeral->name = $request->name;
        $funeral->funeral_date = $request->funeral_date;
        $funeral->death_date = $request->death_date;
        $funeral->birthday = $request->birthday;
        $funeral->user_id = \Auth::id();

        if($request->hasFile('requirement'))
        {
            $requirement = $request->requirement;
            $requirement_new_name = 'dcert' . $funeral->id . '.' . $requirement->extension();
            $requirement->move('upload/funeral', $requirement_new_name);
            $funeral->requirement = 'upload/funeral/' . $requirement_new_name;
        }

        $funeral->save();

        \Session::flash('success', "You have successfully added Funeral Service {$funeral->name}");

        return redirect()->route('funeral.index');
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
    public function edit(Funeral $funeral)
    {
        return view('admin.funeral.edit')->with('funeral', $funeral);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuneralRequest $request, Funeral $funeral)
    {
        $funeral->name = $request->name;
        $funeral->funeral_date = $request->funeral_date;
        $funeral->death_date = $request->death_date;
        $funeral->birthday = $request->birthday;

        if($request->hasFile('requirement'))
        {
            $requirement = $request->requirement;
            $requirement_new_name = 'dcert' . $funeral->id . '.' . $requirement->extension();
            $requirement->move('upload/funeral', $requirement_new_name);
            $funeral->requirement = 'upload/funeral/' . $requirement_new_name;
        }

        $funeral->save();

        \Session::flash('success', "You have successfully updated Funeral Service {$funeral->name}");

        return redirect()->route('funeral.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funeral $funeral)
    {
        $funeral->delete();
        \Session::flash('success', "You have successfully deleted Funeral Service {$funeral->name}");

        return redirect()->route('funeral.index');
    }

    public function printPDF(Funeral $funeral)
    {
        $pdf = \PDF::loadView('admin.funeral.printPDF', compact('funeral'));
        return $pdf->stream();
    }

    public function approve(Funeral $funeral)
    {
        $funeral->approved = 1;
        $funeral->approved_user_id=\Auth::id();

        $funeral->save();

        \Session::flash('success', "You have approved Funeral {$funeral->name}");

        return redirect()->route('funeral.index');
    }


}
