<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QuotationController extends Controller
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
    public function index()
    {
        $temp_quotation=DB::table('quotations')
            ->leftJoin('vendors','vendors.vendor_id','=','quotations.vendor_id')
            ->get();
        return view('quotation',['items'=>$temp_quotation]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $temp_vendors=DB::table('vendors')
            ->where('vendortype','customer')
            ->orderBy('company_name_th','asc')               //select data from database
            ->get();

        $vendors=[];
        if(!empty($temp_vendors)){
            foreach($temp_vendors as $temp){            //check data and loop for change value to id 
                $vendors[$temp->vendor_id]=$temp;
            }
        }
        return view('createquotation',['vendors'=>$vendors]);
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
        //Table quotations
        $vendor_id=\Input::get('vendor_id');
        $quotation_no=\Input::get('quotation_no');
        $quotation_revision=\Input::get('quotation_revision');
        $quotation_date=\Input::get('quotation_date');
        // $quotation_revision_update=\Input::get('quotation_revision_update');
        $quotation_sub_total=\Input::get('quotation_sub_total');
        // $quotation_vat_percen=\Input::get('quotation_vat_percen');
        $quotation_vat_money=\Input::get('quotation_vat_money');
        $quotation_total=\Input::get('quotation_total');

        //Table quotation_contact
        $quotation_contact_person=\Input::get('quotation_contact_person');
        $quotation_contact_tel=\Input::get('quotation_contact_tel');
        $quotation_contact_email=\Input::get('quotation_contact_email');

         //Table po_detail
        $quotation_detail_part_no=\Input::get('quotation_detail_part_no');
        $quotation_description=\Input::get('quotation_description');
        $quotation_quantity=\Input::get('quotation_quantity');
        $quotation_unit_price=\Input::get('quotation_unit_price');
        $quotation_amount=\Input::get('quotation_amount');

        //validation
        $error_messages = [];
        if(empty(trim($quotation_no))){
            $error_messages[]="กรุณากรอกหมายเลข Quotation No.";        
        }
        if(empty(trim($quotation_date))){
            $error_messages[]="กรุณาระบุวันที่";
        }
        if(!empty($error_messages)){
            return response($error_messages, 422);
        }

        $is_exist=DB::table('quotations')
            ->where('quotation_no',$quotation_no)
            ->first();

        if(!empty($is_exist)){
            return response(['ไม่สามารถใช้หมายเลข Quotation No. นี้ได้ หรือไม่สามารถใช้หมายเลขเดิมได้'], 422);
        }

        $is_exist=DB::table('quotation_details')
            ->where('quotation_detail_part_no',$quotation_detail_part_no)
            ->first();

        if(!empty($is_exist)){
            return response(['ไม่สามารถใช้หมายเลข Part No นี้ได้ หรือไม่สามารถใช้หมายเลขเดิมได้'], 422);
        }

        DB::beginTransaction();
        $quotation=[
            'vendor_id'=>$vendor_id,
            'quotation_no'=>$quotation_no,
            'quotation_date'=>$quotation_date,
            'quotation_revision'=>$quotation_revision,
            // 'po_revision_update'=>$po_revision_update,
            'quotation_sub_total'=>$quotation_sub_total,
            // 'po_vat_percen'=>$po_vat_percen,
            'quotation_vat_money'=>$quotation_vat_money,
            'quotation_total'=>$quotation_total,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        $quotation_id=DB::table('quotations')->insertGetId($quotation);

        $quotation_contect=[
            'quotation_id'=>$quotation_id,
            'vendor_id'=>$vendor_id,
            'quotation_contact_person'=>$quotation_contact_person,
            'quotation_contact_tel'=>$quotation_contact_tel,
            'quotation_contact_email'=>$quotation_contact_email,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        DB::table('quotation_contacts')->insertGetId($quotation_contect);

        $quotation_detail=[];
        foreach ($quotation_detail_part_no as $key => $value) {
            $error_messages = [];
            if(empty($quotation_detail_part_no)){
                $error_messages[]="กรุณากรอกรหัสสินค้า";
            }
            if(empty($quotation_description)){
                $error_messages[]="กรุณากรอกชื่อสินค้า";
            }
            if(!is_numeric($quotation_quantity)){
                $error_messages[]="กรุณากรอกจำนวนสินค้าเป็นตัวเลข";        
            }
            if(!is_numeric($quotation_unit_price)){
                $error_messages[]="กรุณากรอกราคาสินค้าเป็นตัวเลข";        
            }
            if(!empty($error_messages)){
                DB::rollBack();
                return response($error_messages, 422);
            }
            $quotation_detail[]=[
                'quotation_id'=>$quotation_id,
                'quotation_detail_part_no'=>$quotation_detail_part_no[$key],
                'quotation_description'=>$quotation_description[$key],
                'quotation_quantity'=>$quotation_quantity[$key],
                'quotation_unit_price'=>$quotation_unit_price[$key],
                'quotation_amount'=>$quotation_amount[$key],
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ];
        }
        DB::table('quotation_details')->insert($quotation_detail);
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
        $temp_quotation=DB::table('quotations')
            ->leftJoin('quotation_contacts','quotations.quotation_id','=','quotation_contacts.quotation_id')
            ->leftJoin('vendors','quotations.vendor_id','=','vendors.vendor_id')
            ->where('quotations.quotation_id', '=', $id)
            ->first();

         $temp_detail=DB::table('quotation_details')
            ->where('quotation_details.quotation_id', '=', $id)
            ->get();
        $temp_detail = json_encode($temp_detail);


        $temp_vendors=DB::table('vendors')
            ->where('vendortype','customer')
            ->orderBy('company_name_th','asc')               //select data from database
            ->get();

        $vendors=[];
        if(!empty($temp_vendors)){
            foreach($temp_vendors as $temp){            //check data and loop for change value to id 
                $vendors[$temp->vendor_id]=$temp;
            }
        }

        // dd($temp_quotation);
        return view('updatequotation',['vendors'=>$vendors,'temp_quotation'=>$temp_quotation,'temp_detail'=>$temp_detail]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //Table quotations
        $vendor_id=\Input::get('vendor_id');
        $quotation_no=\Input::get('quotation_no');
        $quotation_revision=\Input::get('quotation_revision');
        $quotation_date=\Input::get('quotation_date');
        // $quotation_revision_update=\Input::get('quotation_revision_update');
        $quotation_sub_total=\Input::get('quotation_sub_total');
        // $quotation_vat_percen=\Input::get('quotation_vat_percen');
        $quotation_vat_money=\Input::get('quotation_vat_money');
        $quotation_total=\Input::get('quotation_total');

        //Table quotation_contact
        $quotation_contact_person=\Input::get('quotation_contact_person');
        $quotation_contact_tel=\Input::get('quotation_contact_tel');
        $quotation_contact_email=\Input::get('quotation_contact_email');

         //Table po_detail
        $quotation_detail_part_no=\Input::get('quotation_detail_part_no');
        $quotation_description=\Input::get('quotation_description');
        $quotation_quantity=\Input::get('quotation_quantity');
        $quotation_unit_price=\Input::get('quotation_unit_price');
        $quotation_amount=\Input::get('quotation_amount');

        //validation
        $error_messages = [];
        if(empty(trim($quotation_no))){
            $error_messages[]="กรุณากรอกหมายเลข Quotation No.";        
        }
        if(empty(trim($quotation_date))){
            $error_messages[]="กรุณาระบุวันที่";
        }
        if(!empty($error_messages)){
            return response($error_messages, 422);
        }

        $is_exist=DB::table('quotations')
            ->where('quotation_no',$quotation_no)
            ->first();

        if(!empty($is_exist)){
            return response(['ไม่สามารถใช้หมายเลข Quotation No. นี้ได้ หรือไม่สามารถใช้หมายเลขเดิมได้'], 422);
        }

        $is_exist=DB::table('quotation_details')
            ->where('quotation_detail_part_no',$quotation_detail_part_no)
            ->first();

        if(!empty($is_exist)){
            return response(['ไม่สามารถใช้หมายเลข Part No นี้ได้ หรือไม่สามารถใช้หมายเลขเดิมได้'], 422);
        }

        DB::beginTransaction();
        $quotation=[
            'vendor_id'=>$vendor_id,
            'quotation_no'=>$quotation_no,
            'quotation_date'=>$quotation_date,
            'quotation_revision'=>$quotation_revision,
            // 'po_revision_update'=>$po_revision_update,
            'quotation_sub_total'=>$quotation_sub_total,
            // 'po_vat_percen'=>$po_vat_percen,
            'quotation_vat_money'=>$quotation_vat_money,
            'quotation_total'=>$quotation_total,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        DB::table('quotations')
        ->where('quotation_id',$id)
        ->update($quotation);
        $quotation_id=$id;

        $quotation_contect=[
            'quotation_id'=>$quotation_id,
            'vendor_id'=>$vendor_id,
            'quotation_contact_person'=>$quotation_contact_person,
            'quotation_contact_tel'=>$quotation_contact_tel,
            'quotation_contact_email'=>$quotation_contact_email,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        DB::table('quotation_contacts')->where('quotation_id',$id)->delete();
        DB::table('quotation_contacts')->insertGetId($quotation_contect);

        $quotation_detail=[];
        $temp_path_nos = [];
        foreach ($quotation_detail_part_no as $key => $value) {
            $error_messages = [];
            if(empty($quotation_detail_part_no[$key])){
                $error_messages[]="กรุณากรอกรหัสสินค้า";
            }
            if(empty($quotation_description[$key])){
                $error_messages[]="กรุณากรอกชื่อสินค้า";
            }
            if(!is_numeric($quotation_quantity[$key])){
                $error_messages[]="กรุณากรอกจำนวนสินค้าเป็นตัวเลข";        
            }
            if(!is_numeric($quotation_unit_price[$key])){
                $error_messages[]="กรุณากรอกราคาสินค้าเป็นตัวเลข";        
            }
            if(!in_array($quotation_detail_part_no[$key],$temp_path_nos))
            {
                $temp_path_nos[] = $quotation_detail_part_no[$key];
            }
            else
            {
                $error_messages[]="ไม่สามารถใช้รหัสสินค้านี้ได้";        
            }
            if(!empty($error_messages)){
                DB::rollBack();
                return response($error_messages, 422);
            }
            $quotation_detail[]=[
                'quotation_id'=>$quotation_id,
                'quotation_detail_part_no'=>$quotation_detail_part_no[$key],
                'quotation_description'=>$quotation_description[$key],
                'quotation_quantity'=>$quotation_quantity[$key],
                'quotation_unit_price'=>$quotation_unit_price[$key],
                'quotation_amount'=>$quotation_amount[$key],
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ];
        }
        DB::table('quotation_details')->where('quotation_id',$id)->delete();
        DB::table('quotation_details')->insert($quotation_detail);
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
