@extends("layouts.dash")
@section("title","Users")
@section("content")
<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">الكروت المتبقية</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fadein active">
      <table class="table">
    <thead>
      <tr>
        <th scope="col">الاسم</th>
        <th scope="col">السعر</th>
        <th scope="col">الوصف</th>
        <th scope="col">الكمية</th>



      </tr>
    </thead>
    <h3>
      Products List</h3>
    @foreach($cards as $v)

    <tbody>
  <tr>
    <td>{{$v->name}}</td>
    <td>{{$v->price}}</td>
    <td>{{$v->desc}}</td>
    <td>{{$v->cnt}}</td>
  </tr>
</tbody>
@endforeach
    </table>
  </div>


</div>


@stop
