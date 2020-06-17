<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!empty($request->keyword)){
            $data['customers'] = Customer::where('first_name','like','%'.$request->keyword.'%')
                ->orWhere('last_name','like','%'.$request->keyword.'%')
                ->orWhere('last_name','like','%'.$request->keyword.'%')
                ->orWhere('email','like','%'.$request->keyword.'%')
                ->orWhere('phone_number','like','%'.$request->keyword.'%')
                ->orWhere('country','like','%'.$request->keyword.'%')
                ->orWhere('postcode','like','%'.$request->keyword.'%')
                ->orWhere('city','like','%'.$request->keyword.'%')
                ->orWhere('state','like','%'.$request->keyword.'%')
                ->paginate(25);
        } else {
            $data['customers'] = Customer::latest()->paginate(25);
        }
        return view('admin.customers.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer;
        foreach($request->meta as $meta => $value){
            $customer->$meta = $value;
        };
        $customer->save();
        return redirect('admin/customers');
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
        $url="https://gist.githubusercontent.com/ebaranov/41bf38fdb1a2cb19a781/raw/fb097a60427717b262d5058633590749f366bd80/gistfile1.json";
        $countries = json_decode(file_get_contents($url));
        $data['customer'] = Customer::find($id);
        $data['countries'] = $countries->countries;
        return view('admin.customers.edit',$data);
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
        $customer = Customer::find($id);
        foreach($request->meta as $meta => $value){
            $customer->$meta = $value;
        };
        $customer->save();
        return redirect('admin/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->back();
    }
}
