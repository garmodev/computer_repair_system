@extends('layouts.admin')

@section('content')

<div class="card p-2">
    <h4 class="p-2 text-primary  h5">ประวัติการแจ้งซ่อม</h4>
    <form class="d-flex" role="search">
        <input class="form-control form-control-sm  me-2 w-25" type="search" name="search" placeholder="ค้นหา" aria-label="ค้นหา">
        <button class="btn btn-xs btn-outline-success my-auto" type="submit">ค้นหา</button>
      </form>
    <div class="table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">รายการแจ้งซ่อม ฯ</th>
            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">รหัสคอมพิวเตอร์</th>
            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">ห้อง</th>
            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">แถว</th>
            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">ตำแหน่ง</th>
            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">วันที่แจ้งซ่อม</th>
            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">วันที่ซ่อมเสร็จสิ้น</th>
            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">ชื่อผู้แจ้งซ่อม ฯ</th>
            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">สถานะ</th>
            <th class="text-secondary opacity-7"></th>
            <th class="text-secondary opacity-7"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($NotifyRepairComputer as $data)
          <tr>
            <td>
              <p class="text-xs font-weight-bold mb-0">{{$data->id}}</p>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0">{{$data->code_computer}}</p>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0">{{$data->room}}</p>
            </td>
            <td>
            <p class="text-xs font-weight-bold mb-0">{{$data->row}}</p>
            </td>
            <td>
            <p class="text-xs font-weight-bold mb-0">{{$data->position}}</p>
            </td>
            <td>
            <p class="text-xs font-weight-bold mb-0">{{$data->data_repair}}</p>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0">{{$data->data_finish}}</p>
                </td>
            <td>
            <p class="text-xs font-weight-bold mb-0">{{$data->user_repair}}</p>
            </td>
            <td>
                @if ($data->status==3)
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill text-success" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle-fill text-danger" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                  </svg>
                @endif
            </td>
            <td>
                <div class="d-flex flex-row justify-content-end">
                    <button type="button" class="btn btn-sm bg-gradient-info mx-1" data-bs-toggle="modal"
                    data-bs-target="#detail{{ $data->id }}">รายละเอียด</button>
                    <form action="{{route('ExportPDFController.show',$data->id)}}" method="get" class="text-end">
                        <button type="submit" class="btn btn-sm bg-gradient-primary mx-1">ออกรายงาน</button>
                    </form>
                    <form action="{{ route('NotifyRepairHistory.destroy', $data->id) }}"
                        method="post">
                        @method('delete')
                        @csrf
                        <a title="delete" class="delete"
                            onclick="return confirm('คุณแน่ใจหรือว่าต้องการลบรายการนี้หรือไม่')"><button
                                type="submit"
                                class="btn bg-gradient-danger btn-sm my-auto">ลบ</button></a>
                    </form>
                </div>


            </td>
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
          </tr>
          @endforeach
        </tbody>
      </table>
      <form action="{{route('ExportPDFController.create')}}" method="get" class="text-end">
        <button type="submit" class="btn btn-sm bg-gradient-primary">ออกรายงานทั้งหมด</button>
    </form>
    </div>
  </div>
@endsection
