<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PAge;

class PageController extends Controller
{
    public function index($slug)
    {
        $data['page'] = Page::where('slug',$slug)->first();
        return view('front.page',$data);
    }
}
