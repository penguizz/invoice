@extends('layouts.master-layout-home')

@section('title', 'Page Title')

@section('mainmenu')
@include('mainmenu')
@endsection

@section('content')
<div class="col-md-6 ">
	<div class="container">
		<div class="welcome "> 
			<img src="/images/statgchart.jpg">
		</div>
		<div class="">
		<br>
			<button type="button" class="btn">ดูเพิ่มเติม</button>
		</div>
	</div>
</div>
<div class="col-md-6">
	

	<div class="welcome"> 
		<h1>WELCOME</h1>	
	</div>
	<div class="home-point linkwelcome" style="color: #474747">
		<div class="">
			<li><a href="/po">purchase order</a></li>
			<br>
		</div>
		<div class="">		
			<li><a href="/invoice">invoice</a></li>
			<br>
		</div>
		<div class="">	
			<li><a href="/quotation">quotation</a></li>
			<br>
		</div>
	</div>
</div>
@endsection