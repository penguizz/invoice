@extends('layouts.master-layout')

@section('title', 'Page Title')

@section('mainmenu')
@include('mainmenu')
@endsection

@section('content')

<div class="" style="margin: 0 auto">
  <form method="put" action="/po/{{$temp_po->po_id}}">
  {{csrf_field()}}
    <div class="container well" style="width: 80%">
      <div class="col-md-3">                         
          <img src="/images/n.png" style="width: 200px;margin-bottom: 20px">
      </div>
      <div class="col-md-9" style="margin-top: 17px">
        <div class="form-group">
          <h5><b>บริษัท โอดีโอ โซลูชั่น จำกัด (สำนักงานใหญ่)</b></h5>
          89/379&nbsp&nbsp หมู่ที่ 10&nbsp ถนนรัตนาธิเบศร์&nbsp ต.บางรักใหญ่ &nbspอ.บางบัวทอง &nbsp&nbspจ.นนทบุรี &nbsp11110</p>
          เลขประจำตัวผู้เสียภาษีอากร  0125556027373 &nbsp&nbsp โทร. 02-0130458 &nbsp&nbsp แฟ็กซ์ 02-0130458</p>
        </div>
      </div> 
      <div class="col-md-12 col-lg-12" id="product-detail">                  
          <table class="table table-bordered" style="width: 100%;">  
            <tr>
              <td style="width:70%">
                  <div class="col-md-3"><p class="text-center"><strong>Supplier :<br>ผู้ขาย</strong></p></div>
                  <div class="col-md-7" style="margin-top: 5px">
                     <select name="vendor_id" id="vendor_id" class="disabled-edit" style="width: 100%" >
                        <option value="">Please select</option>
                        @if(!empty($vendors))
                          @foreach($vendors as $vendor)
                            <option {{$temp_po->vendor_id==$vendor->vendor_id? 'selected':''}} value="{{$vendor->vendor_id}}">{{$vendor->company_name_th}}</option>
                          @endforeach
                        @endif
                     </select>
                  </div>
                  <div class="col-md-2 pull-left">
                      <button type="button" class="disabled-edit btn btn-primary btn-md edit-content" href="/vendor/create?vendortype=supplier">เพิ่มผู้ขายใหม่</p></button>
                  </div>
               </td>
               <td class="text-center text-middle"><strong>Purchase Order<br/>ใบสั่งซื้อ</strong></td>
            </tr>
            <tr>
              <td>
                  <strong>Address/ที่อยู่:</strong></p>
                  <div class="col-md-12">
                       <span id="company_address_th">{{$temp_po->company_address_th}}</span>
                       <br>
                       โทร.<span id="company_tel">{{$temp_po->company_tel}}</span> 
                       แฟ็กซ์ <span id="company_fax">{{$temp_po->company_fax}}</span>
                  </div>
                  <strong>Contact Person:</strong></p>
                  <div class="col-md-10">                  
                      <input type="hidden" name="po_contact_person" id="po_contact_person_input" value="{{$temp_po->po_contact_person}}">
                      <input type="hidden" name="po_contact_tel" id="po_contact_tel_input" value="po_contact_tel">
                      <input type="hidden" name="po_contact_email" id="po_contact_email_input" value="{{$temp_po->po_contact_email}}">  
                      <span id="po_contact_person">{{$temp_po->po_contact_person}}</span>
                      Mobile: <span id="po_contact_tel">{{$temp_po->po_contact_tel}}</span> 
                      <br>
                      E-mail: <span id="po_contact_email">{{$temp_po->po_contact_email}}</span>
                      </p>
                  </div>
                  <div class="col-md-2">
                      <a href="#" class="disabled-edit btn btn-primary" data-toggle="modal" data-target="#addnewcontact">เพิ่มผู้ติดต่อ</p></a>
                  </div>
              </td>
              <td class="text-center text-middle" style="padding:0px;">
                  <table  class="table" style="width: 100%;">
                     <tr>
                        <td>
                           <div class="col-md-4 col-lg-4">Purchase Order No.</div>
                           <div class="col-md-8 col-lg-8">
                              <input type="text" class="form-control" name="po_no" value="{{$temp_po->po_no}}" style="width: 100%">
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div class="col-md-4 col-lg-4">Date </div>
                           <div class="col-md-8 col-lg-8"><input type="date" class="form-control" name="po_date" id="po_date" value="{{$temp_po->po_date}}" style="width: 100%"></div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div class="col-md-4 col-lg-4">Revision No.</div>
                           <div class="col-md-8 1col-lg-8">
                              <input type="text" class="form-control" name="po_revision" value="{{$temp_po->po_revision}}" style="width: 100%">
                           </div>
                        </td>
                     </tr>
                     <!-- <tr>
                        <td>
                           <div class="col-md-4 col-lg-4">Revision Date</div>
                           <div class="col-md-8 1col-lg-8">
                              <input type="date" class="form-control" name="po_revision_update" style="width: 100%">
                           </div>
                        </td>
                     </tr> -->
                     <tr>
                        <td>
                           <div class="col-md-4 col-lg-4">Quotation No.</div>
                           <div class="col-md-8 col-lg-8">
                              <input type="text" class="form-control" name="quotation_no" style="width: 100%" 
                              value="{{$temp_po->quotation_no}}">
                           </div>
                        </td>
                     </tr>
                  </table>
               </td>  
            </tr>
          </table>
          <div class="pull-right">
            <button type="button" class="disabled-edit btn btn-primary btn-md" v-on:click="add_product()" href="javascript:;">เพิ่มรายการ</button>
         </div>
         <div style="clear:both;height:5px;"></div>
         <table class="table table-bordered" style="width: 100%;">
            <tr>
                <th style="width: 5%"><p class="text-center">Item</p></th>
                <th style="width: 15%"><p class="text-center">Part No.<br>รหัสสินค้า</p></th>
                <th><p class="text-center">Description<br>รายการ</p></th> 
                <th style="width: 5%"><p class="text-center">Quantity<br>จำนวน</p></th> 
                <th style="width: 12%"><p class="text-center">Unit Price<br>ราคาต่อหน่วย</p></th> 
                <th style="width: 10%"><p class="text-center">Amount<br>จำนวนเงิน</p></th>
                <th style="width: 50px"></th>
            </tr>
            <tr v-for="(item,index) in items">
                <td class="text-center">@{{index+1}}</td>                        
                <td><input type="text" class="form-control" v-model="item.po_detail_part_no" name="po_detail_part_no[]"></td>
                <td><input type="text" class="form-control" v-model="item.po_description" name="po_description[]"></td>
                <td><input type="text" class="form-control numberonly quantity" v-model="item.po_quantity" maxlength="3" name="po_quantity[]"></td>
                <td><input type="text" class="form-control numberonlydot price" v-model="item.po_unit_price" maxlength="9" name="po_unit_price[]"></td>
                <td><input type="text" class="form-control po_amount" v-model="item.po_amount" readonly="" name="po_amount[]"></td>
                <td><button type="button" class="disabled-edit btn btn-danger btn-sm" v-on:click="delete_product(index)" v-if="items.length>1" aria-label="Left Align"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                </button></td>
            </tr>
            <tr>
              <td colspan="3" rowspan="5">
                <u><b>Remark :</b></p></u>
                <textarea class="form-control disabled-edit" id="po_remark" name="po_remark" rows="3">{{$temp_po->po_remark}}</textarea>
                <br>
                <b>Payment/การชำระเงิน</b></p>
                  <div class="checkbox">
                    <label><input type="checkbox" name="payment_credit_1" value="Y" {{$temp_po->payment_credit_1=='Y'? 'checked':''}}>ชำระเงินโดย โอนเข้าบัญชีของบริษัทผู้ขาย 1-3 วันก่อนรับสินค้าหรือบริการ</p></label>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="payment_credit_2" value="Y" {{$temp_po->payment_credit_2=='Y'? 'checked':''}}>เครดิต 30 วัน ชำระหลังได้รับสินค้าเรียนร้อยแล้ว</p></label>
                  </div>
              </td>

              <td colspan="2">
                Sub Total
                <br>
                รวมมูลค่าสินค้า</p>
              </td>
              <td colspan="2">
                <input type="text" class="form-control" readonly="" id="po_sub_total" value="{{$temp_po->po_sub_total}}" name="po_sub_total" >
              </td>
            </tr>
            <tr>
              <td colspan="2">
               Discount
               <br>
               ส่วนลด</p>
              </td>
              <td colspan="2">
                <input type="text" class="form-control numberonlydot" id="po_discount" value="{{$temp_po->po_discount}}" name="po_discount">
              </td>
            </tr>
            <tr>
              <td colspan="2">
                เงินหลังหักส่วนลด</p>
              </td>
              <td colspan="2">
                <input type="text" class="form-control" readonly="" id="po_price_after_discount"  value="{{$temp_po->po_price_after_discount}}" name="po_price_after_discount">
              </td>
            </tr>
            <tr>
              <td colspan="2">                          
                <!-- <input  type="text" class="form-control" readonly="" name="po_vat_percen">                 -->
                VAT 7%</p>
              </td>
              <td colspan="2">
                <input type="text" class="form-control" readonly="" id="po_vat_money"  value="{{$temp_po->po_vat_money}}" name="po_vat_money">
              </td>
            </tr>
            <tr>
              <td colspan="2">
                รวมจำนวนเงิน</p>
              </td>
              <td colspan="2">
                <input type="text" class="form-control" readonly="" id="po_total" value="{{$temp_po->po_total}}" name="po_total">
              </td>
            </tr> 
         </table>

      </div>
      <div class="col-md-6">
          <a href="/po"><button type="button" class="btn btn-default pull-left">Back</button></a>
      </div>
      <div class="col-md-6 ">
          <button type="submit" class="disabled-edit btn btn-primary pull-right" style="margin-left: 5px">Submit</button>
          <button type="button" id='edit-content' class="btn btn-success pull-right"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button>
      </div>     
    
      </div>        
  </form>

</div>

<!-- Modal -->
<div class="modal fade" id="addnewcontact" role="dialog">
    <div class="modal-dialog" style="width: 60%">
    
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">เพิ่มผู้ติดต่อ</h2>
            </div>
              <div class="modal-body addmodalcustomer">
                  <form>
                      <fieldset>
                          <form class="form-horizontal">                          
                            <div class="form-group">
                                  <label class="control-label col-sm-2" for="contact">Contact Person:</label>
                              <div class="col-sm-10">                                
                                <input type="text" class="form-control" id="po_contact_person_form" name="po_contact_person" placeholder="ชื่อผู้ติดต่อ"> 
                                <br>                                                           
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Moblie:</label>
                              <div class="col-sm-10">                                
                                <input type="text" class="form-control" id="po_contact_tel_form" name="po_contact_tel" placeholder="เบอร์โทรผู้ติดต่อ">   
                                <br>
                              </div>
                              <br>
                            </div>
                            <div class="form-group">
                                  <label class="control-label col-sm-2" for="email">Email address:</label>        
                              <div class="col-sm-10">                                
                                <input type="email" class="form-control" id="po_contact_email_form" name="po_contact_email" placeholder="อีเมลล์ผู้ติดต่อ">        
                             </div>
                             <br>
                            </div>                          
                          </form>             
                      </fieldset>
                  </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="add-contact-form" class="btn btn-primary" data-dismiss="modal">Add</button> 
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  var vendors={!! json_encode($vendors)!!};
  function cal()
   {
      var sum=0,after_discount=0;
      $('.quantity').each(function(){
         var price = $(this).parent().parent().find('.price').val();
         if($(this).val()!='' && price!='')
         {
            var amount = parseInt($(this).val()) * parseFloat(price);
            sum +=  amount;
            $(this).parent().parent().find('.po_amount').val(amount);
         }
      });
      after_discount = sum;
      var discount = $('#po_discount').val();
      if(discount!=''){
         after_discount = sum-parseFloat(discount);
      }
      $('#po_sub_total').val(sum);
      $('#po_price_after_discount').val(after_discount);             
      $('#po_vat_money').val((sum *7)/100);             
      $('#po_total').val(after_discount+((sum *7)/100));  
   }
  $(function(){
    $('#vendor_id').on('change',function(){
        var vendor_id = $(this).val();
        if(vendor_id!="" && typeof vendors[vendor_id]!='undefined'){
          $('#company_address_th').text(vendors[vendor_id].company_address_th);
          $('#company_fax').text(vendors[vendor_id].company_fax);
          $('#taxid').text(vendors[vendor_id].taxid);
          $('#company_tel').text(vendors[vendor_id].company_tel);               
        }
     });
     $('#add-contact-form').on('click',function(){          
        $('#po_contact_person').text($('#po_contact_person_form').val());
        $('#po_contact_tel').text($('#po_contact_tel_form').val());
        $('#po_contact_email').text($('#po_contact_email_form').val());

        $('#po_contact_person_input').val($('#po_contact_person_form').val());
        $('#po_contact_tel_input').val($('#po_contact_tel_form').val());
        $('#po_contact_email_input').val($('#po_contact_email_form').val());            
     });
      $(document).on('input','.price',function(){
        cal();            
     })
     $(document).on('input','.quantity',function(){
        cal();
     });

     $(document).on('input','#po_discount',function(){
        cal();
     });
     $('input').attr('disabled',true);
     $('.disabled-edit').addClass('disabled');
     $('.disabled-edit').attr('disabled','disabled');
     $('#edit-content').on('click',function(){
        $('input').attr('disabled',false);
        $('.disabled-edit').removeClass('disabled');
        $('.disabled-edit').removeAttr('disabled');
     });
  });
         
   var app = new Vue({
      el:'#product-detail',
      data: {
          @if(!isset($temp_detail) || empty($temp_detail))
          items:[{
                  po_detail_part_no: '',
                  po_description: '',
                  po_quantity: '',
                  po_unit_price: '',
                  po_amount: '',
              }]
          @else
          items:{!! $temp_detail!!}
          @endif
      },
      methods:{
          add_product:function(){
              this.items.push({
                  po_detail_part_no: '',
                  po_description: '',
                  po_quantity: '',
                  po_unit_price: '',
                  po_amount: '',
              });
          },
          delete_product:function(index){
              Vue.delete(this.items, index);
              setTimeout(function(){
              cal();                    
            },10)
          }
      } 
   });
   function add_to_select(result) {
          vendors[result.vendor_id]=result.vendor;
          $('#vendor_id').append('<option value="'+result.vendor_id+'">'+result.vendor.company_name_th+'</option>');
          $('#vendor_id').val(result.vendor_id).trigger( "change" );
          $('#modal-edit-content').find('.modal').modal('hide');
     }
</script>

@endsection