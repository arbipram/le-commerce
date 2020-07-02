<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StoreSetting;
use App\Models\Contact;
use App\Models\Newsletter;
use SweetAlert;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $data['settings'] = StoreSetting::get();
        return view('front.contact',$data);
    }

    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name; 
        $contact->message = $request->message; 
        $contact->email = $request->email; 
        $contact->subject = $request->subject; 
        $contact->save();

        alert()->success('Data Berhasil di Kirim', 'Data Has Sent');
        return redirect()->back();
    }

    public function newsletter(Request $request)
    {
        $contact = new Newsletter;
        $contact->email = $request->email; 
        $contact->save();

        alert()->success('Data Berhasil di Kirim', 'Data Has Sent');
        return redirect()->back();
    }
}
