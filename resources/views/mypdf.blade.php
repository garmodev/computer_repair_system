<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>รายงานการแจ้งซ่อม</title>
</head>
<body>

    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        body {
            font-family: "THSarabunNew";
        }

       </style>
       <div style="text-align: center">
        <img class="img" src="{{ public_path('img/logo.png') }}" style="width: 100px; height: 100px; ">
       </div>

    <h2 style="text-align: center "><b>รายงานการแจ้งซ่อมเครื่องคอมพิวเตอร์</b></h2>
    <h3 style="text-align: right">พิมพ์วัน {{$d}}</h3>
    <table style="width:100%">
        <tr style="text-align: center">
          <th>รายการแจ้งซ่อม ฯ</th>
          <th>รหัสเครื่องคอมพิวเตอร์</th>
          <th>ห้อง</th>
          <th>แถว</th>
          <th>ตำแหน่ง</th>
          <th>วันที่แจ้งซ่อม</th>
          <th>วันที่ซ่อมเสร็จ</th>
          <th>อาการ</th>
          <th>หมายเหตุ</th>
          <th>ชื่อผู้ซ่อม ฯ</th>
          <th>สถานะ</th>
        </tr>
        @foreach ($item as $data)
        <tr style="text-align: center">
            <td>{{$data->id}}</td>
            <td>{{$data->code_computer}}</td>
            <td>{{$data->room}}</td>
            <td>{{$data->row}}</td>
            <td>{{$data->position}}</td>
            <td>{{$data->data_repair}}</td>
            <td>{{$data->data_finish}}</td>
            <td>{{$data->cause}}</td>
            <td>{{$data->note}}</td>
            <td>{{$data->name_repair}}</td>
            <td>
                @if ($data->status==3)
                <div style="font-family: DejaVu Sans, sans-serif;">✔</div>
                @else
                <div style="font-family: DejaVu Sans, sans-serif;">✗</div>
                @endif
            </td>

        </tr>

        @endforeach
      </table>


</body>

</html>
