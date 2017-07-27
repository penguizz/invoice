<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VendorController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function create(Request $request)
    {
            $vendortype=$request->get('vendortype');
            $html= view('vendorform',['vendortype'=>$vendortype]);
            return ['body'=>$html->render()];
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_name_th= \Input::get('company_name_th');
        $company_name_en= \Input::get('company_name_en');
        $company_address_th= \Input::get('company_address_th');
        $company_address_en= \Input::get('company_address_en');    
        $country= \Input::get('country');               
        $post= \Input::get('post');        
        $taxid= \Input::get('taxid');        
        $company_tel= \Input::get('company_tel');        
        $company_fax= \Input::get('company_fax');

        $credit= \Input::get('credit','');
        $payment_term= \Input::get('payment_term','');
        $due_billing= \Input::get('due_billing','');
        $customer_billing_document= \Input::get('customer_billing_document','');
        $customer_cheuqe_document= \Input::get('customer_cheuqe_document','');
        $vendortype= \Input::get('vendortype');
        
        // varidation
        $error_massges = [];
        if(empty(trim($company_name_th))){
            $error_massges[]="กรุณาใส่ชื่อบริษัท(ภาษาไทย)";
        }
        if(empty(trim($company_name_en))){
            $error_massges[]="กรุณาใส่ชื่อบริษัท(ภาษาอังกฤษ)";
        }
        if(empty(trim($company_address_th))){
            $error_massges[]="กรุณาใส่ที่อยู่(ภาษาไทย)";
        }
        if(empty(trim($company_address_en))){
            $error_massges[]="กรุณาใส่ที่อยู่(ภาษาอังกฤษ)";
        }
        if(empty(trim($country))){
            $error_massges[]="กรุณาเลือกจังหวัด";
        }
        if(empty(trim($post))){
            $error_massges[]="กรุณาใส่รหัสไปรษณีย์";
        }
        elseif(!is_numeric($post)){
            $error_massges[]="กรุณาใส่รหัสไปรษณีย์เป็นตัวเลข";
        }
        elseif(strlen($post)!=5){
            $error_massges[]="กรุณาใส่รหัสไปรษณีย์ให้ครบ 5 หลัก";
        }
        if(empty(trim($taxid))){
            $error_massges[]="กรุณาใส่เลขประจำตัวผู้เสียภาษี";
        }
        elseif(!is_numeric($taxid)){
            $error_massges[]="กรุณาใส่เลขประจำตัวผู้เสียภาษีเป็นตัวเลข";
        }
        elseif(strlen($taxid)!=13){
            $error_massges[]="กรุณาใส่เลขประจำตัวผู้เสียภาษีให้ครบ 13 หลัก";
        }                
        if(!empty($error_massges)){
            return response($error_massges,422);
        }

        $is_exist=DB::table('vendors')
            ->where('taxid',$taxid)
            ->first();

        if(!empty($is_exist)){
            return response(['This Tax Invoice ID is already exist'], 422);
        }

        $vendor=[
            'company_name_th'=>$company_name_th,
            'company_name_en'=>$company_name_en,
            'company_address_th'=>$company_address_th,
            'company_address_en'=>$company_address_en,            
            'country'=>$country,
            'post'=>$post,
            'vendortype'=>$vendortype,
            'taxid'=>$taxid,
            'company_tel'=>$company_tel,
            'company_fax'=>$company_fax,
            'payment_term'=>$payment_term,
            'credit'=>$credit,
            'customer_billing_document'=>$customer_billing_document,
            'customer_cheuqe_document'=>$customer_cheuqe_document,
            'due_billing'=>$due_billing,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            ];

        $vendor_id=DB::table('vendors')->insertGetId($vendor);

        return response(['callback'=>'add_to_select','vendor_id'=>$vendor_id,'vendor'=>$vendor],200);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
