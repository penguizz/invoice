@extends('layouts.master-layout')

@section('title', 'Page Title')

@section('mainmenu')
@include('mainmenu')
@endsection

@section('content')

<div class="createpo" style="margin: 0 auto">
    <div class="container well" style="width: 80%">
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
              <th colspan="3" style="width: 1800px">
                  <div class="col-md-3"><p class="text-center">Supplier :<br>ผู้ขาย</p></div>
                  <div class="col-md-7">
                      <div class="" style="margin-top: 5px">
                        <select class="js-example-basic-multiple" style="width: 100%;height: 100px;">
                            <option><p>กรุณาเลือก</p></option>
                            <option value="bL"><p>Alabama</p></option>
                            <option value="bL"><p>Alabama</p></option>
                            <option value="bL"><p>Alabama</p></option>
                            <option value="bL"><p>Alabama</p></option>
                            <option value="bL"><p>Alabama</p></option>
                            <option value="bL"><p>Alabama</p></option>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-2 purmlukka">
                      <a href="#" data-toggle="modal" data-target="#addnewsupplier" style="color:#333"><button type="button" class="btn btn-primary"><p>เพิ่มผู้ขายใหม่</p></button></a>
                  </div>
              </th>
              <th colspan="4">
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
                    <div class="col-md-6"><p>Khun Pongpobh Phoemphipat &nbspMobile: 091-5450244 <br>
                    E-mail : si2@e-part.co.th,paul@e-part.co.th</p></div> 
                    <div class="col-md-2 purmlukka">
                        <a href="#" data-toggle="modal" data-target="#addnewcontact" style="color:#333"><button type="button" class="btn btn-primary"><p>เพิ่มผู้ติดต่อ</p></button></a>
                  </div>     
                  </form>
              </td>
              <td colspan="4" style="padding: -3px; height: 30px">
                  <div class="col-md-5">
                    <p>Invoice No.</p>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" style="height: 30px">
                  </div>
              </td>
            </tr>
            <tr>
              <td colspan="4" style="padding: -2px">
                  <div class="col-md-5">
                    <p>Date</p>
                  </div>
                  <div class="col-md-7">
                    <input type="date" class="form-control" name="Date" style="height: 30px">
                  </div>
              </td>
            </tr>
            <tr>
              <td colspan="4" style="padding: -3px; height: 30px">
                  <div class="col-md-5">
                    <p>Purchase Order</p>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" style="height: 30px">
                  </div>
              </td>
            </tr>
            <tr>
              <td colspan="4" style="padding: -2px">
                  <div class="col-md-5">
                    <p>Credit</p>
                  </div>
                  <div class="col-md-7">
                    <select class="form-control" style="height: 40px">
                        <option value="0">กรุณาเลือก</option>
                        <option value="customer">เครดิต 30 วัน</option>
                        <option value="supplier">โอนเข้าบัญชี</option>
                    </select>
                  </div></td>
            </tr>
            <tr>
              <td colspan="7">
                <a href="#"><button type="button" class="btn btn-primary pull-right" aria-label="Left Align"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มรายการ
                </button></a>      
              </td>
            </tr>
            <tr>
                <th width="50px"><p class="text-center">Item</p></th>
                <th width="150px"><p class="text-center">Part No.<br>รหัสสินค้า</p></th>
                <th><p class="text-center">Description<br>รายการ</p></th> 
                <th><p class="text-center">Quantity<br>จำนวน</p></th> 
                <th><p class="text-center">Unit Price<br>ราคาต่อหน่วย</p></th> 
                <th><p class="text-center">Amount<br>จำนวนเงิน</p></th>
                <th width="50px"></th>
            </tr>
            <tr>  
                <td class="text-center">1</td>                  
                <td><input type="text" class="form-control" style="height: 30px"></td>
                <td><input type="text" class="form-control" style="height: 30px"></td>
                <td><input type="text" class="form-control" style="height: 30px"></td>
                <td><input type="text" class="form-control" style="height: 30px"></td>
                <td><input type="text" class="form-control" style="height: 30px"></td>
                <td><a href="#"><button type="button" class="btn btn-danger btn-sm  " aria-label="Left Align"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                </button></a></td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td><input type="text" class="form-control" style="height: 30px"></td>
                <td><input type="text" class="form-control" style="height: 30px"></td>
                <td><input type="text" class="form-control" style="height: 30px"></td>
                <td><input type="text" class="form-control" style="height: 30px"></td>
                <td><input type="text" class="form-control" style="height: 30px"></td>
                <td><a href="#"><button type="button" class="btn btn-danger btn-sm  " aria-label="Left Align"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                </button></a></td>
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
        <div class="col-md-6">
          <a href="/invoice"><button type="submit" class="btn btn-default pull-left">Back</button></a>
      </div>
      <div class="col-md-6 ">
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
      </div>
      </div>        
    </div>
</div>


@endsection