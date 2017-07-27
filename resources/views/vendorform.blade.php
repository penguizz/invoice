<!-- Modal -->
<div class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 60%">
    
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Add Vendor</h2>
            </div>
            <form method="post" action="/vendor" class="form-horizontal">
            <input type="hidden" name="vendortype" value="{{$vendortype}}">
            {{ csrf_field() }}
              <div class="modal-body addmodalcustomer">                    
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="customername" >ชื่อบริษัท :</label>
                          <div class="col-sm-10">
                              <input type="name" class="form-control" id="company_name_th" name="company_name_th">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="customername" >Company Name :</label>
                          <div class="col-sm-10">
                              <input type="name" class="form-control" id="company_name_en" name="company_name_en">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="address">ที่อยู่ :</label>   <div class="col-sm-10"> 
                              <textarea class="form-control" id="company_address_th" name="company_address_th" rows="3" placeholder="(ห้องเลขที่,บ้านเลขที่,ตึก,ชื่อถนน)"></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="address">Address :</label>
                          <div class="col-sm-10"> 
                              <textarea class="form-control" id="company_address_en" name="company_address_en" rows="3" placeholder="(ห้องเลขที่,บ้านเลขที่,ตึก,ชื่อถนน)"></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="address">จังหวัด :</label>
                          <div class="col-sm-10"> 
                              <select class="form-control" name="country">
                                    <option value="">กรุณาเลือก</option>
                                    <option value="กระบี่">กระบี่</option>
                                    <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                    <option value="กาญจนบุรี">กาญจนบุรี</option>
                                    <option value="กาฬสินธุ์">กาฬสินธุ์</option>
                                    <option value="กำแพงเพชร">กำแพงเพชร</option>
                                    <option value="ขอนแก่น">ขอนแก่น</option>
                                    <option value="จันทบุรี">จันทบุรี</option>
                                    <option value="ฉะเชิงเทรา">ฉะเชิงเทรา</option>
                                    <option value="ชลบุรี">ชลบุรี</option>
                                    <option value="ชัยนาท">ชัยนาท</option>
                                    <option value="ชัยภูมิ">ชัยภูมิ</option>
                                    <option value="ชุมพร">ชุมพร</option>
                                    <option value="ตรัง">ตรัง</option>
                                    <option value="ตราด">ตราด</option>
                                    <option value="ตาก">ตาก</option>
                                    <option value="นครนายก">นครนายก</option>
                                    <option value="นครปฐม">นครปฐม</option>
                                    <option value="นครพนม">นครพนม</option>
                                    <option value="นครราชสีมา">นครราชสีมา</option>
                                    <option value="นครศรีธรรมราช">นครศรีธรรมราช</option>
                                    <option value="นครสวรรค์">นครสวรรค์</option>
                                    <option value="นนทบุรี">นนทบุรี</option>
                                    <option value="นราธิวาส">นราธิวาส</option>
                                    <option value="น่าน">น่าน</option>
                                    <option value="บึงกาฬ">บึงกาฬ</option>
                                    <option value="บุรีรัมย์">บุรีรัมย์</option>
                                    <option value="ปทุมธานี">ปทุมธานี</option>
                                    <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์</option>
                                    <option value="ปราจีนบุรี">ปราจีนบุรี</option>
                                    <option value="ปัตตานี">ปัตตานี</option>
                                    <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา</option>
                                    <option value="พะเยา">พะเยา</option>
                                    <option value="พังงา">พังงา</option>
                                    <option value="พัทลุง">พัทลุง</option>
                                    <option value="พิจิตร">พิจิตร</option>
                                    <option value="พิษณุโลก">พิษณุโลก</option>
                                    <option value="ภูเก็ต">ภูเก็ต</option>
                                    <option value="มหาสารคาม">มหาสารคาม</option>
                                    <option value="มุกดาหาร">มุกดาหาร</option>
                                    <option value="ยะลา">ยะลา</option>
                                    <option value="ยโสธร">ยโสธร</option>
                                    <option value="ระนอง">ระนอง</option>
                                    <option value="ระยอง">ระยอง</option>
                                    <option value="ราชบุรี">ราชบุรี</option>
                                    <option value="ร้อยเอ็ด">ร้อยเอ็ด</option>
                                    <option value="ลพบุรี">ลพบุรี</option>
                                    <option value="ลำปาง">ลำปาง</option>
                                    <option value="ลำพูน">ลำพูน</option>
                                    <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                    <option value="สกลนคร">สกลนคร</option>
                                    <option value="สงขลา">สงขลา</option>
                                    <option value="สตูล">สตูล</option>
                                    <option value="สมุทรปราการ">สมุทรปราการ</option>
                                    <option value="สมุทรสงคราม">สมุทรสงคราม</option>
                                    <option value="สมุทรสาคร">สมุทรสาคร</option>
                                    <option value="สระบุรี">สระบุรี</option>
                                    <option value="สระแก้ว">สระแก้ว</option>
                                    <option value="สิงห์บุรี">สิงห์บุรี</option>
                                    <option value="สุพรรณบุรี">สุพรรณบุรี</option>
                                    <option value="สุราษฎร์ธานี">สุราษฎร์ธานี</option>
                                    <option value="สุรินทร์">สุรินทร์</option>
                                    <option value="สุโขทัย">สุโขทัย</option>
                                    <option value="หนองคาย">หนองคาย</option>
                                    <option value="หนองบัวลำภู">หนองบัวลำภู</option>
                                    <option value="อำนาจเจริญ">อำนาจเจริญ</option>
                                    <option value="อุดรธานี">อุดรธานี</option>
                                    <option value="อุตรดิตถ์">อุตรดิตถ์</option>
                                    <option value="อุทัยธานี">อุทัยธานี</option>
                                    <option value="อุบลราชธานี">อุบลราชธานี</option>
                                    <option value="อ่างทอง">อ่างทอง</option>
                                    <option value="เชียงราย">เชียงราย</option>
                                    <option value="เชียงใหม่">เชียงใหม่</option>
                                    <option value="เพชรบุรี">เพชรบุรี</option>
                                    <option value="เพชรบูรณ์">เพชรบูรณ์</option>
                                    <option value="เลย">เลย</option>
                                    <option value="แพร่">แพร่</option>
                                    <option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
                              </select>                                                      
                          </div>                             
                      </div> 
                      <div class="form-group">                            
                          <label class="control-label col-sm-2" for="address">รหัสไปรษณีย์ :</label>
                          <div class="col-sm-10">
                              <input type="name" class="form-control" id="post" name="post">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="telephone">TaxID :</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="taxid" name="taxid">  
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="telephone">เบอร์โทร :</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="company_tel" name="company_tel">  
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="fax">เบอร์แฟ็กซ์ :</label>   
                          <div class="col-sm-10">                                
                              <input type="text" class="form-control" id="company_fax" name="company_fax">   
                          </div>
                      </div>
                      @if($vendortype=='supplier')
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="fax">เครดิตที่ได้รับ :</label>
                          <div class="col-sm-10">
                              <select class="form-control" name="credit">
                                    <option value="">กรุณาเลือก</option>
                                    <option value="0">ชำระด้วยเงินสด</option>
                                    <option value="30">เครดิต 30 วัน</option>
                                    <option value="60">เครดิต 60 วัน</option>
                              </select>                                
                          </div>
                      </div>
                      @endif
                      @if($vendortype=='customer')                      
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="fax">กำหนดการวางบิล :</label>  
                          <div class="col-sm-10">                                
                              <input type="text" class="form-control" id="due_billing" name="due_billing">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="fax">เงื่อนไขการจ่ายเงิน :</label>
                          <div class="col-sm-10">                                
                              <select class="form-control" name="payment_term">
                                    <option value="">กรุณาเลือก</option>
                                    <option value="รับเช็ค">รับเช็ค</option>
                                    <option value="การโอนเงิน">การโอนเงิน</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="fax">เอกสารประกอบการวางบิล :</label>   
                          <div class="col-sm-10">                                
                              <input type="text" class="form-control" id="customer_billing_document" name="customer_billing_document">
                          </div>
                      </div>     
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="fax">เอกสารประกอบการวับเช็ค :</label>   
                          <div class="col-sm-10">                                
                              <input type="text" class="form-control" id="customer_cheuqe_document" name="customer_cheuqe_document">
                          </div>
                      </div>
                      @endif
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Save</button> 
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </form>
        </div>
    </div>
</div>