@extends('layouts.master-layout')

@section('title', 'Page Title')

@section('mainmenu')
@include('mainmenu')
@endsection

@section('content')

<div class="createpo">
  <form>
    <div class="container well" style="width: 80%">    
        <div class="form-group">
            <b><p style="font-size: 23px" class="text-center">บริษัทโอดีโอ โซลูชั่น จำกัด<br><u>รายงานภาษีการซื้อ</u><br>ประจำเดือน พฤษภาคม 2560</p></b>
            <br>
            <p>ที่อยู่ : เลขที่ 89/379   หมู่ที่ 10  ถนนรัตนาธิเบศร์  ต.บางรักใหญ่  อ.บางบัวทอง   จ.นนทบุรี  11110</p>
            <b><p>เลขที่ประจำตัวผู้เสียภาษีอากร : 0125556027373</p></b>     
        </div>
        <div class="col-md-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 50px" class="text-center">ลำดับ</th>
                <th style="" class="text-center">วันที่</th>
                <th style="" class="text-center">เลขที่ใบกำกับภาษี</th>
                <th style="" class="text-center">ชื่อ</th>
                <th style="width: 150px" class="text-center">มูลค่าสินค้า</th>
                <th style="width: 150px" class="text-center">ภาษีมูลค่าเพิ่ม</th>
                <th style="width: 150px" class="text-center">รวมเป็นเงิน</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>        
    </div>
  </form>
</div>
@endsection