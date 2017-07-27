@extends('layouts.master-layout-home')

@section('title', 'Page Title')

@section('mainmenu')
@include('mainmenu')
@endsection

@section('content')
<div class="well">
<!-- <div class="menusearch panel-heading col-md-1">ค้นหา</div> -->
    <div class="panel-body">
        <form>
          <div class="system  form-group col-md-3">
            <label for="usr" class="col-md-3">Type</label>
            <div class="col-md-9">
                <select class="form-control">
                    <option value="0">กรุณาเลือก</option>
                    <option value="customer">Customer</option>
                    <option value="supplier">Supplier</option>
                </select>
            </div>
          </div>
          <div class="form-group col-md-7">
              <label for="pwd" class="col-md-2">Optional</label>
               <div class="col-md-3">
                <select class="form-control">
                    <option value="00">กรุณาเลือก</option>
                    <option value="">ชื่อลูกค้า</option>
                    <option value="">ผู้ติด่อ</option>                
                    <option value="">เลขที่ใบกำกับภาษี</option>                
                    <option value="">จังหวัด</option>                
                </select>             
               </div>
                  <div class="col-md-4">
                  <select class="js-example-basic-multiple" multiple="multiple" style="width: 100%;height: 40%" >
                      <option value="AL">Alabamaqqq</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                  </select>
                </div> 
                
                <div class="datepic col-md-3">
                  <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="daterange" class="form-control" />
                    <!-- <input type='text' class="form-control" /> -->
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
          </div>            
            <div class="pull-right">
                <button type="button" class="btn">Search</button>
                <button type="button" class="btn btn-danger">Clear</button>
                <a href="/supplier/create"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add</button></a>
            </div>

        </form> 
    </div>
</div>

<div class="panel panel-default">    
  <div class="panel-heading">Supplier</div>
    <div class="pull-right" style="margin-bottom: 10px">      
    </div>
  <div class="panel-body">
    <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th style="width: 10px" class="text-center">No</th>
            <th style="width: 170px" class="text-center">Company Name</th>
            <th style="width: 280px" class="text-center">Address</th>
            <th style="width: 100px" class="text-center">Company Tel.</th>
            <th style="width: 100px" class="text-center">Tax ID</th>  
            <th style="width: 150px" class="text-center">Contect Person</th>    
            <th style="width: 110px" class="text-center">Person Tel.</th> 
            <th style= "width: 170px" class="text-center">Person Email</th>    
            <th style= "width: 70px" class="text-center">Due Bill</th>
            <th style= "width: 20px"></th>    
          </tr>
        </thead>
    <tbody>
        <tr>
            <td class="text-center">1</td>
            <td><a href="#" data-toggle="modal" data-target="#myModal" style="color:#000">Geodis Wilson Thai Co.,Ltd <br/>จีโอดิส วิลสัน (ประเทศไทย) จำกัด (มหาชน) </a></td>
            <td>207, Sukhumvit 50 Rd.,Soi SungautaiPrakhang, Klongtoey, Bangkok 10260 <br/> 207 ซอยแสงอุทัย ถนนสุขุมวิท 50 พระโขนง คลองเตย กรุงเทพมหานคร 10260</td>
            <td class="text-center">-</td>
            <td class="text-center">-</td>
            <td>Khun Pongpobh Phoemphipat<br/> คุณปองภพ</td>
            <td class="text-center">091-5450244</td>
            <td>Nopphon.phoemphipat@geodis.com</td>
            <td class="text-center">30 days </td>
            <td>
                <div class="picicon">
                    <button type="button" class="btn"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>              
                </div>
            </td>
        </tr>
      <tr>
            <td class="text-center">2</td>
            <td>บริษัท แอร์พอร์ตเนิสซิ่งโอม จำกัด(โรงพยาบาล บี.แคร์ เมดิคอลเซ็นเตอร์)</td>
            <td>29 หมู่ที่ 6 ถนนพหลโยธิน แขวงสายไหม เขตสายไหม กรุงเทพฯ 10220</td>
            <td class="text-center">0-2523-3359-71</td>
            <td class="text-center">0105538131521</td>
            <td>Sawinee</td>
            <td class="text-center">096-926-6979</td>
            <td>Sawinee@odeosol</td>
            <td class="text-center">30 days </td>
            <td>
                <div class="picicon">
                    <button type="button" class="btn"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>              
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center">3</td>
            <td>Geodis Wilson Thai Co.,Ltd <br/>จีโอดิส วิลสัน (ประเทศไทย) จำกัด (มหาชน) </td>
            <td>207, Sukhumvit 50 Rd.,Soi SungautaiPrakhang, Klongtoey, Bangkok 10260 <br/> 207 ซอยแสงอุทัย ถนนสุขุมวิท 50 พระโขนง คลองเตย กรุงเทพมหานคร 10260</td>
            <td class="text-center">02-6452615</td>
            <td class="text-center">022482155</td>
            <td>Khun Pongpobh <br/> คุณปองภพ</td>
            <td class="text-center">091-5450244</td>
            <td>si2@e-parts.co.th <br/> paul@e-parts.co.th</td>
            <td class="text-center">30 days </td>
            <td>
                <div class="picicon">
                    <button type="button" class="btn"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>              
                </div>
            </td>
        </tr>
    </tbody>        
  </div>
</div>

  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Geodis Wilson Thai Co.,Ltd จีโอดิส วิลสัน (ประเทศไทย) จำกัด (มหาชน)</h4>
            </div>
            <div class="modal-body">
                <form>
                    <fieldset>
                        <p>ชื่อบริษัท : จีโอดิส วิลสัน (ประเทศไทย) จำกัด (มหาชน)</p>
                        <p>Company Name : Geodis Wilson Thai Co.,Ltd</p>
                            <p>ที่อยู่ : 207 ซอยแสงอุทัย ถนนสุขุมวิท 50 พระโขนง คลองเตย กรุงเทพมหานคร 10260</p>
                            <p>Address : 207, Sukhumvit 50 Rd.,Soi SungautaiPrakhang, Klongtoey, Bangkok 10260 </p>
                            <p>TaxID : </p>
                            <p>เบอร์โทร : </p>
                            <p>เบอร์แฟ็กซ์ : </p>
                            <p>ชื่อผู้ติดต่อ : </p>
                            <p>Email : </p>
                            <p>เบอร์โทรของผู้ติดต่อ : </p>
                            <p>กำหนดการวางบิล :
                                <input type="checkbox" name="vehicle" value="Bike"> รับเช็ค  
                                <input type="checkbox" name="vehicle" value="Car">  การโอนเงิน                  
                            </p>
                            <p>
                                <button type="button" class="btn btn-default btn-md pullright">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                                </button> เอกสารประกอบการรับเช็ค  
                                <button type="button" class="btn btn-default btn-md pullright">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
                                </button> เอกสารประกอบการวางบิล
                            </p>                        
                    </fieldset>
                </form>

                <form action="formprocessor.html" method="get">
                    <div class="fieldSet"> 
                        <fieldset>
                            <p><label></label></p>
                            
                        </fieldset>
                    </div>
                </form>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> edit</button> 
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>


        </div>
      
    </div>

</div>
    
@endsection