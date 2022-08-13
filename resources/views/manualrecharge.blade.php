@extends("layouts.dash")
@section("title","Users")
@section("content")
<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">عمليات شحن اليوم</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#home2">بحث عمليات الشحن</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu1">Search Recharges by date</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fadein active">
      <table class="table">
    <thead>
      <tr>
        <th scope="col">الموبايل</th>
        <th scope="col">اسم المحل</th>
        <th scope="col">الايميل</th>
        <th scope="col">القيمة</th>
        <th scope="col">اللعبة</th>
        <th scope="col">نوع الكارت</th>
        <th scope="col">كود الكارت</th>
        <th scope="col">معرف اللاعب</th>
        <th scope="col">التاريخ</th>
        <th scope="col">تمت</th>
        <th scope="col">تأكيد اتمام العملية</th>


      </tr>
    </thead>
    <tbody>
      @foreach ($rechargelog as $re)
      <tr>

      <td>  {{$re["mobile"]}}</td>
      <td>  {{$re["shopname"]}}</td>
      <td>  {{$re["email"]}}</td>
      <td>  {{$re["amount"]}}</td>
      <td>  {{$re["game"]}}</td>
      <td>  {{$re["cardtype"]}}</td>
      <td>  {{$re["cardno"]}}</td>
      <td>  {{$re["playerid"]}}</td>
      <td>  {{$re["dt"]}}</td>
      <td>  {{$re["done"]}}</td>
      <td><a href="/approvemanualrecharge/{{$re['id']}}">تأكيد العملية<a></td>
      </tr>

@endforeach

        </tbody>
    </table>
  </div>
  <div id="home1" class="tab-pane fadein">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">الموبايل</th>
      <th scope="col">اسم المحل</th>
      <th scope="col">الايميل</th>
      <th scope="col">القيمة</th>
      <th scope="col">اللعبة</th>
      <th scope="col">نوع الكارت</th>
      <th scope="col">كود الكارت</th>
      <th scope="col">معرف اللاعب</th>
      <th scope="col">التاريخ</th>
      <th scope="col">تمت</th>
      <th scope="col">تأكيد اتمام العملية</th>


    </tr>
  </thead>
  <tbody class="searchresult">
      </tbody>
  </table>
</div>
    <div id="home2" class="tab-pane fadeins">

      <h3>Search Recharges </h3>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <input id="searchmanual" name="nm" type="text" class="form-control" placeholder="Email">
      </div>

      <table class="table">
    <thead>
      <tr>
        <th scope="col">الموبايل</th>
        <th scope="col">اسم المحل</th>
        <th scope="col">الايميل</th>
        <th scope="col">القيمة</th>
        <th scope="col">اللعبة</th>
        <th scope="col">نوع الكارت</th>
        <th scope="col">كود الكارت</th>
        <th scope="col">معرف اللاعب</th>
        <th scope="col">التاريخ</th>
        <th scope="col">تمت</th>
        <th scope="col">تأكيد اتمام العملية</th>


      </tr>
    </thead>
    <tbody class="searchresult">
        </tbody>
    </table>
  </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Search Recharges by Date </h3>
      <div class="form-group">
        <label for="exampleFormControlInput1"> تاريخ من</label>
        <input autocomplete="off" id="firstdatemanual" name="nm" type="text" class="form-control" placeholder="First Date">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">تاريخ الي</label>
        <input autocomplete="off"  id="seconddatemanual" name="nm" type="text" class="form-control" placeholder="Second Date">
      </div>

      <table class="table">
    <thead>
      <tr>
        <th scope="col">الموبايل</th>
        <th scope="col">اسم المحل</th>
        <th scope="col">الايميل</th>
        <th scope="col">القيمة</th>
        <th scope="col">اللعبة</th>
        <th scope="col">نوع الكارت</th>
        <th scope="col">كود الكارت</th>
        <th scope="col">معرف اللاعب</th>
        <th scope="col">التاريخ</th>
        <th scope="col">تمت</th>
        <th scope="col">تأكيد اتمام العملية</th>
      </tr>
    </thead>
    <tbody class="searchresult">
        </tbody>
    </table>
  </div>

</div>


@stop
