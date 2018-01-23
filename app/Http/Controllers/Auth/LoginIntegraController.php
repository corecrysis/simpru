<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\User;

class LoginIntegraController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//    protected function attemptLogin($credentials, Request $request)
//    {
//        return $this->guard()->attempt(
//            $credentials, $request->has('remember')
//        );
//    }

    public function showLoginForm(Request $request)
    {
        return view('auth.login_integra');
    }

    public function login(Request $request)
    {
//        $this->validateLogin($request);

        $user_cek = User::where('identifier', $request->identifier)->orWhere('email', $request->email);
        if ($user_cek->exists()) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors(['email' => 'Maaf username/password telah terdaftar pada website SIMPRU, silakan masuk melalui halaman <a href="/login">login</a>']);
        } else {
            $response = json_decode(Curl::to('https://api.its.ac.id:8243/token')
                ->withContentType('application/x-www-form-urlencoded')
                ->withHeader('Authorization: Basic ' . config('app.integra'))
                ->withData(array(
                    'grant_type' => 'password',
                    'username' => $request->email,
                    'password' => $request->password
                ))
                ->post());
            if (property_exists($response, 'error')) {
                return redirect()->back()
                    ->withInput($request->only($this->username(), 'remember'))
                    ->withErrors(['email' => 'Maaf username/password integra anda tidak ditemukan. Silakan coba lagi, pastikan data yang anda isikan benar.']);
            } else {
                if ($request->tipe == '2') {
                    //DOSEN
                    $response_data = json_decode(Curl::to('https://api.its.ac.id:8243/simpeg/1.0/dosen/' . $request->identifier)
                        ->withContentType('application/json')
                        ->withHeader('Authorization: Bearer ' . $response->access_token)
                        ->get());
                    $response_data = $response_data[0];
                    $response_data->identifier = $response_data->id;
                } else if ($request->tipe == '1') {
                    //MAHASISWA
                    $response_data = json_decode(Curl::to('https://api.its.ac.id:8243/akademik/1.1/mahasiswa/' . $request->identifier)
                        ->withContentType('application/json')
                        ->withHeader('Authorization: Bearer ' . $response->access_token)
                        ->get());
                    $response_data->identifier = $response_data->nrp;
                } else {
                    //TENDIK
                    $response_data = json_decode(Curl::to('https://api.its.ac.id:8243/simpeg/1.0/tendik/' . $request->identifier)
                        ->withContentType('application/json')
                        ->withHeader('Authorization: Bearer ' . $response->access_token)
                        ->get());
                    $response_data = $response_data[0];
                    $response_data->identifier = $response_data->id;
                }

                return view('auth.register_integra', [
                    'data' => $response_data,
                    'message' => 'Verifikasi data pada Integra telah berhasil, silakan melengkapi data dibawah ini!'
                ]);
            }

        }
    }
}
