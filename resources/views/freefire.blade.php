@extends("layouts.dash")
@section("title","Products")
@section("content")
<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">اظهار كروت فريفاير</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu1">انشاء</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu2">تعديل</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu3">حذف</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fadein active">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">اسم اللعبة</th>
      <th scope="col">السعر</th>
      <th scope="col">نوع الكارت</th>
      <th scope="col">الصورة</th>
    </tr>
  </thead>

      <h3>
        Products List</h3>
      @foreach($mgames as $v)

      <tbody>
    <tr>
      <th scope="row">{{$v->gamename}}
      </th>
      <td>{{$v->price}}</td>
      <td>{{$v->cardtype}}</td>
      <td><img style="width:200px;height:auto;" src="{{$v->img}}" /></td>
    </tr>
  </tbody>
@endforeach
</table>

</div>
    <div id="menu1" class="tab-pane fade">
      <h3>Add Vendors </h3>
      <form method="post" enctype="multipart/form-data" action="{{route('insertfreefire')}}">
      @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">السعر</label>
    <input name="price" type="text" class="form-control" placeholder="السعر">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">اسم الكارت</label>
    <input name="typ" type="text" class="form-control" placeholder="اسم الكارت">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">الصورة</label>
    <input name="image" type="file" class="form-control">
  </div>
  <div class="form-group">
    <Button name="name" type="submit" class="btn btn-primary">تأكيد</Button>
  </div>
</form>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>تعديل كارت</h3>
      <form method="post" enctype="multipart/form-data" action="{{route('updatefreefire')}}">
      @csrf
      <div class="form-group">
    <label for="exampleFormControlInput1">اختر كارت</label>
    <select name="ID">
      @foreach($mgames as $v)

      <option value="{{$v->id}}">{{$v->cardtype}}</option>
      @endforeach
</select>
<div class="form-group">
  <label for="exampleFormControlInput1">السعر</label>
  <input name="price" type="text" class="form-control" placeholder="السعر">
</div>
<div class="form-group">
  <label for="exampleFormControlInput1">اسم الكارت</label>
  <input name="typ" type="phone" class="form-control" placeholder="اسم الكارت">
</div>
<div class="form-group">
  <label for="exampleFormControlInput1">الصورة </label>
  <input name="image" type="file" class="form-control">
</div>
<div class="form-group">
  <Button name="name" type="submit" class="btn btn-primary">تعديل</Button>
</div>
</form>  </div>
</div>
    <div id="menu3" class="tab-pane fade">
      <h3>Delete vendor</h3>
      @foreach($mgames as $v)
<a href="deletefreefire/{{$v->id}}">Delete {{$v->cardtype}}</a>
<br>
      @endforeach    </div>
  </div>
</div>

@stop
