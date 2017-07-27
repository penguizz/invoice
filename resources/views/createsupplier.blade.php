@extends('layouts.master-layout')

@section('title', 'Page Title')

@section('mainmenu')
@include('mainmenu')
@endsection

@section('content')

<div class="">
  <form>
    <div class="container well" style="width: 75%">
    <div class="col-md-6 col-md-offset-2">
          <h2>แบบฟอร์มผู้ขาย</h2>
          <br>
    </div>
  <div class="col-md-6 col-md-offset-3">
    <div class="form-group">
        <label for="company_name_th">ชื่อบริษัท :</label>
        <input class="form-control" name="company_name_th" id="company_name_th">        
    </div>
    <div class="form-group">
        <label for="company_name_en">Company Name :</label>
        <input class="form-control" name="company_name_en" id="company_name_en">        
    </div>
    <div class="form-group">
        <label for="company_address_th">ที่อยู่ :</label>
        <textarea class="form-control" name="company_address_th" id="company_address_th" rows="3" placeholder="(ห้องเลขที่,บ้านเลขที่,ตึก,ชื่อถนน)"></textarea>
    </div>
    <div class="form-group">
        <label for="company_address_en">Address :</label>
        <textarea class="form-control" name="company_address_en" id="company_address_en" rows="3" placeholder="(Room number, house number, building, street name)"></textarea>
    </div>
    <div class="form-group">
        <label for="company_address_th">อำเภอ/เขต :</label>
        <input type="district" class="form-control" name="area" id="area">   
    </div>
    <div class="form-group">
        <label for="company_address_th">จังหวัด :</label>
        <select class="form-control" name="country">
            <option value="11">กรุณาเลือกจังหวัด</option>
            <option value="จังหวัดกระบี่">จังหวัดกระบี่</option>
            <option value="จังหวัดกรุงเทพมหานคร">จังหวัดกรุงเทพมหานคร</option>
            <option value="จังหวัดกาญจนบุรี">จังหวัดกาญจนบุรี</option>
            <option value="จังหวัดกาฬสินธุ์">จังหวัดกาฬสินธุ์</option>
            <option value="จังหวัดกำแพงเพชร">จังหวัดกำแพงเพชร</option>
            <option value="จังหวัดขอนแก่น">จังหวัดขอนแก่น</option>
            <option value="จังหวัดจันทบุรี">จังหวัดจันทบุรี</option>
            <option value="จังหวัดฉะเชิงเทรา">จังหวัดฉะเชิงเทรา</option>
            <option value="จังหวัดชลบุรี">จังหวัดชลบุรี</option>
            <option value="จังหวัดชัยนาท">จังหวัดชัยนาท</option>
            <option value="จังหวัดชัยภูมิ">จังหวัดชัยภูมิ</option>
            <option value="จังหวัดชุมพร">จังหวัดชุมพร</option>
            <option value="จังหวัดตรัง">จังหวัดตรัง</option>
            <option value="จังหวัดตราด">จังหวัดตราด</option>
            <option value="จังหวัดตาก">จังหวัดตาก</option>
            <option value="จังหวัดนครนายก">จังหวัดนครนายก</option>
            <option value="จังหวัดนครปฐม">จังหวัดนครปฐม</option>
            <option value="จังหวัดนครพนม">จังหวัดนครพนม</option>
            <option value="จังหวัดนครราชสีมา">จังหวัดนครราชสีมา</option>
            <option value="จังหวัดนครศรีธรรมราช">จังหวัดนครศรีธรรมราช</option>
            <option value="จังหวัดนครสวรรค์">จังหวัดนครสวรรค์</option>
            <option value="จังหวัดนนทบุรี">จังหวัดนนทบุรี</option>
            <option value="จังหวัดนราธิวาส">จังหวัดนราธิวาส</option>
            <option value="จังหวัดน่าน">จังหวัดน่าน</option>
            <option value="จังหวัดบึงกาฬ">จังหวัดบึงกาฬ</option>
            <option value="จังหวัดบุรีรัมย์">จังหวัดบุรีรัมย์</option>
            <option value="จังหวัดปทุมธานี">จังหวัดปทุมธานี</option>
            <option value="จังหวัดประจวบคีรีขันธ์">จังหวัดประจวบคีรีขันธ์</option>
            <option value="จังหวัดปราจีนบุรี">จังหวัดปราจีนบุรี</option>
            <option value="จังหวัดปัตตานี">จังหวัดปัตตานี</option>
            <option value="จังหวัดพระนครศรีอยุธยา">จังหวัดพระนครศรีอยุธยา</option>
            <option value="จังหวัดพะเยา">จังหวัดพะเยา</option>
            <option value="จังหวัดพังงา">จังหวัดพังงา</option>
            <option value="จังหวัดพัทลุง">จังหวัดพัทลุง</option>
            <option value="จังหวัดพิจิตร">จังหวัดพิจิตร</option>
            <option value="จังหวัดพิษณุโลก">จังหวัดพิษณุโลก</option>
            <option value="จังหวัดภูเก็ต">จังหวัดภูเก็ต</option>
            <option value="จังหวัดมหาสารคาม">จังหวัดมหาสารคาม</option>
            <option value="จังหวัดมุกดาหาร">จังหวัดมุกดาหาร</option>
            <option value="จังหวัดยะลา">จังหวัดยะลา</option>
            <option value="จังหวัดยโสธร">จังหวัดยโสธร</option>
            <option value="จังหวัดระนอง">จังหวัดระนอง</option>
            <option value="จังหวัดระยอง">จังหวัดระยอง</option>
            <option value="จังหวัดราชบุรี">จังหวัดราชบุรี</option>
            <option value="จังหวัดร้อยเอ็ด">จังหวัดร้อยเอ็ด</option>
            <option value="จังหวัดลพบุรี">จังหวัดลพบุรี</option>
            <option value="จังหวัดลำปาง">จังหวัดลำปาง</option>
            <option value="จังหวัดลำพูน">จังหวัดลำพูน</option>
            <option value="จังหวัดศรีสะเกษ">จังหวัดศรีสะเกษ</option>
            <option value="จังหวัดสกลนคร">จังหวัดสกลนคร</option>
            <option value="จังหวัดสงขลา">จังหวัดสงขลา</option>
            <option value="จังหวัดสตูล">จังหวัดสตูล</option>
            <option value="จังหวัดสมุทรปราการ">จังหวัดสมุทรปราการ</option>
            <option value="จังหวัดสมุทรสงคราม">จังหวัดสมุทรสงคราม</option>
            <option value="จังหวัดสมุทรสาคร">จังหวัดสมุทรสาคร</option>
            <option value="จังหวัดสระบุรี">จังหวัดสระบุรี</option>
            <option value="จังหวัดสระแก้ว">จังหวัดสระแก้ว</option>
            <option value="จังหวัดสิงห์บุรี">จังหวัดสิงห์บุรี</option>
            <option value="จังหวัดสุพรรณบุรี">จังหวัดสุพรรณบุรี</option>
            <option value="จังหวัดสุราษฎร์ธานี">จังหวัดสุราษฎร์ธานี</option>
            <option value="จังหวัดสุรินทร์">จังหวัดสุรินทร์</option>
            <option value="จังหวัดสุโขทัย">จังหวัดสุโขทัย</option>
            <option value="จังหวัดหนองคาย">จังหวัดหนองคาย</option>
            <option value="จังหวัดหนองบัวลำภู">จังหวัดหนองบัวลำภู</option>
            <option value="จังหวัดอำนาจเจริญ">จังหวัดอำนาจเจริญ</option>
            <option value="จังหวัดอุดรธานี">จังหวัดอุดรธานี</option>
            <option value="จังหวัดอุตรดิตถ์">จังหวัดอุตรดิตถ์</option>
            <option value="จังหวัดอุทัยธานี">จังหวัดอุทัยธานี</option>
            <option value="จังหวัดอุบลราชธานี">จังหวัดอุบลราชธานี</option>
            <option value="จังหวัดอ่างทอง">จังหวัดอ่างทอง</option>
            <option value="จังหวัดเชียงราย">จังหวัดเชียงราย</option>
            <option value="จังหวัดเชียงใหม่">จังหวัดเชียงใหม่</option>
            <option value="จังหวัดเพชรบุรี">จังหวัดเพชรบุรี</option>
            <option value="จังหวัดเพชรบูรณ์">จังหวัดเพชรบูรณ์</option>
            <option value="จังหวัดเลย">จังหวัดเลย</option>
            <option value="จังหวัดแพร่">จังหวัดแพร่</option>
            <option value="จังหวัดแม่ฮ่องสอน">จังหวัดแม่ฮ่องสอน</option>
        </select>

        
    </div>
    <!-- <div class="form-group">
        <label for="address">Province :</label>
        <select class="form-control">
            <option value="11">please select province</option>
            <option value="Krabi">Krabi</option>
            <option value="Bangkok">Bangkok</option>
            <option value="Kanchanaburi">Kanchanaburi</option>
            <option value="Kalasin">Kalasin</option>
            <option value="Kamphaeng Phet">Kamphaeng Phet</option>
            <option value="Khon Kaen">Khon Kaen</option>
            <option value="Chanthaburi">Chanthaburi</option>
            <option value="Chachoengsao">Chachoengsao</option>
            <option value="Chonburi">Chonburi</option>
            <option value="Chainat">Chainat</option>
            <option value="Chaiyaphum">Chaiyaphum</option>
            <option value="Chumphon">Chumphon</option>
            <option value="Trang">Trang</option>
            <option value="Trat">Trat</option>
            <option value="Tak">Tak</option>
            <option value="Nakhon Nayok">Nakhon Nayok</option>
            <option value="Nakhon Pathom">Nakhon Pathom</option>
            <option value="Nakhon Phanom">Nakhon Phanom</option>
            <option value="Nakhon Ratchasima">Nakhon Ratchasima</option>
            <option value="Nakhon Si Thammarat">Nakhon Si Thammarat</option>
            <option value="Nakhon Sawan">Nakhon Sawan</option>
            <option value="Nonthaburi">Nonthaburi</option>
            <option value="Narathiwat">Narathiwat</option>
            <option value="Nan">Nan</option>
            <option value="Bueng Kan">Bueng Kan</option>
            <option value="Buriram">Buriram</option>
            <option value="Pathum Thani">Pathum Thani</option>
            <option value="Prachuap Khiri Khan">Prachuap Khiri Khan</option>
            <option value="Prachinburi">Prachinburi</option>
            <option value="Pattani">Pattani</option>
            <option value="Phra Nakhon Si Ayutthaya">Phra Nakhon Si Ayutthaya</option>
            <option value="Phayao">Phayao</option>
            <option value="Phang Nga">Phang Nga</option>
            <option value="Phatthalung">Phatthalung</option>
            <option value="Phichit">Phichit</option>
            <option value="Phitsanulok">Phitsanulok</option>
            <option value="Phuket">Phuket</option>
            <option value="Maha Sarakham">Maha Sarakham</option>
            <option value="Mukdahan">Mukdahan</option>
            <option value="Yala">Yala</option>
            <option value="Yasothon">Yasothon</option>
            <option value="Ranong">Ranong</option>
            <option value="Rayong">Rayong</option>
            <option value="Ratchaburi">Ratchaburi</option>
            <option value="Roi Et">Roi Et</option>
            <option value="Lopburi">Lopburi</option>
            <option value="Lampang">Lampang</option>
            <option value="Lamphun">Lamphun</option>
            <option value="Sisaket">Sisaket</option>
            <option value="Sakon Nakhon">Sakon Nakhon</option>
            <option value="Songkhla">Songkhla</option>
            <option value="Satun">Satun</option>
            <option value="Samut Prakan">Samut Prakan</option>
            <option value="Samut Songkhram">Samut Songkhram</option>
            <option value="Samut Sakhon">Samut Sakhon</option>
            <option value="Saraburi">Saraburi</option>
            <option value="Sa Kaeo">Sa Kaeo</option>
            <option value="Sing Buri">Sing Buri</option>
            <option value="Suphan Buri">Suphan Buri</option>
            <option value="Surat Thani">Surat Thani</option>
            <option value="Surin">Surin</option>
            <option value="Sukhothai">Sukhothai</option>
            <option value="Nong Khai">Nong Khai</option>
            <option value="Nong Bua Lamphu">Nong Bua Lamphu</option>
            <option value="Amnat Charoen">Amnat Charoen</option>
            <option value="Udon Thani">Udon Thani</option>
            <option value="Uttaradit">Uttaradit</option>
            <option value="Uthai Thani">Uthai Thani</option>
            <option value="Ubon Ratchathani">Ubon Ratchathani</option>
            <option value="Ang Thong">Ang Thong</option>
            <option value="Chiang Rai">Chiang Rai</option>
            <option value="Chiang Mai">Chiang Mai</option>
            <option value="Phetchaburi">Phetchaburi</option>
            <option value="Phetchabun">Phetchabun</option>
            <option value="Loei">Loei</option>
            <option value="Phrae">Phrae</option>
            <option value="Mae Hong Son">Mae Hong Son</option>
        </select>   
    </div> -->
    
    <div class="form-group">
        <label for="company_name_th">รหัสไปรษณีย์ :</label>
        <input type="Postal" class="form-control" name="post" id="post">   
    </div>     
    <div class="form-group">
        <label for="taxid">เลขที่ประจำตัวผู้เสียภาษีอากร :</label>
        <input type="text" class="form-control" name="taxid" id="taxid">    
    </div>
    <div class="form-group">
        <label for="company_tel">เบอร์โทร :</label>
        <input type="text" class="form-control" name="company_tel" id="company_tel">    
    </div>
    <div class="form-group">
        <label for="company_fax">เบอร์แฟ็กซ์ :</label>
        <input type="text" class="form-control" name="company_fax" id="company_fax">    
    </div>
<!--     <div class="form-group">
        <label for="contect_person">ชื่อผู้ติดต่อ :</label>
        <input type="text" class="form-control" name="contect_person" id="contect_person">        
    </div>  
    <div class="form-group">
        <label for="contect_tel">เบอร์โทรผู้ติดต่อ :</label>
        <input type="text" class="form-control" name="contect_tel" id="contect_tel">        
    </div>
    <div class="form-group">
        <label for="email">อีเมลล์ผู้ติดต่อ :</label>
        <input type="contect_email" class="form-control" name="contect_email" id="contect_email">        
    </div>   -->  
    
    <!-- <div class="form-group">    
          <label for="exampleInputFile">File input</label>
          <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
          <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
    </div>   -->   
        <button type="submit" class="btn btn-primary pull-right">Submit</button>
    <br>
    <br>
    <br>
    </div>
    </div>
  </form>
</div>
@endsection