@extends("layouts.dash2")
@section("title","Users")
@section("content")
<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Show Recharges</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a data-toggle="tab" href="#menu1">Search Recharges by date</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fadein active">

      <h3>Search Recharges </h3>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <input id="searchemail" name="nm" type="text" class="form-control" placeholder="Email">
      </div>

      <table class="table">
    <thead>
      <tr>
        <th scope="col">shopname</th>
        <th scope="col">Mobile</th>
        <th scope="col">Email</th>
        <th scope="col">amount</th>
        <th scope="col">date</th>


      </tr>
    </thead>
    <tbody class="searchresult">
        </tbody>
    </table>
  </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Search Recharges by Date </h3>
      <div class="form-group">
        <label for="exampleFormControlInput1">First Date</label>
        <input autocomplete="off" id="firstdate" name="nm" type="text" class="form-control" placeholder="First Date">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Second Date</label>
        <input autocomplete="off"  id="seconddate" name="nm" type="text" class="form-control" placeholder="Second Date">
      </div>

      <table class="table">
    <thead>
      <tr>
        <th scope="col">shopname</th>
        <th scope="col">Mobile</th>
        <th scope="col">Email</th>
        <th scope="col">amount</th>
        <th scope="col">date</th>

      </tr>
    </thead>
    <tbody class="searchresult">
        </tbody>
    </table>
  </div>

</div>


@stop
