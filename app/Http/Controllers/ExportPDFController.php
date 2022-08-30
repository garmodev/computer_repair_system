<?php

namespace App\Http\Controllers;
use PDF;
use Carbon\Carbon;
use App\Models\NotifyRepairComputer;

use Illuminate\Http\Request;

class ExportPDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datanow = Carbon::now()->toArray();
        $item = NotifyRepairComputer::whereIn('status',[3,4,5])->get();
        return view('mypdf',compact('item','datanow'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d = Carbon::now()->thaidate('l j F Y');
        $item = NotifyRepairComputer::whereIn('status',[3,4,5])->get();
        $pdf = PDF::loadView('myPDF',compact('item','d'));
        return $pdf->stream('itsolutionstuff.pdf');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        {
            
            $d = Carbon::now()->thaidate('l j F Y');
            $item = NotifyRepairComputer::whereIn('status',[3,4,5])
            ->where('id' , '=' ,$id)->get();
            $pdf = PDF::loadView('myPDF',compact('item','d'));
            return $pdf->stream('itsolutionstuff.pdf');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
