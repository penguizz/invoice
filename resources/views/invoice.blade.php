<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.master-layout')

@section('title', 'Page Title')

@section('mainmenu')
@include('mainmenu')
@endsection

@section('content-left')  
<div class="panel panel-default">
  <div class="panel-heading">ค้นหา</div>
    <div class="panel-body">
        <form>
          <div class="form-group">
            <label for="usr">Type</label>
            <select class="form-control">
                <option value="0">กรุณาเลือก</option>
                <option value="customer">Customer</option>
                <option value="supplier">Supplier</option>
            </select>
          </div>
          <div class="form-group">
            <label for="usr">Invoice No</label>
                <div class="" style="margin-top: 5px">
                  <select class="js-example-basic-multiple" style="width: 100%;height: 40%;" >
                      <option value="">กรุณาเลือก</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                  </select>
                </div>
          </div>
          <div class="form-group">
            <label for="usr">Purchase Order No</label>
                <div class="" style="margin-top: 5px">
                  <select class="js-example-basic-multiple" style="width: 100%;height: 40%;" >
                      <option value="">กรุณาเลือก</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                  </select>
                </div>
          </div>
          <div class="form-group">
            <label for="usr">Supplier Name</label>
                <div class="" style="margin-top: 5px">
                  <select class="js-example-basic-multiple" style="width: 100%;height: 40%;" >
                      <option value="">กรุณาเลือก</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                      <option value="bL">Alabama</option>
                  </select>
                </div>
          </div>
            <label for="pwd">Date</label>
            <div class="datepic">
              <div class='input-group date' id='datetimepicker1'>
                <input type='text' name="daterange" class="form-control" />
                <!-- <input type='text' class="form-control"/> -->
                 <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                 </span>
               </div>
            </div>
            <br>
            <div class="pull-right">
               <button type="button" class="btn">Search</button>
               <button type="button" class="btn btn-danger">Clear</button>
            </div>
        </form>
    </div>        
</div>
<div class="" style="margin-bottom: 15px">
    <a href="/invoice/create"><button type="button" class="btn btn-primary" style="width: 310px"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มรายการ</button></a>
</div>
@endsection

@section('content-right')    
<div class="panel panel-default">    
  <div class="panel-heading">Invoice</div>
    <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>            
            <th style="width: 150px">Invoice No</th>
            <th class="text-center">Date</th>
            <th class="text-center">Purchase Order No</th>
            <th class="text-center">Credit</th>
            <th class="text-center">Supplier</th>
            <th class="text-center">Total</th>
            <th style= "width: 50px"></th>
          </tr>
        </thead>
        <tbody>
                  <tr>
                      <td><a href="#" data-toggle="modal" data-target="#viewinvoice" style="color:#333">INV-2017-06-009</a></td>
                      <td>12/06/2560</td>
                      <td>P017050620</td>
                      <td>เครดิต 30 วัน</td>
                      <td><a href="#" data-toggle="modal" data-target="#myModal2" style="color:#333">บริษัท แอร์พอร์ตเนิสซิ่ง โฮม จำกัด (สำนักงานใหญ่)</a></td>
                      <td>30,000.00</td>
                      <td>
                        <div class="picicon">
                            <button type="button" class="btn"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>         
                          </div>
                      </td>
                  </tr>                 
        </tbody>
      </table>           
  </div>
</div>

<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">บริษัท แอร์พอร์ตเนิสซิ่ง โฮม จำกัด (สำนักงานใหญ่)</h4>
            </div>
            <div class="modal-body">
                <form>
                    <fieldset>
                        <p>ชื่อบริษัท : บริษัท แอร์พอร์ตเนิสซิ่ง โฮม จำกัด (สำนักงานใหญ่)</p>
                        <p>Company Name : -</p>
                        <p>ที่อยู่ : 29 หมู่ 6 ถนนพหลโยธิน แขวงสายไหม จังหวัดกรุงเทพมหานคร 10220</p>
                        <p>Address : -</p>
                        <p>เบอร์โทร : 02-5233359-71 ต่อ 2612-13</p>
                        <p>เบอร์แฟ็กซ์ : 02-5233374</p>
                        <p>Tax ID : 0105538131521</p>     
                    </fieldset>
                </form>    
            </div>
            <div class="modal-footer">                         
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>      
    </div>
</div> 

<!-- Modal -->
<div class="modal fade" id="viewinvoice" role="dialog">
    <div class="modal-dialog" style="width: 80%">
    
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <fieldset>
                        <div class="createpo" style="margin: 0 auto">
                          <div class="container col-md-12">
                            <div class="col-md-3">                         
                                <img src="/images/n.png" style="width: 200px;margin-bottom: 20px">
                            </div>
                            <div class="col-md-9" style="margin-top: 17 px">
                              <div class="form-group">
                                <h5><b>บริษัท โอดีโอ โซลูชั่น จำกัด (สำนักงานใหญ่)</b></h5>
                                <p>89/379&nbsp&nbsp หมู่ที่ 10&nbsp ถนนรัตนาธิเบศร์&nbsp ต.บางรักใหญ่ &nbspอ.บางบัวทอง &nbsp&nbspจ.นนทบุรี &nbsp11110</p>
                                <p>เลขประจำตัวผู้เสียภาษีอากร  0125556027373 &nbsp&nbsp โทร. 02-0130458 &nbsp&nbsp แฟ็กซ์ 02-0130458</p>
                              </div>
                            </div> 
                            <div class="container col-md-12">                  
                                <table class="table table-bordered">  
                                  <tr>
                                    <th colspan="3" style="width: 500px">
                                        <div class="col-md-3"><p class="text-center">Supplier :<br>ผู้ขาย</p></div>
                                        <div class="col-md-9">
                                            <p>xxxxxxx</p>
                                        </div>
                                    </th>
                                    <th colspan="3">
                                        <p class="text-center">Invoice<br>ใบกำกับภาษี</p>
                                  </tr>
                                  <tr>
                                    <td colspan="3" rowspan="4">
                                        <label for="comment"><p>&nbsp&nbsp&nbspAddress/ที่อยู่ :</p></label>
                                            <div style="margin-left: 20px">
                                                <p>207 ซอยแสงอุทัย ถนนสุขุมวิท 50 พระโขนง คลองเตย กรุงเทพมหานคร 10260<br>
                                                Tel. xx-xxxxxxx &nbsp&nbsp&nbsp Fax. xx-xxxxxxx  
                                                </p>   
                                            </div>
                                        <br>
                                        <form class="form-inline">  
                                          <div class="col-md-4" style="padding-left:  0">  
                                              <label for="comment"><p>&nbsp&nbsp&nbspชื่อผู้ติดต่อ/Contact Person:</p></label>
                                          </div>
                                          <div class="col-md-8"><p>Khun Pongpobh Phoemphipat &nbspMobile: 091-5450244 <br>
                                          E-mail : si2@e-part.co.th,paul@e-part.co.th</p></div>     
                                        </form>
                                    </td>
                                    <td colspan="3" style="padding: -3px; height: 30px">
                                        <div class="col-md-6">
                                          <p>Invoice No.</p>
                                        </div>
                                        <div class="col-md-6">
                                          <p>xxxxxxxx</p>    
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="padding: -2px">
                                        <div class="col-md-6">
                                          <p>Date</p>
                                        </div>
                                        <div class="col-md-6">
                                          <p>xxxxxxxx</p>                                            
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="padding: -3px; height: 30px">
                                        <div class="col-md-6">
                                          <p>Purchase Order</p>
                                        </div>
                                        <div class="col-md-6">
                                          <p>xxxxxxxx</p>    
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="padding: -2px">
                                        <div class="col-md-6">
                                          <p>Credit</p>
                                        </div>
                                        <div class="col-md-6">
                                          <p>xxxxxxxx</p>                                              
                                        </div></td>
                                  </tr>
                                  <tr>
                                      <th width="50px"><p class="text-center">Item</p></th>
                                      <th width="150px"><p class="text-center">Part No.<br>รหัสสินค้า</p></th>
                                      <th><p class="text-center">Description<br>รายการ</p></th> 
                                      <th><p class="text-center">Quantity<br>จำนวน</p></th> 
                                      <th><p class="text-center">Unit Price<br>ราคาต่อหน่วย</p></th> 
                                      <th><p class="text-center">Amount<br>จำนวนเงิน</p></th>
                                  </tr>
                                  <tr>  
                                      <td class="text-center">1</td>                  
                                      <td><p>xxxxxxxxxxxxxxx</p></td>
                                      <td><p>xxxxxxxxxxxxxxx</p></td>
                                      <td>x</td>
                                      <td><p>xxxxx</p></td>
                                      <td><p>xxxxx</p></td>
                                  </tr>                         
                                  <tr>
                                    <td colspan="2" rowspan="3">
                                      
                                    </td>
                                    <td colspan="1" rowspan="3" style="vertical-align: bottom">
                                      <p>หนึ่งหมื่อนเจ็ดร้อยบาทถ้วน</p>
                                    </td>
                                    <td colspan="2">  
                                      <prices>รวมมูลค่าสินค้า</p>
                                    </td>
                                    <td colspan="2">
                                      <p>10,000.00</p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <p>VAT 7%</p>
                                    </td>
                                    <td colspan="2">
                                      <p>700.00</p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <p>รวมจำนวนเงิน</p>
                                    </td>
                                    <td colspan="2">
                                      <p>10,700.00</p>
                                    </td>
                                  </tr>  
                                </table>
                            </div>        
                          </div>
                      </div>
                    </fieldset>    
                </form>    
            </div>
            <div class="modal-footer">            
                <a href="#"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> พิมพ์</button></a>
                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> edit</button> 
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
      
    </div>

</div>      
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">บริษัท แอร์พอร์ตเนิสซิ่ง โฮม จำกัด (สำนักงานใหญ่)</h4>
            </div>
            <div class="modal-body">
                <form>
                    <fieldset>
                        <p>ชื่อบริษัท : บริษัท แอร์พอร์ตเนิสซิ่ง โฮม จำกัด (สำนักงานใหญ่)</p>
                        <p>Company Name : -</p>
                        <p>ที่อยู่ : 29 หมู่ 6 ถนนพหลโยธิน แขวงสายไหม จังหวัดกรุงเทพมหานคร 10220</p>
                        <p>Address : -</p>
                        <p>เบอร์โทร : 02-5233359-71 ต่อ 2612-13</p>
                        <p>เบอร์แฟ็กซ์ : 02-5233374</p>
                        <p>Tax ID : 0105538131521</p>     
                    </fieldset>
                </form>    
            </div>
            <div class="modal-footer">             
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>      
    </div>
</div>     
@endsection
@section('pagination')
@include('pagination')
@endsection
