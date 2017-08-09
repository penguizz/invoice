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
        <form action="/quotation" id="fromquotation" method="get" class="no-ajax">
          <div class="form-group">
            <label for="usr">Quotation No</label>
                <div class="" style="margin-top: 5px">
                    <input type="search" class="form-control" name="quo_no" value="{{Request::get('quo_no')}}" style="width: 100%">
                </div>
          </div>
          <div class="form-group">
            <label for="usr">Customer Name</label>
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
            <label for="pwd">Start Date</label>
              <div class="date">
                 <input type="date" class="form-control" name="start_date" id="start_date" style="width: 100%;" value="{{Request::get('start_date')}}">
               </div>
          </div>
          <div class="form-group">
            <label for="pwd">End Date</label>
              <div class="date">
                 <input type="date" class="form-control" name="end_date" id="end_date" style="width: 100%;" value="{{Request::get('end_date')}}">
               </div>
          </div>
         
            <div class="pull-right">
               <button type="submit" class="btn">Search</button>
               <button type="button" id="clear_btn" class="btn btn-danger">Clear</button>
            </div>
        </form>
    </div>        
</div>
<div class="" style="margin-bottom: 15px">
    <a class="btn btn-primary" href="/quotation/create" style="width: 310px"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มรายการ</a>
</div>
@endsection  

@section('content-right')    
<div class="panel panel-default">
  <div class="panel-heading">Quotation</div> 
  <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>            
            <th style="width: 100px" style="width: 150px" class="text-center">Quotation No</th>
            <th style="width: 80px" class="text-center">Date</th>
            <th style="width: 250px" class="text-center">Customer</th>
            <th style="width: 100px" class="text-center">Total</th>
            <th style="width: 50px"></th>
          </tr>
        </thead>
        @if(!empty($items))
          <tbody>
            @foreach($items as $item)
            <tr>
                <td><a href="/quotation/{{$item->quotation_id}}" class="link_k">{{$item->quotation_no}}</a></td>
                <td>{{$item->quotation_date}}</td>
                <td><a href="#" class="link_k" data-toggle="modal" data-target="#myModal2">{{$item->company_name_th}}</a></td>
                <td>{{$item->quotation_total}}</td>
                <td>
                    <div class="picicon">
                      <button type="button" class="btn delete-content" href="/po/{{$item->quotation_id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>              
                    </div>
                </td>
            </tr>
            @endforeach
          </tbody>
        @endif
      </table>           
  </div>
</div>

<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
    
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">บริษัท เอสไอเอสsd ดิสทริบิวชั่น (ประเทศไทย) จำกัด (มหาชน)</h4>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
            </div>
        </div>
      
    </div>

</div>   
<div class="footer">
  <div class="col-md-7 col-lg-7 col-md-offset-5">
    <ul class="pagination">
      {{ $items->links() }}
    </ul>
  </div>
</div>
<script type="text/javascript">
    $(function(){
      $('#clear_btn').on('click',function(){
        $('#fromquotation input').val('');
        $('#fromquotation select').val('').trigger( "change" );
      });
      
    })
</script>
@endsection

