<?php

namespace App\Http\Controllers;
use App\Models\NotifyRepairComputer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
class NotifyRepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           $search = $request->input('search');

           $NotifyRepairComputer = NotifyRepairComputer::whereIn('status',[2,3,4])
               ->where('code_computer', 'LIKE', "%{$search}%")
               ->get();

        return view('page.admin.routes.notifyrepair',compact('NotifyRepairComputer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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


          $request->validate([

            'status' => 'required',



        ],

        [
            'status.required'=>"กรุณาป้อนข้อมูล",


        ]



        );

        if($request->status==0){
            $data = NotifyRepairComputer::find($id);
            $data->status = $request->input('status');
            $data->update();
            return redirect()->back()->with('edit', "แก้ไขข้อมูลลสำเร็จ");
        }else{
            $data = NotifyRepairComputer::find($id);
            $data->name_repair = $request->input('name_repair');
            $data->status = $request->input('status');
            $data->data_finish = Carbon::now();
            $data->update();
            return redirect()->back()->with('edit', "แก้ไขข้อมูลลสำเร็จ");

        }




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
