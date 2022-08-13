@extends("layouts.dash")
@section("title","Users")
@section("content")
<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">عمليات شحن اليوم</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li class="active"><a data-toggle="tab" href="#home1">اظهر عمليات الشحن</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu1">اظهر عمليات الشحن بالتاريخ</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </ul>


  <div class="tab-content">
    <div id="home" class="tab-pane fadein active">
<h3>اظهر عمليات الشحن</h3>
      <table class="table">
    <thead>
      <tr>
        <th scope="col">اسم المحل</th>
        <th scope="col">الموبايل</th>
        <th scope="col">الايميل</th>
        <th scope="col">القيمة</th>
        <th scope="col">التاريخ</th>


      </tr>
    </thead>
    <tbody>
      @foreach($rechargelog as $r)
      <tr>
      <td>  {{$r->shopname}}</td>
      <td>  {{$r->mobile}}</td>
      <td>  {{$r->email}}</td>
      <td>  {{$r->balance}}</td>
      <td>  {{$r->dt}}</td>
    </tr>
      @endforeach
        </tbody>
    </table>
  </div>
  <div id="home1" class="tab-pane fadein">
<h3>اظهر عمليات الشحن</h3>
    <div class="form-group">
      <label for="exampleFormControlInput1">ادخل الايميل</label>
      <input id="searchemail" name="nm" type="text" class="form-control" placeholder="Email">
    </div>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">اسم المحل</th>
      <th scope="col">الموبايل</th>
      <th scope="col">الايميل</th>
      <th scope="col">القيمة</th>
      <th scope="col">التاريخ</th>


    </tr>
  </thead>
  <tbody class="searchresult"></tbody>
  </table>
</div>

    <div id="menu1" class="tab-pane fade">
      <h3>اظهر عمليات الشحن بالتاريخ </h3>
      <div class="form-group">
        <label for="exampleFormControlInput1">من </label>
        <input autocomplete="off" id="firstdate" name="nm" type="text" class="form-control" placeholder="First Date">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">الي</label>
        <input autocomplete="off"  id="seconddate" name="nm" type="text" class="form-control" placeholder="Second Date">
      </div>

      <table class="table">
    <thead>
      <tr>
        <th scope="col">اسم المحل</th>
        <th scope="col">الموبايل</th>
        <th scope="col">الايميل</th>
        <th scope="col">القيمة</th>
        <th scope="col">التاريخ</th>


      </tr>
    </thead>
    <tbody class="searchresult2">
        </tbody>
    </table>
  </div>

</div>


@stop
