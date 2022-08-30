@extends('layouts.user')
@section('contentuser')
    <div class="container-fluid">
        <div class="row">
<style>

.progresses{
    display: flex;
        align-items: center;
   }

   .line{

        width: 120px;
    height: 6px;
    background: #63d19e;
   }


   .steps{

    display: flex;
    background-color: #63d19e;
    color: #fff;
    font-size: 12px;
    width: 80px;
    height: 80px;
    align-items: center;
    justify-content: center;
    border-radius: 50%;


   }
   .line1{

width: 120px;
height: 6px;
background: #666b69;
}


.steps1{

display: flex;
background-color: #666b69;
color: #fff;
font-size: 12px;
width: 80px;
height: 80px;
align-items: center;
justify-content: center;
border-radius: 50%;


}
</style>
        <div class="card shadow-sm p-3 mb-5 bg-white rounded">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2 col-2">
                                รายการแจ้งซ่อม ฯ</th>
                            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2 col-2">
                                รหัสเครื่องคอมพิวเตอร์</th>
                            <th
                                class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 col-1 text-center">
                                ห้อง</th>
                            <th
                                class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 col-1 text-center">
                                แถว</th>
                            <th
                                class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 col-1 text-center">
                                ตำแหน่ง</th>
                            <th
                                class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 col-2 text-center">
                                วันที่แจ้งซ่อม</th>
                            <th
                                class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 col-2 text-center">
                                สถานะ</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_repair as $data)
                            <tr>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $data->id }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $data->code_computer }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $data->room }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $data->row }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $data->position }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $data->data_repair }}</p>
                                </td>
                                <td class="text-center">
                                    @if ($data->status == 0)
                                    <span class="badge badge-pill bg-gradient-success">รออนุมัติ</span>
                                    @endif
                                    @if ($data->status == 2)
                                        <span class="badge badge-pill bg-gradient-success">อนุมัติ กำลังดำเนินการ</span>
                                    @endif
                                    @if ($data->status == 3)
                                    <span class="badge badge-pill bg-gradient-success">ซ่อมเสร็จสิ้น</span>
                                    @endif
                                    @if ($data->status == 4)
                                    <span class="badge badge-pill bg-gradient-success">ซ่อมไม่เสร็จสิ้น</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="detail{{ $data->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการแจ้งซ่อม
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    รายการแจ้งซ่อม: {{$data->id}}<br>
                                                    รหัสคอมพิวเตอร์: {{$data->code_computer}}<br>
                                                    ห้อง: {{$data->room}}<br>
                                                    แถว: {{$data->row}}<br>
                                                    ตำแหน่ง: {{$data->position}}<br>
                                                    วันที่แจ้งซ่อม: {{$data->data_repair}}<br>
                                                    วันที่ซ่อมเสร็จสิ้น: {{$data->data_finish}}<br>
                                                    อาการ: {{$data->cause}}<br>
                                                    หมายเหตุ: {{$data->note}}<br>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm bg-gradient-secondary"
                                                        data-bs-dismiss="modal">ออก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <!-- Modal -->
                                     <div class="modal fade" id="details{{ $data->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">สถานะ
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="container d-flex justify-content-center align-items-center">

                                                    <div class="progresses">


                                                                        <div  @if ($data->status>0)
                                                                        class="steps"
                                                                        @else
                                                                        class="steps1"
                                                                        @endif>
                                                                          <span>
                                                                            รออนุมัติ
                                                                        </span>



                                                                        </div>

                                                                        <span
                                                                        @if ($data->status>2)
                                                                            class="line"
                                                                                @else
                                                                                class="line1"
                                                                                @endif
    ></span>

                                                                        <div  @if ($data->status>2)
                                                                            class="steps"
                                                                            @else
                                                                            class="steps1"
                                                                            @endif>
                                                                                กำลังดำเนินการ
                                                                            </span>                                                                        </div>


                                                                        <span           @if ($data->status>3)
                                                                            class="line"
                                                                                @else
                                                                                class="line1"
                                                                                @endif
    ></span>

                                                                        <div @if ($data->status>3)
                                                                            class="steps"
                                                                            @else
                                                                            class="steps1"
                                                                            @endif>
                                                                            <span>
                                                                                เสร็จสิ้น
                                                                            </span>                                                                        </div>

                                                                       </div>

                                                    </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm bg-gradient-secondary"
                                                        data-bs-dismiss="modal">ออก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row justify-content-end">
                                        <button type="submit" class="btn bg-gradient-info btn-sm my-auto mx-1" data-bs-toggle="modal" data-bs-target="#detail{{ $data->id }}">รายละเอียด</button>
                                        <button type="submit" class="btn bg-gradient-info btn-sm my-auto mx-1" data-bs-toggle="modal" data-bs-target="#details{{ $data->id }}"">ตรวจสอบสถานะ</button>

                                            @if ($data->status>=2)
                                            @else
                                            <button type="button" class="btn bg-gradient-primary btn-sm my-auto mx-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#Edit{{ $data->id }}">แก้ไข</button>

                                        <form action="{{ route('NotifyRepairComputer.destroy', $data->id) }}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <a title="delete" class="delete"
                                                onclick="return confirm('คุณแน่ใจหรือว่าต้องการลบรายการนี้หรือไม่')"><button
                                                    type="submit"
                                                    class="btn bg-gradient-danger btn-sm my-auto">ลบ</button></a>
                                        </form>
                                            @endif

                                    </div>
                                </td>

                                <div class="modal fade" id="Edit{{ $data->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขรายละเอียดการแจ้งซ่อม
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('NotifyRepairComputer.update', $data->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row">
                                                        <input type="hidden" name="user_repair"
                                                            value="{{ Auth::user()->name }}">
                                                        <input type="hidden" name="email"
                                                            value="{{ Auth::user()->email }}">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-text-input"
                                                                    class="form-control-label text-xs ss">รหัสเครื่องคอมพิวเตอร์</label>
                                                                <input class="form-control form-control-sm" type="text"
                                                                    name="code_computer" value="{{ $data->id }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-text-input"
                                                                    class="form-control-label text-xs">ห้อง</label>
                                                                <input class="form-control form-control-sm" type="text"
                                                                    name="room" value="{{ $data->room }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-text-input"
                                                                    class="form-control-label text-xs">แถว</label>
                                                                <input class="form-control form-control-sm" type="text"
                                                                    name="row" value="{{ $data->row }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-text-input"
                                                                    class="form-control-label text-xs">ตำแหน่ง</label>
                                                                <input class="form-control form-control-sm" type="text"
                                                                    name="position" value="{{ $data->position }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="example-text-input"
                                                                    class="form-control-label text-xs">อาการ</label>
                                                                <input class="form-control form-control-sm" type="text"
                                                                    name="cause" value="{{ $data->cause }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="example-text-input"
                                                                    class="form-control-label text-xs">หมายเหตุ</label>
                                                                <input class="form-control form-control-sm" type="text"
                                                                    name="note" value="{{ $data->note }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm bg-gradient-secondary"
                                                            data-bs-dismiss="modal">ออก</button>
                                                        <button type="submit"
                                                            class="btn btn-sm bg-gradient-success">บันทึก</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
