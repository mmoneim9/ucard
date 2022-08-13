@extends("layouts.dash")
@section("title","Vendors")
@section("content")
<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#menu1">انشاء</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu3">حذف</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </ul>

  <div class="tab-content">
    <div id="menu1" class="tab-pane fade">
      <h3>ادخال كارت </h3>
      <form method="post" enctype="multipart/form-data" action="{{route('insertcardvalue')}}">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlInput1">اختر الصنف</label>
        <select class="form-control" name="ID">
    @foreach($categories as $v)

          <option value="{{$v->id}}">{{$v->name}}</option>
          @endforeach
    </select>
        </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">رقم الكارت</label>
    <textarea name="val" class="form-control" placeholder="Description"> </textarea>
  </div>
  <div class="form-group">
    <Button name="name" type="submit" class="btn btn-primary">ادخال</Button>
  </div>
</form>
    </div>

    <div id="menu3" class="tab-pane fade">
      <h3>Delete Card</h3>
      @foreach($cardvalues as $v)
<a href="{{route('deletecardvalue',$v->id)}}">Delete {{$v->id}}</a><br>
<br>
      @endforeach    </div>
  </div>
</div>

@stop
