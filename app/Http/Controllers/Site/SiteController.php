<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index(){
        $var1 = 123;
        $var2 = 456;
        return view('Site.home.index', compact('var1','var2'));
    }

    public function contato(){
        return view('Site.contact.index');
    }

    public function categoria($id){

        return "ID CATEGORIA $id";
    }
}
