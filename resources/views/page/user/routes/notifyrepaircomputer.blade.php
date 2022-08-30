@extends('layouts.user')

@section('contentuser')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm p-3 mb-2 bg-white rounded">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0 text-primary h5">แจ้งซ่อมคอมพิวเตอร์</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('NotifyRepairComputer.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="user_repair" value="{{ Auth::user()->name }}">
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="example-text-input"
                                            class="form-control-label text-xs ss">รหัสเครื่องคอมพิวเตอร์</label>
                                        <input class="form-control form-control-sm" type="text" name="code_computer">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label text-xs">ห้อง</label>

                                        <select class="form-select form-select-sm" aria-label="Default select example" name="room">
                                            @foreach ($room as $item)
                                            <option value="{{$item->number_room}}">{{$item->number_room}}</option>
                                            @endforeach
                                          </select>

                                                </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label text-xs">แถว</label>
                                        <input class="form-control form-control-sm" type="text" name="row">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label text-xs">ตำแหน่ง</label>
                                        <input class="form-control form-control-sm" type="text" name="position">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label text-xs">อาการ</label>
                                        <input class="form-control form-control-sm" type="text" name="cause">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label text-xs">หมายเหตุ</label>
                                        <input class="form-control form-control-sm" type="text" name="note">
                                    </div>
                                </div>
                                <div class="col-md-12 text-end">
                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn bg-gradient-success btn-sm">บันทึกการแจ้งซ่อม</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
@endsection
