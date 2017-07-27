@extends('layouts.master-layout')

@section('title', 'Page Title')

@section('mainmenu')
@include('mainmenu')
@endsection

@section('content')

<div class="">
  <form>
    <div class="container well" style="width: 75%">
    <div class="col-md-6 col-md-offset-2">
          <h2>เพิ่มสินค้าและบริการ</h2>
          <br>
    </div>

  <div class="col-md-6 col-md-offset-3">
    <div class="form-group">
      <select class="form-control">
        <label for="no">เลือกสินค้าหรือบริการ :</label>
          <option value="0">กรุณาเลือก</option>
          <option value="customer">Priduct</option>
          <option value="supplier">Service</option>
      </select>
    </div>
    <div class="form-group">
        <label for="no">No(รหัสสินค้า) :</label>
        <input type="name" class="form-control" id="customername" placeholder="Enter custmer">        
    </div>    
    <div class="form-group">
        <label for="date">Name :</label>
        <input type="district" class="form-control" id="district">   
    </div>
    <div class="form-group">
        <label for="revision">Date :</label>
        <input type="district" class="form-control" id="district">   
    </div>
    <div class="form-group">
        <label for="address">Price :</label>
        <input type="Postal" class="form-control" id="Postal">   
    </div>
    <button type="submit" class="btn btn-primary pull-right">เพิ่มสินค้าและบริการ </button>
    <br>
    <br>
    <br>
    </div>
    </div>
  </form>
</div>
@endsection