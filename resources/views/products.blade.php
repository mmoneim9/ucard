@extends("layouts.dash")
@section("title","Products")
@section("content")
<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Show Priducts</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu1">Create</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu2">Update</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu3">delete</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fadein active">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Size</th>
      <th scope="col">Color</th>
      <th scope="col">Category</th>
      <th scope="col">Image</th>
      <th scope="col">Vendor</th>
      <th scope="col">Description</th>
    </tr>
  </thead>

      <h3>
        Products List</h3>
      @foreach($data["products"] as $v)

      <tbody>
    <tr>
      <th scope="row">{{$v->name}}
      </th>
      <td>{{$v->price}}</td>
      <td>{{$v->size}}</td>
      <td>{{$v->color}}</td>
      <td>{{$v->category}}</td>
      <td><img style="width:200px;height:auto;" src="{{$v->image}}" /></td>
      <td>{{$v->vendor}}</td>

      <td>{{$v->description}}</td>
    </tr>
  </tbody>
@endforeach
</table>

</div>
    <div id="menu1" class="tab-pane fade">
      <h3>Add Vendors </h3>
      <form method="post" enctype="multipart/form-data" action="{{route('insertproduct')}}">
      @csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input name="nm" type="text" class="form-control" placeholder="Vendor Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Price</label>
    <input name="price" type="text" class="form-control" placeholder="Vendor Email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Size</label>
    <input name="size" type="phone" class="form-control" placeholder="Vendor Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">color</label>
    <textarea name="color" class="form-control" placeholder="Description"> </textarea>
  </div>
  <label for="exampleFormControlInput1">Select Category</label>
    <select name="cat">
    @foreach($data["cat"] as $v)

      <option value="{{$v->id}}">{{$v->catname}}</option>
      @endforeach
</select>
  <div class="form-group">
    <label for="exampleFormControlInput1">Image </label>
    <input name="image" type="file" class="form-control">
  </div>
  <div class="form-group">
  <label for="exampleFormControlInput1">Vendor </label>

  <select name="vendor">

  @foreach($data["vend"] as $v)

      <option value="{{$v->id}}">{{$v->name}}</option>
      @endforeach
</select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Description</label>
    <textarea name="desc" class="form-control" placeholder="Description"> </textarea>
  </div>
  <div class="form-group">
    <Button name="name" type="submit" class="btn btn-primary">Submit</Button>
  </div>
</form>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Update Vendors</h3>
      <form method="post" enctype="multipart/form-data" action="{{route('updateproduct')}}">
      @csrf
      <div class="form-group">
    <label for="exampleFormControlInput1">Select Product</label>
    <select name="ID">
    @foreach($data["products"] as $v)

      <option value="{{$v->id}}">{{$v->name}}</option>
      @endforeach
</select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input name="nm" type="text" class="form-control" placeholder="Vendor Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Price</label>
    <input name="price" type="email" class="form-control" placeholder="Vendor Email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Size</label>
    <input name="size" type="phone" class="form-control" placeholder="Vendor Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">color</label>
    <textarea name="color" class="form-control" placeholder="Description"> </textarea>
  </div>
  <label for="exampleFormControlInput1">Select Category</label>
    <select name="cat">
    @foreach($data["cat"] as $v)

      <option value="{{$v->id}}">{{$v->catname}}</option>
      @endforeach
</select>
  <div class="form-group">
    <label for="exampleFormControlInput1">Image </label>
    <input name="image" type="file" class="form-control">
  </div>
  <div class="form-group">

  <select name="vendor">
  <label for="exampleFormControlInput1">Vendor </label>

  @foreach($data["cat"] as $v)

      <option value="{{$v->id}}">{{$v->catname}}</option>
      @endforeach
</select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Description</label>
    <textarea name="desc" class="form-control" placeholder="Description"> </textarea>
  </div>
  <div class="form-group">
    <Button name="name" type="submit" class="btn btn-primary">Submit</Button>
  </div>
</form>    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Delete vendor</h3>
      @foreach($data["products"] as $v)
<a href="deleteproduct/{{$v->id}}">Delete {{$v->name}}</a>

      @endforeach    </div>
  </div>
</div>

@stop
