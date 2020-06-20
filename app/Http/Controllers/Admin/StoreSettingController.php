<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StoreSetting;

class StoreSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['general'] = StoreSetting::where('type','general')->get();
        $data['product'] = StoreSetting::where('type','product-general')->get();
        $data['inventory'] = StoreSetting::where('type','product-inventory')->get();
        return view('admin.store-settings.index',$data);
    }
    
    public function paymentCod()
    {
        $data['paymentCod'] = StoreSetting::where('type','payment-cod')->get();
        return view('admin.store-settings.payment-cod',$data);
    }

    public function paymentDirectBankTransfer()
    {
        $data['status'] = StoreSetting::where('type','payment-direct-bank-transfer')->where('meta_key','status')->first();
        $data['banks'] = StoreSetting::where('type','payment-direct-bank-transfer')->where('meta_key','bank')->get();
        $data['account_names'] = StoreSetting::where('type','payment-direct-bank-transfer')->where('meta_key','account_name')->get();
        $data['account_numbers'] = StoreSetting::where('type','payment-direct-bank-transfer')->where('meta_key','account_number')->get();
        return view('admin.store-settings.payment-direct-bank-transfer',$data);
    }

    public function storePaymentDirectBankTransfer(Request $request)
    {
        StoreSetting::where('type','payment-direct-bank-transfer')->delete();
        
        $setting = new StoreSetting;
        $setting->type = $request->type;
        $setting->meta_key = "status";
        $setting->meta_value = $request->status;
        $setting->save();

        foreach($request->bank as $i => $value){
            $setting = new StoreSetting;
            $setting->type = $request->type;
            $setting->meta_key = "bank";
            $setting->meta_value = $request->bank[$i];
            $setting->save();
        }

        foreach($request->account_name as $j => $value){
            $setting = new StoreSetting;
            $setting->type = $request->type;
            $setting->meta_key = "account_name";
            $setting->meta_value = $request->account_name[$j];
            $setting->save();
        }

        foreach($request->account_number as $k => $value){
            $setting = new StoreSetting;
            $setting->type = $request->type;
            $setting->meta_key = "account_number";
            $setting->meta_value = $request->account_number[$k];
            $setting->save();
        }

        return redirect('admin/store/settings/payment-direct-bank-transfer');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->meta as $key => $value){
            $setting = StoreSetting::where('meta_key',$key)->first();
            if(!empty($setting)){
                $setting->type = $request->type;
                $setting->meta_key = $key;
                $setting->meta_value = $value;
                $setting->save();
            } else {
                $setting = new StoreSetting;
                $setting->type = $request->type;
                $setting->meta_key = $key;
                $setting->meta_value = $value;
                $setting->save();
            }
        }

        return redirect('admin/store/settings');
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
