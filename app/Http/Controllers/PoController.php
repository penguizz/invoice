<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) 
    {   
        // dd($request->all());
        $vendor_id = $request->get('vendor_id');
        $pno = $request->get('pno');
        $po_date = $request->get('po_date');
        $temp_po=DB::table('purchaseorders')
            ->leftJoin('vendors','vendors.vendor_id','=','purchaseorders.vendor_id');
        if (is_numeric($vendor_id) && $vendor_id > 0) {
             $temp_po->where('purchaseorders.vendor_id',$vendor_id);
        }
        if (!empty($pno)) {
             $temp_po->where('po_no','like','%'.$pno.'%');
        }
        if (!empty($po_date)) {
             $temp_po->where('po_date','like','%'.$po_date.'%');
        }

        $temp_vendors=DB::table('vendors')  
            ->where('vendortype','supplier')
            ->get();

        $vendors=[];
        if(!empty($temp_vendors)){
            foreach($temp_vendors as $temp){            //check data and loop for change value to id 
                $vendors[$temp->vendor_id]=$temp;
            }
        }

           $temp_data = $temp_po->get();
           //return view('po',['items'=>$temp_data]);
        
        return view('po',['items'=>$temp_data,'vendors'=>$vendors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $temp_vendors=DB::table('vendors')
            ->where('vendortype','supplier')
            ->orderBy('company_name_th','asc')               //select data from database
            ->get();

        $vendors=[];
        if(!empty($temp_vendors)){
            foreach($temp_vendors as $temp){            //check data and loop for change value to id 
                $vendors[$temp->vendor_id]=$temp;
            }
        }
        return view('createpo',['vendors'=>$vendors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($_POST);exit();
        //Table purchaseorders
        $vendor_id=\Input::get('vendor_id');
        $po_no=\Input::get('po_no');
        $po_date=\Input::get('po_date');
        $po_revision=\Input::get('po_revision');
        // $po_revision_update=\Input::get('po_revision_update');
        $quotation_no=\Input::get('quotation_no');
        $po_remark=\Input::get('po_remark');
        $po_sub_total=\Input::get('po_sub_total');
        $po_discount=\Input::get('po_discount');
        $po_price_after_discount=\Input::get('po_price_after_discount');
        // $po_vat_percen=\Input::get('po_vat_percen');
        $po_vat_money=\Input::get('po_vat_money');
        $po_total=\Input::get('po_total');
        $payment_credit_1=\Input::get('payment_credit_1');
        $payment_credit_2=\Input::get('payment_credit_2');
        
        //Table Po_contacts
        $po_contact_person=\Input::get('po_contact_person');
        $po_contact_tel=\Input::get('po_contact_tel');
        $po_contact_email=\Input::get('po_contact_email');

        //Table Po_details
        $po_detail_part_no=\Input::get('po_detail_part_no');
        $po_description=\Input::get('po_description');
        $po_quantity=\Input::get('po_quantity');
        $po_unit_price=\Input::get('po_unit_price');
        $po_amount=\Input::get('po_amount');

        //validation
        $error_messages = [];
        if(empty($vendor_id)){
            $error_messages[]="กรุณาเลือกผู้ขาย หรือเพิ่มผู้ขายใหม่";        
        }
        if(empty($po_contact_person)){
            $error_messages[]="กรุณากรอกชื่อผู้ติดต่อ";        
        }
        if(empty($po_contact_person)){
            $error_messages[]="กรุณากรอกเบอร์โทรผู้ติดต่อ";        
        }
        if(empty($po_contact_person)){
            $error_messages[]="กรุณากรอกอีเมลผู้ติดต่อ";        
        }
        if(empty($payment_credit_1)){
            $payment_credit_1 ='N';
        }
        if(empty($payment_credit_2)){
            $payment_credit_2 ='N';
        }
        if(empty(trim($po_no))){
            $error_messages[]="กรุณากรอกหมายเลข Purchase Order";        
        }
        if(empty(trim($po_date))){
            $error_messages[]="กรุณาระบุวันที่";
        }
        if(!is_numeric($po_revision)){
            $error_messages[]="กรุณากรอกระบุเป็นตัวเลข ถ้าไม่มีการแก้ไขใส่เลข 0";
        }
        if(empty(trim($quotation_no))){
            $error_messages[]="กรุณากรอกหมายเลข Quotation No.";
        }
        
        if(!empty($error_messages)){
            DB::rollBack();
            return response($error_messages, 422);
        }

        $is_exist=DB::table('purchaseorders')
            ->where('po_no',$po_no)
            ->first();

        if(!empty($is_exist)){
            return response(['ไม่สามารถใช้หมายเลข Purchase Order No. นี้ได้ หรือไม่สามารถใช้หมายเลขเดิมได้'], 422);
        }

        DB::beginTransaction();
        $po=[
            'vendor_id'=>$vendor_id,
            'po_no'=>$po_no,
            'po_date'=>$po_date,
            'po_revision'=>$po_revision,
            // 'po_revision_update'=>$po_revision_update,
            'quotation_no'=>$quotation_no,
            'po_remark'=>$po_remark,
            'po_sub_total'=>$po_sub_total,
            'po_discount'=>$po_discount,
            'po_price_after_discount'=>$po_price_after_discount,
            // 'po_vat_percen'=>$po_vat_percen,
            'po_vat_money'=>$po_vat_money,
            'po_total'=>$po_total,
            'payment_credit_1'=>$payment_credit_1,
            'payment_credit_2'=>$payment_credit_2,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        $po_id=DB::table('purchaseorders')->insertGetId($po);

        $po_contact=[
            'po_id'=>$po_id,
            'vendor_id'=>$vendor_id,
            'po_contact_person'=>$po_contact_person,
            'po_contact_tel'=>$po_contact_tel,
            'po_contact_email'=>$po_contact_email,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        DB::table('po_contacts')->insertGetId($po_contact);
      
        $po_detail=[];
        $temp_path_nos = [];
        foreach ($po_detail_part_no as $key => $value) {
            $error_messages = [];
            if(empty($po_detail_part_no[$key])){
                $error_messages[]="กรุณากรอกรหัสสินค้า";
            }
            if(empty($po_description[$key])){
                $error_messages[]="กรุณากรอกชื่อสินค้า";
            }
            if(!is_numeric($po_quantity[$key])){
                $error_messages[]="กรุณากรอกจำนวนสินค้าเป็นตัวเลข";        
            }
            if(!is_numeric($po_unit_price[$key])){
                $error_messages[]="กรุณากรอกราคาสินค้าเป็นตัวเลข";        
            }
            if(!in_array($po_detail_part_no[$key],$temp_path_nos))
            {
                $temp_path_nos[] = $po_detail_part_no[$key];
            }
            else
            {
                $error_messages[]="xxxx";        
            }

            if(!empty($error_messages)){  
                DB::rollBack();
                return response($error_messages, 422);
            }


            $po_detail[]=[
                'po_id'=>$po_id,
                'po_detail_part_no'=>$po_detail_part_no[$key],
                'po_description'=>$po_description[$key],
                'po_quantity'=>$po_quantity[$key],
                'po_unit_price'=>$po_unit_price[$key],
                'po_amount'=>$po_amount[$key],
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ];
        }

        DB::table('po_details')->insert($po_detail);
        DB::commit();
        
        return response(['บันทึกสำเร็จแล้ว'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $temp_po=DB::table('purchaseorders')
            ->leftJoin('po_contacts','purchaseorders.po_id','=','po_contacts.po_id')
            ->leftJoin('vendors','purchaseorders.vendor_id','=','vendors.vendor_id')
            ->where('purchaseorders.po_id', '=', $id)
            ->first();

         $temp_detail=DB::table('po_details')
            ->where('po_details.po_id', '=', $id)
            ->get();
        $temp_detail = json_encode($temp_detail);


        $temp_vendors=DB::table('vendors')
            ->where('vendortype','supplier')
            ->orderBy('company_name_th','asc')               //select data from database
            ->get();

        $vendors=[];
        if(!empty($temp_vendors)){
            foreach($temp_vendors as $temp){            //check data and loop for change value to id 
                $vendors[$temp->vendor_id]=$temp;
            }
        }

        // dd($temp_vendors);
        return view('updatepo',['vendors'=>$vendors,'temp_po'=>$temp_po,'temp_detail'=>$temp_detail]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendor_id=\Input::get('vendor_id');
        $po_no=\Input::get('po_no');
        $po_date=\Input::get('po_date');
        $po_revision=\Input::get('po_revision');
        // $po_revision_update=\Input::get('po_revision_update');
        $quotation_no=\Input::get('quotation_no');
        $po_remark=\Input::get('po_remark');
        $po_sub_total=\Input::get('po_sub_total');
        $po_discount=\Input::get('po_discount');
        $po_price_after_discount=\Input::get('po_price_after_discount');
        // $po_vat_percen=\Input::get('po_vat_percen');
        $po_vat_money=\Input::get('po_vat_money');
        $po_total=\Input::get('po_total');
        $payment_credit_1=\Input::get('payment_credit_1');
        $payment_credit_2=\Input::get('payment_credit_2');
        
        //Table Po_contacts
        $po_contact_person=\Input::get('po_contact_person');
        $po_contact_tel=\Input::get('po_contact_tel');
        $po_contact_email=\Input::get('po_contact_email');

        //Table Po_details
        $po_detail_part_no=\Input::get('po_detail_part_no');
        $po_description=\Input::get('po_description');
        $po_quantity=\Input::get('po_quantity');
        $po_unit_price=\Input::get('po_unit_price');
        $po_amount=\Input::get('po_amount');

        //validation
        $error_messages = [];
        if(empty($vendor_id)){
            $error_messages[]="กรุณาเลือกผู้ขาย หรือเพิ่มผู้ขายใหม่";        
        }
        if(empty($po_contact_person)){
            $error_messages[]="กรุณากรอกชื่อผู้ติดต่อ";        
        }
        if(empty($po_contact_person)){
            $error_messages[]="กรุณากรอกเบอร์โทรผู้ติดต่อ";        
        }
        if(empty($po_contact_person)){
            $error_messages[]="กรุณากรอกอีเมลผู้ติดต่อ";        
        }
        if(empty($payment_credit_1)){
            $payment_credit_1 ='N';
        }
        if(empty($payment_credit_2)){
            $payment_credit_2 ='N';
        }
        if(empty(trim($po_no))){
            $error_messages[]="กรุณากรอกหมายเลข Purchase Order";        
        }
        if(empty(trim($po_date))){
            $error_messages[]="กรุณาระบุวันที่";
        }
        if(!is_numeric($po_revision)){
            $error_messages[]="กรุณากรอกระบุเป็นตัวเลข ถ้าไม่มีการแก้ไขใส่เลข 0";
        }
        if(empty(trim($quotation_no))){
            $error_messages[]="กรุณากรอกหมายเลข Quotation No.";
        }
        
        if(!empty($error_messages)){
            DB::rollBack();
            return response($error_messages, 422);
        }

        $is_exist=DB::table('purchaseorders')
            ->where('po_no',$po_no)
            ->where('po_id','!=',$id)
            ->first();

        if(!empty($is_exist)){
            return response(['ไม่สามารถใช้หมายเลข Purchase Order No. นี้ได้ หรือไม่สามารถใช้หมายเลขเดิมได้'], 422);
        }

        DB::beginTransaction();
        $po=[
            'vendor_id'=>$vendor_id,
            'po_no'=>$po_no,
            'po_date'=>$po_date,
            'po_revision'=>$po_revision,
            // 'po_revision_update'=>$po_revision_update,
            'quotation_no'=>$quotation_no,
            'po_remark'=>$po_remark,
            'po_sub_total'=>$po_sub_total,
            'po_discount'=>$po_discount,
            'po_price_after_discount'=>$po_price_after_discount,
            // 'po_vat_percen'=>$po_vat_percen,
            'po_vat_money'=>$po_vat_money,
            'po_total'=>$po_total,
            'payment_credit_1'=>$payment_credit_1,
            'payment_credit_2'=>$payment_credit_2,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        DB::table('purchaseorders')
        ->where('po_id',$id)
        ->update($po);
        $po_id=$id;

        $po_contact=[
            'po_id'=>$po_id,
            'vendor_id'=>$vendor_id,
            'po_contact_person'=>$po_contact_person,
            'po_contact_tel'=>$po_contact_tel,
            'po_contact_email'=>$po_contact_email,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        DB::table('po_contacts')->where('po_id',$id)->delete();
        DB::table('po_contacts')->insertGetId($po_contact);
      
        $po_detail=[];
        $temp_path_nos = [];
        foreach ($po_detail_part_no as $key => $value) {
            $error_messages = [];
            if(empty($po_detail_part_no[$key])){
                $error_messages[]="กรุณากรอกรหัสสินค้า";
            }
            if(empty($po_description[$key])){
                $error_messages[]="กรุณากรอกชื่อสินค้า";
            }
            if(!is_numeric($po_quantity[$key])){
                $error_messages[]="กรุณากรอกจำนวนสินค้าเป็นตัวเลข";        
            }
            if(!is_numeric($po_unit_price[$key])){
                $error_messages[]="กรุณากรอกราคาสินค้าเป็นตัวเลข";        
            }
            if(!in_array($po_detail_part_no[$key],$temp_path_nos))
            {
                $temp_path_nos[] = $po_detail_part_no[$key];
            }
            else
            {
                $error_messages[]="ไม่สามารถใช้รหัสสินค้านี้ได้";        
            }
            if(!empty($error_messages)){  
                DB::rollBack();
                return response($error_messages, 422);
            }
            $po_detail[]=[
                'po_id'=>$po_id,
                'po_detail_part_no'=>$po_detail_part_no[$key],
                'po_description'=>$po_description[$key],
                'po_quantity'=>$po_quantity[$key],
                'po_unit_price'=>$po_unit_price[$key],
                'po_amount'=>$po_amount[$key],
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ];
        }
        DB::table('po_details')->where('po_id',$id)->delete();
        DB::table('po_details')->insert($po_detail);
        DB::commit();
        
        return response(['บันทึกสำเร็จแล้ว'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
