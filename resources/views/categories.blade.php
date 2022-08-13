@extends("layouts.dash")
@section("title","Vendors")
@section("content")
<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">الاصناف</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu1">انشاء</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu2">تعديل</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu3">حذف</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fadein active">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">اسم الصنف</th>
      <th scope="col">الوصف</th>
    </tr>
  </thead>

      <h3>Vendors List</h3>
      @foreach($categories as $v)

      <tbody>
    <tr>
      <th scope="row">{{$v->catname}}
      <td>{{$v->description}}</td>
    </tr>
  </tbody>
@endforeach
</table>

</div>
    <div id="menu1" class="tab-pane fade">
      <h3>انشاء صنف </h3>
      <form method="post" enctype="multipart/form-data" action="{{route('insertcat')}}">
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
    <Button name="name" type="submit" class="btn btn-primary">انشاء</Button>
  </div>
</form>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>تعديل صنف</h3>
      <form method="post" enctype="multipart/form-data" action="{{route('updatecat')}}">
      @csrf
      <div class="form-group">
    <label for="exampleFormControlInput1">اختر الصنف</label>
    <select name="ID">
@foreach($categories as $v)

      <option value="{{$v->id}}">{{$v->catname}}</option>
      @endforeach
</select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">الاسم</label>
    <input name="nameupdate" type="text" class="form-control" placeholder="Vendor Name">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">الوصف</label>
    <textarea name="descu" class="form-control" placeholder="Description"> </textarea>
  </div>
  <div class="form-group">
    <Button type="submit" class="btn btn-primary">تعديل</Button>
  </div>
</form>    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Delete vendor</h3>
      @foreach($categories as $v)
<a href="deletecat/{{$v->id}}">Delete {{$v->catname}}</a>
<br>
      @endforeach    </div>
  </div>
</div>

@stop
