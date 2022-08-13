@extends("layouts.dash")
@section("title","Vendors")
@section("content")
<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">اظهار الاصناف</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu1">ادخال صنف</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu3">حذف</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fadein active">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">اسم الكارت</th>
      <th scope="col">الصنف</th>
      <th scope="col">السعر</th>
      <th scope="col">الصورة</th>
      <th scope="col">الوصف</th>

    </tr>
  </thead>

      <h3>Vendors List</h3>
      @foreach($cards as $v)

      <tbody>
    <tr>
      <td scope="row">{{$v->name}}</td>
      <td scope="row">{{$v->catid}}</td>
      <td scope="row">{{$v->price}}</td>
      <td>{{$v->desc}}</td>
      <td><img style="width:200px;height:auto;" src="{{$v->img}}" /></td>

    </tr>
  </tbody>
@endforeach
</table>

</div>
    <div id="menu1" class="tab-pane fade">
      <h3>ادخال صنف </h3>
      <form method="post" enctype="multipart/form-data" action="{{route('insertcard')}}">
      @csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">الاسم</label>
    <input name="nm" type="text" class="form-control" placeholder="Vendor Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">الوصف</label>
    <textarea name="desc" class="form-control" placeholder="Description"> </textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">الصورة </label>
    <input name="image" type="file" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">اختر الصنف</label>
    <select name="ID">
@foreach($categories as $v)

      <option value="{{$v->id}}">{{$v->name}}</option>
      @endforeach
</select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Price </label>
      <input name="price" type="number" class="form-control">
    </div>
  <div class="form-group">
    <Button name="name" type="submit" class="btn btn-primary">تأكيد</Button>
  </div>
</form>
    </div>

    <div id="menu3" class="tab-pane fade">
      <h3>Delete Card</h3>
      @foreach($cards as $v)
<a href="{{route('deletecard',$v->id)}}">Delete {{$v->name}}</a>
<br>
      @endforeach    </div>
  </div>
</div>

@stop
