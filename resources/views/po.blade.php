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
        <form action="/po" id="frompo" method="get" class="no-ajax">
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
  @if(!empty($items) && $items->count()>0)
      <table class="table table-bordered">
        <thead>
          <tr>
            
            <th style="width: 100px" class="text-center">Purchase Order No</th>
            <th style="width: 80px" class="text-center">Date</th>
            <th style="width: 250px" class="text-center">Supplier</th>
            <th style="width: 100px" class="text-center">Total</th>
            <th style="width: 50px"></th>

          </tr>
        </thead>
        
          <tbody>
            @foreach($items as $item)
            <tr>
                <td><a href="/po/{{$item->po_id}}" class="link_k">{{$item->po_no}}</a></td>
                <td>{{$item->po_date}}</td>
                <td><a href="#" class="link_k" data-toggle="modal" data-target="#myModal2">{{$item->company_name_th}}</a></td>
                <td>{{$item->po_total}}</td>
                <td>
                    <div class="picicon">
                      <button type="button" class="btn delete-content" href="/po/{{$item->po_id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>              
                    </div>
                </td>
            </tr>
            @endforeach
          </tbody>
        
      </table>  
      @else
        <p style="width:100%;padding:25px;text-align: center;font-size:20px;">dfsdfsdfsd</p>
      @endif         
  </div>
</div>
  
<div class="modal fade" id="myModal2" role="dialog">
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
        $('#frompo input').val('');
        $('#frompo select').val('').trigger( "change" );
      });
      
    })
</script>


@endsection
