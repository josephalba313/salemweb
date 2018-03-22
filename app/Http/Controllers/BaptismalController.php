<?php

namespace App\Http\Controllers;

use App\Baptismal;

use App\Http\Requests\BaptismalRequest;
use Illuminate\Http\Request;
use Auth;

class BaptismalController extends Controller
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
            return redirect()->route('baptismal.all');
        } elseif( $this->filterapproval == 'Approved') {
            return redirect()->route('baptismal.approved');
        } elseif( $this->filterapproval == 'Pending') {
            return redirect()->route('baptismal.pending');
        };
    }

    public function approved()
    {
        $this->filterapproval = 'Approved';
        return view("admin.baptismal.index")->withFilterapproval('Approved')->withBaptismals(Baptismal::whereApproved(1)->get());
    }

    public function pending()
    {
        $this->filterapproval = 'Pending';
        return view("admin.baptismal.index")->withFilterapproval('Pending')->withBaptismals(Baptismal::whereApproved(0)->get());
    }

    public function all()
    {
        $this->filterapproval = 'All';
        return view("admin.baptismal.index")->withFilterapproval('All')->withBaptismals(Baptismal::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.baptismal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BaptismalRequest $request)
    {
        $baptismal = new Baptismal;
        $baptismal->name = $request->name;
        $baptismal->baptismal_date = $request->baptismal_date;
        $baptismal->user_id = \Auth::id();

        if($request->hasFile('requirement'))
        {
            $requirement = $request->requirement;
            $requirement_new_name = 'bcert' . $baptismal->id . '.' . $requirement->extension();
            $requirement->move('upload/baptismal', $requirement_new_name);
            $baptismal->requirement = 'upload/baptismal/' . $requirement_new_name;
        }

        $baptismal->save();

        \Session::flash('success', "You have successfully added Baptismal {$baptismal->name}");

        return redirect()->route('baptismal.index');
    }

    /**
     *
     *
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
    public function edit(Baptismal $baptismal)
    {
        return view('admin.baptismal.edit')->with('baptismal', $baptismal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BaptismalRequest $request, Baptismal $baptismal)
    {
        $baptismal->name = $request->name;
        $baptismal->baptismal_date = $request->baptismal_date;

        if($request->hasFile('requirement'))
        {
            $requirement = $request->requirement;
            $requirement_new_name = 'bcert' . $baptismal->id . '.' . $requirement->extension();
            $requirement->move('upload/baptismal', $requirement_new_name);
            $baptismal->requirement = 'upload/baptismal/' . $requirement_new_name;
        }

        $baptismal->save();

        \Session::flash('success', "You have successfully updated Baptismal {$baptismal->name}");

        return redirect()->route('baptismal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Baptismal $baptismal)
    {
        $baptismal->delete();
        \Session::flash('success', "You have successfully deleted Baptismal {$baptismal->name}");

        return redirect()->route('baptismal.index');
    }

    public function printPDF(Baptismal $baptismal)
    {
        $pdf = \PDF::loadView('admin.baptismal.printPDF', compact('baptismal'));
        return $pdf->stream();
    }

    public function approve(Baptismal $baptismal)
    {
        $baptismal->approved = 1;
        $baptismal->approved_user_id=\Auth::id();

        $baptismal->save();

        \Session::flash('success', "You have successfully approved Baptismal {$baptismal->name}");

        return redirect()->route('baptismal.index');
    }


}
