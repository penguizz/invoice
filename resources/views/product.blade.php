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
            <label for="usr">Product Name</label>
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
            <label for="usr">Customer Name</label>
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
                <!-- <input type='text' class="form-control" /> -->
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
    <a href="/product/create"><button type="button" class="btn btn-primary" style="width: 310px"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มรายการ</button></a>
</div>
@endsection

@section('content-right')    
<div class="panel panel-default">    
  <div class="panel-heading">Product</div>
    <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>            
            <th style="width: 150px"><center>Product Name</center></th>
            <th><center>Date</center></th>
            <th><center>Customer</center></th>
            <th><center>Total</center></th>
            <th style= "width: 210px"></th>
          </tr>
        </thead>
        <tbody>
                  <tr>
                      <td><a href="#" data-toggle="modal" data-target="#myModal1" style="color:#333">xxxxxx</a></td>
                      <td>xxxx</td>
                      <td><a href="#" data-toggle="modal" data-target="#myModal2" style="color:#333">xxxxxx</a></td>
                      <td>105,823.00</td>
                      <td>
                          <div class="picicon">
                            <button type="button" class="btn"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> edit</button> 
                            <button type="button" class="btn"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> view</button>
                            <button type="button" class="btn"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>              
                          </div>
                      </td>
                  </tr>
                  <tr>
                      <td>INV-2017-04-006</td>
                      <td>25/04/2560</td>
                      <td>บริษัท เอสไอเอส ดิสทริบิวชั่น (ประเทศไทย) จำกัด (มหาชน)</td>
                      <td>21,400.00</td>
                      <td>
                        <div class="picicon">
                            <button type="button" class="btn"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> edit</button> 
                            <button type="button" class="btn"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> view</button>
                            <button type="button" class="btn"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>              
                          </div>
                      </td>
                  </tr>                  
        </tbody>
      </table>           
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">PO2017-04-002</h4>
            </div>
            <div class="modal-body">
                <form>
                    <fieldset>
                        <p>PO No : PO2017-04-002</p>
                        <p>Date : 18/04/2560</p>                        
                        <p>Revision No : -</p>
                        <p>Quotation No : 18042017</p>
                        <p>Supplier : บริษัท เอสไอเอส ดิสทริบิวชั่น (ประเทศไทย) จำกัด (มหาชน)</p>
                        <p>ที่อยู่ : เลขที่ 9 อาคารภคินท์ ชั้นที่ 9 ห้องเลขที่ 901 ถนนรัชดาภิเษก แขวงดินแดง เขตดินแดง กรุงเทพมหานคร 10400</p>
                        <p>Address : -</p>
                        <p>เบอร์โทร : 0-2020-3000</p>
                        <p>เบอร์แฟ็กซ์ : 0-2020-3780</p>
                        <p>ชื่อผู้ติดต่อ : คุณณัฐพัชร์ นิมมานวโรดม</p>
                        <p>เบอร์โทรของผู้ติดต่อ : 02-0203484, 095-3722863</p>
                        <p>Email : Nutthaphat@sisthai.com</p>    
                        <p>
                          <div class="container" style="width: auto;">          
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th><center>Part No</center></th>
                                  <th><center>Desciption</center></th>
                                  <th><center>Quatity</center></th>
                                  <th><center>Unit Price</center></th>
                                  <th><center>Amount</center></th>
                                  <th><center>VAT 7%</center></th>
                                  <th><center>Total</center></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>V-ESSSTD-VS-P0000-00</td>
                                  <td>Vessam Backup Essential Standard 2 socket </td>
                                  <td>1</td>
                                  <td>33,300.00</td>
                                  <td>33,300.00</td>
                                  <td>2,450.00</td>
                                  <td>35,000.00</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </p>      
                        <p>รวมมูลค่าสินค้า : 35,000.00</p>     
                        <p>ส่วนลด :-</p>     
                        <p>เงินหลังหักส่วนลด : 35,000.00</p>
                        <p>VAT 7% : 2,450.00</p>     
                        <p><b>รวมจำนวนเงิน  : 35,000.00</b></p>     
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
                <h4 class="modal-title">บริษัท เอสไอเอส ดิสทริบิวชั่น (ประเทศไทย) จำกัด (มหาชน)</h4>
            </div>
            <div class="modal-body">
                <form>
                    <fieldset>
                        <p>ชื่อบริษัท : บริษัท เอสไอเอส ดิสทริบิวชั่น (ประเทศไทย) จำกัด (มหาชน)</p>
                        <p>Company Name : -</p>
                        <p>ที่อยู่ : เลขที่ 9 อาคารภคินท์ ชั้นที่ 9 ห้องเลขที่ 901 ถนนรัชดาภิเษก แขวงดินแดง เขตดินแดง กรุงเทพมหานคร 10400</p>
                        <p>Address : -</p>
                        <p>เบอร์โทร : 0-2020-3000</p>
                        <p>เบอร์แฟ็กซ์ : 0-2020-3780</p>
                        <p>ชื่อผู้ติดต่อ : คุณณัฐพัชร์ นิมมานวโรดม</p>
                        <p>เบอร์โทรของผู้ติดต่อ : 02-0203484, 095-3722863</p>
                        <p>Email : Nutthaphat@sisthai.com</p>     
                    </fieldset>
                </form>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> edit</button> 
                <button type="button" class="btn btn-danger">Close</button>
            </div>
        </div>      
    </div>
</div>    
@endsection
@section('pagination')
@include('pagination')
@endsection
