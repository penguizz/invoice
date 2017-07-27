@extends('layouts.master-layout')

@section('title', 'Page Title')

@section('mainmenu')
@include('mainmenu')
@endsection

@section('content')

<div class="col-md-8 well">	
  	<div class="col-md-3 show-cust-companyname">
  		<p><b>Company Name :</b></p>
  	</div>
  	<div class="col-md-9 show-cust-name pullright">
		<p>Geodis Wilson Thai Co.,Ltd จีโอดิส วิลสัน (ประเทศไทย) จำกัด (มหาชน)</p>	
	</div>
  <table class="table">
   	<thead>
      <tr>
        <th style="width: 150px"></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td>ชื่อบริษัท </td>
        <td>:</td>
        <td>จีโอดิส วิลสัน (ประเทศไทย) จำกัด (มหาชน)</td>
      </tr>
      <tr class="active">
        <td>Company name</td>
        <td>:</td>
        <td>Geodis Wilson Thai Co.,Ltd </td>
      </tr>
      <tr>
        <td>ที่อยู่</td>
        <td>:</td>
        <td>july@example.com</td>
      </tr>
      <tr class="active">
        <td>Address</td>
        <td>:</td>
        <td>bo@example.com</td>
      </tr>
      <tr>
        <td>TaxID</td>
        <td>:</td>
        <td>act@example.com</td>
      </tr>
      <tr class="active">
        <td>เบอร์โทร</td>
        <td>:</td>
        <td>bo@example.com</td>
      </tr>
      <tr>
        <td>เบอร์แฟ็กซ์</td>
        <td>:</td>
        <td>act@example.com</td>
      </tr>
      <tr class="active">
        <td>ชื่อผู้ติดต่อ</td>
        <td>:</td>
        <td>bo@example.com</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td>act@example.com</td>
      </tr>
      <tr class="active">
        <td>เบอร์โทรของผู้ติดต่อ</td>
        <td>:</td>
        <td>bo@example.com</td>
      </tr>
      <tr>
        <td>กำหนดการวางบิล</td>
        <td>:</td>
        <td>
        	<form action="">
				<input type="checkbox" name="vehicle" value="Bike"> รับเช็ค
				<br>	
				<input type="checkbox" name="vehicle" value="Car">	การโอนเงิน 
					
			</form>
		</td>
        <td><button type="button" class="btn btn-default btn-md pullright">
  						<span class="glyphicon glyphicon-save" aria-hidden="true"></span> เอกสารประกอบการรับเช็ค
  					</button><br></td>
        <td></td>
        <td><button type="button" class="btn btn-default btn-md">
  						<span class="glyphicon glyphicon-save" aria-hidden="true"></span> เอกสารประกอบการวางบิล
  					</button>
  					</td>

    </tbody>
  </table>
</div>

    
@endsection