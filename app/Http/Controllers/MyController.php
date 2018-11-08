<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    public function Hello()
    {
      return view('welcome');
    }

    public function Course($name)
    {
      echo "Course ".$name;
      return redirect()->route('myroute');
    }

    public function GetURL(Request $rq){
      //return $rq->url();
      //return $rq->path();
      // if ($rq->isMethod('post'))
      // {
      //   echo "This is Get method";
      // }
      // else
      // {
      //   echo "This is not Get method";
      // }
      if ($rq->is('My*'))
      {
        echo "Had My";
      }
      else {
        echo "Not had My";
      }
    }

    public function PostForm(Request $rq)
    {
      echo "Welcome: ".$rq->HoTen;
    }

    //create a cookie
    public function setCookie()
    {
      $rsp = new Response();
      $rsp->withCookie(cookie('cookiename','Con me may',1));
      return $rsp;
    }

    //get cookie
    public function getCookie(Request $rq)
    {
      return $rq->cookie('cookiename');
    }

    //upload a file
    public function UpFile(Request $request)
    {
      if ($request->hasFile('myFile'))
      {
        //check if file syntax is true
        return $this->CheckFileSyntax($request);
      }
      else
      {
        echo "No file choosen!";
      }
    }

    //check file syntax
    public function CheckFileSyntax(Request $request)
    {
      $file = $request->file('myFile');
      if ($file->getClientOriginalExtension('myFile') == "jpg")
      {
        $filename = $file->getClientOriginalName('myFile');
        echo $filename;
        $file->move('img',$filename);
      }
      else
      {
        echo "Syntax error!";
      }
    }

    //json
    public function getJson()
    {
      // $array = ['Laravel','PHP','Ruby On Rails'];
      $array = ['Course'=>'Ruby On Rails'];
      return response()->json($array);
    }

    //truyen du lieu len view (du lieu o dang array)
    public function MyView()
    {
      $array['user'] = ['Song Tran Van','Be Thi Trong', 'Cao Son Duc'];
      return view('myviewFolder.view',$array);
    }
}
