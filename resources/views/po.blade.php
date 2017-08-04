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
        <form action="http://www.penguizz.local/po" id="frompo" method="get" class="no-ajax">
          <div class="form-group">
            <label for="usr">Purchase Order No</label>
                <div class="" style="margin-top: 5px">
                  <input type="search" class="form-control" name="pno" value="{{Request::get('pno')}}" style="width: 100%">
                </div>
          </div>
          <div class="form-group">
            <label for="usr">Supplier Name</label>
                <div class="" style="margin-top: 5px">
                  <select style="width: 100%;height: 40%;" id="vendor_id" name="vendor_id" >
                      <option value="">Please select</option>
                        @if(!empty($vendors))
                          @foreach($vendors as $vendor)
                            <option {{Request::get('vendor_id')==$vendor->vendor_id?' selected':''}} value="{{$vendor->vendor_id}}">{{$vendor->company_name_th}}</option>
                          @endforeach
                        @endif
                  </select>
                </div>
          </div>
          <div class="form-group">
            <label for="pwd">Date</label>
              <div class="date">
                 <input type="date" class="form-control" name="po_date" id="po_date" style="width: 100%;" value="{{Request::get('po_date')}}">
               </div>
          </div>
          <div class="form-group">
            <div class="pull-right">
               <button type="submit" class="btn">Search</button>
               <button type="button" id="clear_btn" class="btn btn-danger">Clear</button>
            </div>
          </div>
        </form>
    </div>        
</div>
<div class="" style="margin-bottom: 15px">
    <a type="button" class="btn btn-primary" href="/po/create" style="width: 310px"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มรายการ</a>
</div>
@endsection


@section('content-right')
<div class="panel panel-default">
  <div class="panel-heading">Purchase Order</div>  
  <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            
            <th style="width: 150px" class="text-center">Purchase Order No</th>
            <th class="text-center">Date</th>
            <th class="text-center">Supplier</th>
            <th class="text-center">Total</th>
            <th style="width: 50px"></th>

          </tr>
        </thead>
        @if(!empty($items))
          <tbody>
            @foreach($items as $item)
            <tr>
                <td><a href="/po/{{$item->po_id}}" class="link_k">{{$item->po_no}}</a></td>
                <td>{{$item->po_date}}</td>
                <td><a href="#" class="link_k" data-toggle="modal" data-target="#myModal2">{{$item->company_name_th}}</a></td>
                <td>{{$item->po_total}}</td>
                <td>
                    <div class="picicon">
                      <button type="button" class="btn" v-on:click="delete_product(index)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>              
                    </div>
                </td>
            </tr>
            @endforeach
          </tbody>
        @endif
      </table>           
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addpo" role="dialog">
    <div class="modal-dialog" style="width: 75%">
    
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Purchase Order : ใบสั่งซื้อ</h4>
            </div>
            <div class="modal-body">
                <form>
                    <fieldset>
                        
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
                <button type="button" class="btn btn-danger">Close</button>
            </div>
        </div>
      
    </div>

</div>  

<div class="modal fade" id="viewpo" role="dialog">
    <div class="modal-dialog" style="width: 80%">
    
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <fieldset>
                    <div class="createpo" style="maskargin: 0 auto">
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
                                <th colspan="3" style="width: 1500px">
                                    <div class="col-md-3"><p class="text-center">Supplier :<br>ผู้ขาย</p></div>
                                    <div class="col-md-9">
                                        <p>xxxxxxxxxxxxxxxxxxx</p>
                                    </div>
                                    
                                </th>
                                <th colspan="4">
                                    <p class="text-center">Purchase Order<br>ใบสั่งซื้อ</p>
                                </th>
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
                                      <p>Purchase Order No.</p>
                                    </div>
                                    <div class="col-md-6">
                                      <p>xxxxxxxxx</p>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3" style="padding: -2px">
                                    <div class="col-md-6">
                                      <p>Date</p>
                                    </div>
                                    <div class="col-md-6">
                                      <p>xxxxxxxxx</p>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3" style="padding: -2px">
                                    <div class="col-md-6">
                                      <p>Revision No.<br>ปรับปรุงครั้งที่</p>
                                    </div>
                                    <div class="col-md-6" >
                                      <p>ver.x</p>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3" style="padding: -2px">
                                    <div class="col-md-6">
                                      <p>Quotaion No.<br>เลขที่ใบเสนอราคา</p>
                                    </div>
                                    <div class="col-md-6">
                                      <p>xxxxxxxxxxxx</p>
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
                                  <td>SiS Part No.</td>
                                  <td>x</td>
                                  <td>x</td>
                                  <td>xxxx.00</td>
                                  <td>xxxx.00</td>
                              </tr>
                              <tr>
                                  <td class="text-center">2</td>                  
                                  <td>SiS Part No.</td>
                                  <td></td>
                                  <td>x</td>
                                  <td>x</td>
                                  <td>xxxx.00</td>
                              </tr>
                              <tr>
                                <td colspan="3" rowspan="5">
                                  <u><p><b>Remark :</b></p></u>
                                  <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                                  <p><b>Payment/การชำระเงิน</b></p>
                                    <div class="checkbox">
                                      <label><input type="checkbox" value=""><p>ชำระเงินโดย โอนเข้าบัญชีของบริษัทผู้ขาย 1-3 วันก่อนรับสินค้าหรือบริการ</p></label>
                                    </div>
                                    <div class="checkbox">
                                      <label><input type="checkbox" value=""><p>เครดิต 30 วัน ชำระหลังได้รับสินค้าเรียนร้อยแล้ว</p></label>
                                    </div>
                                </td>

                                <td colspan="2">
                                  <p>รวมมูลค่าสินค้า</p>
                                </td>
                                <td colspan="2">
                                  <p>10,000.00</p>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2">
                                  <p>ส่วนลด</p>
                                </td>
                                <td colspan="2">-</td>
                              </tr>
                              <tr>
                                <td colspan="2">
                                  <p>เงินหลังหักส่วนลด</p>
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
                <a href="#"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> พิมพ์</bu tton></a>
                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> edit</button> 
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
      
    </div>
<script type="text/javascript">
    $(function(){
      $('#clear_btn').on('click',function(){
        $('#frompo input').val('');
        $('#frompo select').val('').trigger( "change" );
      });
      
    })
</script>
</div>  

@endsection
@section('pagination')
@include('pagination')
@endsection