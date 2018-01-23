<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Model\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Model\Kategori;
use Illuminate\Support\Facades\Mail;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'name' => 'required|min:6',
            'email' => 'required|email|max:255|unique:admins',
            'identifier' => 'required|max:255',
            'kategori' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6',
            'no_hp' => 'required|max:50',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Admin
     */
    protected function create(array $data)
    {

        $admin = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'identifier' => $data['identifier'],
//            'id_kategori' => (int)$data['kategori'],
            'password' => bcrypt($data['password']),
            'no_hp' => $data['no_hp']
        ]);

        if($data['kategori']=='0'){
            $admin->status_admin = 'admin_jurusan';
        }
        else {
            $kategori = Kategori::find($data['kategori']);
            if($kategori->jenis_kategori=='fakultas'){
                $admin->status_admin = 'admin_fakultas';
            }
            else if($kategori->jenis_kategori=='departemen') {
                $admin->status_admin = 'admin_jurusan';
            }
        }
        $admin->id_kategori = (int)$data['kategori'];
        $admin->save();

        return $admin;
    }
    public function showRegisterForm()
    {
        $kategori = Kategori::whereIn('jenis_kategori', ['fakultas','departemen'])->get();
        return view('admin.auth.register', ['kategori' => $kategori]);
    }

    public function register(Request $request)
    {
        $validation = $this->validator($request->all());
        if ($validation->fails()) {

            //withInput keep the users info
//            echo 'lel';
//                    die();
//            return Redirect::back()->withInput()->withErrors('Pendaftaran gagal');

            //withInput keep users info
            return Redirect::back()->withInput()->withErrors($validation->messages());


        } else {
            event(new Registered($admin = $this->create($request->all())));
//            $super = Admin::where('status_admin','super_admin')->get();
//            foreach($super as $ss){
//            Mail::send('admin.emails.new_user', ['user' => $ss], function ($m) use ($ss) {
//                $m->from('simpru.its@gmail.com', 'SIMPRU ITS');
//
//                $m->to($ss->email, $ss->name)->subject('ALERT | New Confirmation for New Admin Verification!');
//            });
//            }
//            $this->guard()->login($admin);
            return $this->registered($request, $admin)
                ?: redirect()->intended($this->redirectPath());
        }
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
