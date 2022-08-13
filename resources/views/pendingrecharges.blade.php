@extends("layouts.dash")
@section("title","Users")
@section("content")
<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">اظهار العمليات قيد الانتظار</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fadein active">
      <h3>العمليات قيد الانتظار</h3>

      <table class="table">
    <thead>
      <tr>
        <th scope="col">الموبايل</th>
        <th scope="col">اسم المحل</th>
        <th scope="col">الايميل</th>
        <th scope="col">القيمة</th>
        <th scope="col">اللعبة</th>
        <th scope="col">معرف اللاعب</th>
        <th scope="col">التاريخ</th>
        <th scope="col">تمت ؟</th>
        <th scope="col">تأكيد اتمام العملية</th>


      </tr>
    </thead>
    <h3>
    </h3>
    <tr>

    @foreach($precharges as $v)

    <tbody>
    <th scope="row">{{$v->mobile}}
    </th>
    <td>{{$v->shopname}}</td>
    <td>{{$v->email}}</td>
    <td>{{$v->amount}}</td>
    <td>{{$v->game}}</td>
    <td>{{$v->playerid}}</td>
    <td>{{$v->dt}}</td>
    <td>{{$v->done}}</td>
    <td><a href="approvemanualrecharge/{{$v->id}}">تأكيد العملية</a></td>
</tbody>
@endforeach
</tr>

    </table>
  </div>


</div>


@stop
