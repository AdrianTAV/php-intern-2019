<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $title ='About title';
        $description = 'About description';
        //return view('about' , compact('title','description'));
        return view('about', [
            'aboutTitle'=>$title,
        'aboutDescription' =>$description
        ]);
    }
}
