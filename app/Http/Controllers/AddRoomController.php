<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
class AddRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = Room::all();
        return view('page.admin.routes.addroom',compact('room'));
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

        if($request->file('image')==null){
            $request->validate(
                [
                'number_room' => 'required',
                "number_room" =>"required|unique:room",
                ],

                [
                'number_room.required'=>"กรุณาป้อนข้อมูล",
                'number_room.unique'=>"มีข้อมูลนี้แล้ว",
                ]

            );
            $data = new Room();
            $data->number_room  = $request->number_room ;
            if($data->save()){
                return redirect()->back()->with('save', "บันทึกข้อมูลลสำเร็จ");


            }
        }

        $request->validate(
            [
            'number_room' => 'required',
            "number_room" =>"required|unique:room",
            ],

            [
            'number_room.required'=>"กรุณาป้อนข้อมูล",
            'number_room.unique'=>"มีข้อมูลนี้แล้ว",
            ]

        );
        if($request->hasFile('image')){
            $imgwidth = 300;
            $logoImage = $request->file('image');
            $name_gen = hexdec(uniqid());
            $name = strtolower($logoImage->getClientOriginalName());
            $img_name = $name_gen.'.'.$name;


            $upload_location = 'img/';
            $full_path = $upload_location.$img_name;

                $data = new Room();
                $data->number_room  = $request->number_room ;
                $data->image = $full_path;


            $logoImage->move($upload_location,$img_name);
            if($data->save()){
                return redirect()->back()->with('save', "บันทึกข้อมูลลสำเร็จ");

            }


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

        if($request->file('image')==null&&$request->old_image==null){
            Room::find($id)->update([
                'number_room' =>$request->number_room,
            ]);

            return redirect()->back()->with('edit', "บันทึกข้อมูลลสำเร็จ");

        }else{

            if($request->hasFile('image')){
                $logoImage = $request->file('image');
                $name_gen = hexdec(uniqid());
                $name = strtolower($logoImage->getClientOriginalName());
                $img_name = $name_gen.'.'.$name;

                $upload_location = 'img/';
                $full_path = $upload_location.$img_name;

                Room::find($id)->update([
                    'number_room' =>$request->number_room,
                    'image' =>$full_path,
                ]);
                if($request->old_image==null){
                    $logoImage->move($upload_location,$img_name);
                    return redirect()->back()->with('edit', "บันทึกข้อมูลลสำเร็จ");

                }
                $old_image = $request->old_image;
                unlink($old_image);
                $logoImage->move($upload_location,$img_name);

                return redirect()->back()->with('edit', "บันทึกข้อมูลลสำเร็จ");

            }


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
        $data = Room::find($id);
        $data->delete();
        return redirect()->back()->with('delete', "ลบข้อมูลสำเร็จ");
    }
}
