<?php

namespace App\Http\Controllers;
use App\Models\NotifyRepairComputer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Models\Users;
use App\Models\Room;
class NotifyRepairComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_repair = NotifyRepairComputer::where('email', Auth::user()->email)
        ->whereIn('status',[0,2,3,4])->get();
        $room = Room::all();
        $status = NotifyRepairComputer::select('status')-> where('email', Auth::user()->email)->get();
        return view('page.user.routes.notifyrepaircomputer',compact('list_repair','status','room'));
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
        $request->validate([
            'room' => 'required',

        ],

        [
            'room.required'=>"กรุณาป้อนข้อมูล",

        ]

        );
            $data = new NotifyRepairComputer();
            $data->user_repair  = $request->user_repair;
            $data->email  = $request->email;
            $data->code_computer  = $request->code_computer;
            $data->room  = $request->room;
            $data->row  = $request->row;
            $data->position  = $request->position;
            $data->data_repair  = Carbon::now();
            $data->cause  = $request->cause;
            $data->note  = $request->note;
            $data->status  = 0;

        if($data->save())
        {
            return redirect()->back()->with('save', "บันทึกข้อมูลลสำเร็จ");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
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

            'code_computer' => 'required',
            'room' => 'required',
            'row' => 'required',
            'position' => 'required',
            'cause' => 'required',


        ],

        [
            'code_computer.required'=>"กรุณาป้อนข้อมูล",
            'room.required'=>"กรุณาป้อนข้อมูล",
            'row.required'=>"กรุณาป้อนข้อมูล",
            'position.required'=>"กรุณาป้อนข้อมูล",
            'cause.required'=>"กรุณาป้อนข้อมูล",

        ]



        );
             NotifyRepairComputer::find($id)->update([

            'code_computer' => $request->code_computer,
            'room' => $request->room,
            'row' => $request->row,
            'position' => $request->position,
            'cause' => $request->cause,
            'note' => $request->note,



        ]);


        return redirect()->back()->with('edit', "แก้ไขข้อมูลลสำเร็จ");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = NotifyRepairComputer::find($id);
        $data->delete();
        return redirect()->back()->with('delete', "ลบข้อมูลสำเร็จ");
    }
}
