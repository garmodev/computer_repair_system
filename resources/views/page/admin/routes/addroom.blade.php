@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">ลำดับ</th>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">รูปภาพ</th>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">ห้อง</th>
                                <th class="text-secondary opacity-7"></th>
                                <th class="text-secondary opacity-7"></th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($room as $data)
                            <tr>
                                <td class="col-2">
                                    <p class="text-sm font-weight-bold mb-0"> {{$loop->iteration}}</p>
                                </td>
                                <td class="col-6">
                                    @if ($data->image==null)
                                    <img src="{{asset('img/noPhoto.png')}}" alt="profile_image" class=" border-radius-lg shadow-sm w-25"">
                                    @else
                                    <img src="{{asset($data->image)}}" alt="profile_image" class=" border-radius-lg shadow-sm w-25">
                                    @endif
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$data->number_room}}</p>
                                </td>
                                <td class="text-end">
                                    <button type="button" class="btn bg-gradient-primary btn-sm my-auto" data-bs-toggle="modal" data-bs-target="#Editiimage{{$data->id}}">แก้ไข</button>
                                  <!-- Modal -->
                                  <div class="modal fade" id="Editiimage{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('AddRoom.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                    <div class="row text-center mx-auto">
                                                        <div class="col-6 text-end mt-3">
                                                            <div class="avatar avatar-xxl my-auto">
                                                                @if ($data->image==null)
                                                                <img src="{{asset('img/noPhoto.png')}}" alt="profile_image" class=" border-radius-lg shadow-sm w-100">
                                                                @else
                                                                <img src="{{asset($data->image)}}" alt="profile_image" class=" border-radius-lg shadow-sm w-25">
                                                                @endif                                                            </div>
                                                        </div>
                                                        <div class="col-6 text-start my-auto">
                                                        <div>
                                                            <input class="form-control  mb-1" type="text" name="number_room" value="{{$data->number_room}}">
                                                            <input class="form-control form-control-sm " type="hidden" name="old_image" id="old_image" value="{{$data->image}}">
                                                            <input type="file" class="form-control form-control-sm mt-2" name="image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
                                                        </div>
                                                    </div>

                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-xs bg-gradient-secondary" data-bs-dismiss="modal">ออกจากหน้านี้</button>
                                        <button type="submit" class="btn btn-xs bg-gradient-primary">บันทึกข้อมูล</button>
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                                </td>
                                <td class="text-start">
                                    <form action="{{route('AddRoom.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a title="delete" class="delete" onclick="return confirm('คุณแน่ใจหรือว่าต้องการลบรายการนี้หรือไม่')">
                                            <button type="submit" class="btn bg-gradient-danger btn-sm my-auto">ลบ</button>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0 text-primary h5">เพิ่มรายการห้อง</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('AddRoom.store')}}" method="post" enctype="multipart/form-data">
                     @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label text-sm">เพิ่มรายการห้อง</label>
                                    <input class="form-control" type="text" name="number_room">
                                    <label for="example-text-input" class="form-control-label text-sm  mt-2 ">รูปภาพ</label>
                                    <input type="file" class="form-control form-control-sm w-100" style="width: 40%" name="image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
                                    <button type="submit" class="btn btn-sm bg-gradient-success mt-2">บันทึก</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
