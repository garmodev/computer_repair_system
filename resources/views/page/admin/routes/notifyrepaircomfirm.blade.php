@extends('layouts.admin')

@section('content')
<div class="card p-2">
    <h4 class="p-2 text-primary h5">รายการการแจ้งซ่อมรออนุมัติ</h4>
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
            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">ชื่อผู้แจ้งซ่อม ฯ</th>
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
            <p class="text-xs font-weight-bold mb-0">{{$data->user_repair}}</p>
            </td>
            <td>
                <div class="d-flex flex-row justify-content-end">
                    <button type="button" class="btn btn-sm bg-gradient-info mx-1" data-bs-toggle="modal"
                    data-bs-target="#detail{{ $data->id }}">รายละเอียด</button>
                    <form action="{{route('NotifyRepairConfirm.update',$data->id)}}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" value="2">
                    <button type="submit" class="btn btn-sm bg-gradient-success">อนุมัติ</button>
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
    </div>
  </div>
@endsection
