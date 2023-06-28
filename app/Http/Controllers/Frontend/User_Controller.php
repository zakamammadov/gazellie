<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\UserRegisterMail;
use Illuminate\Support\Facades\Mail;
use Auth;
class User_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login_form()
    {
        $categories = Category::whereRaw('top_cat_id is null')->get();

        return view('frontend.user.login',compact('categories'));
    }
    public function log_reg_form()
    {
        $categories = Category::whereRaw('top_cat_id is null')->get();

        return view('frontend.user.log_reg_form',compact('categories'));
    }

     public function login()
     {
        $this->validate(request(), [
            'userlogin' => 'required',
            'password' => 'required'
        ]);



        $credentials = [
            'userlogin'    => request('userlogin'),
            'password' => request('password'),
            'is_active' => 1
        ];


        if (auth()->attempt($credentials)) {
   request()->session()->regenerate();
 return redirect()->intended('/');

}else{

    return back()->withInput()->withErrors(['userlogin' => 'Email or password incorrect or Login is not active']);


}
     }



    public function register_form()
    {
        $categories = Category::whereRaw('top_cat_id is null')->get();

        return view('frontend.user.register',compact('categories'));
    }

    public function register()
    {
        $this->validate(request(), [
            'name' => 'required|min:3|max:60',
            'surname' => 'required|min:5|max:60',
            'userlogin'   => 'required|min:4|unique:users',
            'adress'   => 'required|min:5',
            'phone'   => 'required|min:5',
            'image'   => 'required',
            'email'   => 'required|email',
            'password'   => 'required|confirmed|min:5|max:15'
        ]);

        // $user = User::create([
        //     'name'             => request('name'),
        //     'surname'             => request('surname'),
        //     'email'               => request('email'),
        //     'userlogin'               => request('userlogin'),
        //     'password'               => Hash::make(request('password')),
        //     'activation_key' => Str::random(60),
        //     'is_active'            => 0
        // ]);

        $user=new User;
        $user->name=request('name');
        $user->surname=request('surname');
        $user->email=request('email');
        $user->userlogin=request('userlogin');
        $user->adress=request('adress');
        $user->phone=request('phone');
        $user->password= Hash::make(request('password'));
        $user->activation_key= Str::random(60);
        $user->is_active= 0;


        if (request()->hasFile('image')) {
            $this->validate(request(), [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);

            $image = request()->file('image');
            //$urun_resmi = request()->urun_resmi;

            $image_name =  "-" . time() . "." . $image->extension();
            //$dosyaadi = $urun_resmi->getClientOriginalName();
            //$dosyaadi = $urun_resmi->hashName();

            if ($image->isValid()) {
                // File::delete('uploads/products/' . $entry->product_main_image);

                $image->move('uploads/users', $image_name);

                $user->image=$image_name;
            }
        }

$user->save();

        // $user->detay()->save(new KullaniciDetay());

        //Mail::to(request('email'))->send(new UserRegisterMail($user));

        auth()->login($user);

        return redirect()
        ->route('user.register')
        ->with('message', 'You are registered. You can login after admin approval')
        ->with('message_type', 'success');    }
    public function logout()
    {
        auth()->logout();
    return back()->withInput()->withErrors(['userlogin' => 'Email or password incorrect!']);
    }


}
