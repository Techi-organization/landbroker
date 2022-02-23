<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Sale;
use App\Models\Contact;
use Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Hash as FacadesHash;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
        $request->validate([

            'emailid' => 'required|email',
            'passwd' =>'required|min:8|max:12',
        ]);
        $article= Article::where('emailid','=',$request->emailid)->first();
        if($article)
        {
            if(Hash::check($request->passwd, $article->password1))
            {
               $request->session()->put('loginId',$article->id);
               return redirect('dashboard');
            }else{
                return back()->with('fail','This Password is incorrect!');

            }
        }else{
            return back()->with('fail','This email id is not Registered!');

        }
    }

    public function create(Request $request)
    {
       $request->validate([

        'form_name'=>'required',
        'form_email'=>'required|email|unique:articles,emailid',
        'form_pass'=>'required|min:8|max:12',
        'form_phone'=>'required|numeric',

       ]);
       $article= new Article();

       $article->name = $request->form_name;
       $article->emailid = $request->form_email;
       $article->password1 = Hash::make($request->form_pass);
       $article->contactno = $request->form_phone;
       $res=$article->save();

       if($res){

        return back()->with('success','You have Registered successfully');
       }else{

        return back()->with('fail','Something wrong');
       }
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('home');
        }
    }

    public function login(){
        return view('FrontEnd.login');
    }
    public function buysalerent(){
        return view('FrontEnd.buysalerent');
    }

    public function register(){
        return view('FrontEnd.register');
    }
    public function dashboard (){
        return view('FrontEnd.dashboard ');
    }

    public function contactUser(Request $request)
    {
       $request->validate([

        'name'=>'required',
        'email'=>'required|email|unique:contacts,emailid',
        'contact_no'=>'required|min:10|max:13',
        'mesgg'=>'required',

       ]);
       $contact= new Contact();

       $contact->name = $request->name;
       $contact->emailid = $request->email;
       $contact->contactno =$request->contact_no;
       $contact->usermessage = $request->mesgg;
       $res=$contact->save();

       if($res){

        return back()->with('success','You have Registered successfully');
       }else{

        return back()->with('fail','Something wrong');
       }
    }

    public function saleUser(){
        return view('FrontEnd.saleuser');
    }

    public function saleImage(Request $request)
    {


        // $request->validate([

        //     'owner_name'=>'required',
        //     'owner_email'=>'required',
        //     'property_name'=>'required',
        //     'property_method'=>'required',
        //     'price'=>'required',
        //     'image'=>'required',
        //     'address'=>'required',

        //    ]);

        // $image = array();
        // if($files = $request->file('image')){
        //     foreach($files as $file){
        //       $image_name=md5(rand(1000, 10000))  ;
        //       $ext = strtolower( $file->getClientOriginalExtension());
        //       $image_full_name = $image_name.'.'.$ext;
        //       $upload_path = 'saleimages/';
        //       $image_url = $upload_path.$image_full_name ;
        //       $file-> move($upload_path,$image_full_name);
        //       $image[]=$image_url;
        //     }



        // }


        // Sale::insert([

        //     'name' => $request->owner_name,
        //     'emailid' => $request->owner_email,
        //     'Property_name' => $request->property_name,
        //     'property_method' => $request->property_method,
        //     'property_price' => $request->price,
        //     'property_images' => implode('|',$image),
        //     'property_address' => $request->address

        // ]);


          $sale= new Sale();
        $sale->name = $request->input('owner_name');
        $sale->emailid = $request->input('owner_email');
        $sale->Property_name = $request->input('property_name');
        $sale->property_method = $request->input('property_method');
        // if($request->hasfile('image')){
        //     $image = array();
        //    if($files = $request->file('image')){
        //     foreach($files as $file){

        //          $image_name=md5(rand(1000, 10000))  ;
        //            $ext = strtolower( $file->getClientOriginalExtension());
        //          $image_full_name = $image_name.'.'. $ext;
        //          $upload_path = 'saleimages/';
        //          $image_url = $upload_path.$image_full_name ;
        //          $file-> move($upload_path,$image_full_name);
        //          $image[]=$image_url;
        //         }

        //         }
        //             $sale->property_images = $image;
        //     }
        $sale->property_price = $request->input('price');
        $sale->property_address = $request->input('address');
        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/img/', $name);  // your folder path
                $data[] = $name;
            }
        }
        $sale->property_images = json_encode($data);

        $sale->save();

        return back()->with('success','You have Registered successfully');
    }

    public function gallery(){

        $data = Sale::all();
        return view ('FrontEnd.propertygallery',  compact('data'));
    }



}
