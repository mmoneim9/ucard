@extends("layouts.dash")
@section("title","Users")
@section("content")
<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Show Users</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu1">Search User</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu2">Add Balance to User</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fadein active">

    <table class="table">
  <thead>
    <tr>
      <th scope="col">الاسم</th>
      <th scope="col">الايميل</th>
      <th scope="col">اسم المحل</th>
      <th scope="col">العنوان</th>
      <th scope="col">الرصيد</th>
      <th scope="col">موافقة</th>
      <th scope="col">تفعيل الشحن الآلي</th>
    </tr>
  </thead>

      <h3>
        Users List</h3>
      @foreach($users as $v)
      <tbody>
        <div id="table">
    <tr>
      <th scope="row">{{$v->name}}
      </th>
      <td>{{$v->email}}</td>
      <td>{{$v->shopname}}</td>
      <td>{{$v->address}}</td>
      <td>{{$v->balance}}</td>
      <td>
      @if($v->approve=='Y')
<a href='approveuser/{{$v->id}}'>الغاء تفعيل المستخدم</a>
@else
<a href='approveuser/{{$v->id}}'>تفعيل المستخدم</a>
@endif
</td>
  <td>
@if($v->isautorecharge=='Y')
<a href='approverecharge/{{$v->id}}'> الغاء الشحن الآلي</a>
@else
<a href='approverecharge/{{$v->id}}'> تفعيل الشحن الآلي</a>

@endif
</td>
    </tr>
  </div>
  </tbody>
@endforeach
</table>

</div>
    <div id="menu1" class="tab-pane fade">
      <h3>Search Users </h3>
      <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input id="search" name="nm" type="text" class="form-control" placeholder="User Name">
      </div>

      <table class="table">
    <thead>
      <th scope="col">الاسم</th>
      <th scope="col">الايميل</th>
      <th scope="col">اسم المحل</th>
      <th scope="col">العنوان</th>
      <th scope="col">الرصيد</th>
      <th scope="col">موافقة</th>
      <th scope="col">تفعيل الشحن الآلي</th>
    </tr>
    </thead>
    <tbody class="searchresult">
        </tbody>
    </table>


    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Add Balance to  Users </h3>
      <h3>Add Vendors </h3>
      <form method="post" enctype="multipart/form-data" action="{{route('addcredit')}}">
      @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input name="email" type="text" class="form-control" placeholder="Vendor Email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Amount</label>
    <input name="amount" type="text" class="form-control" placeholder="Vendor Name">
  </div>
  <div class="form-group">
    <Button name="name" type="submit" class="btn btn-primary">Submit</Button>
  </div>
</form>

    </div>

</div>


@stop
