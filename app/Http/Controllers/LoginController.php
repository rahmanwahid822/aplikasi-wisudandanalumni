<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{
    public function __construct(){
        $this->user = new User();
    }

    public function index()
    {
        return view('login',[
            'judul' => 'Login'
        ]);
    }
    
    public function autentikasi(Request $request)
    {
        $credentials = $request->validate([
            'nim' => 'required',
            'password' => 'required'
         ]);

         if(Auth::attempt($credentials)) {
            $user = $this->user->select('nama','user_role_id','foto')->where('nim', $request->input('nim'))->first();
            $data = [
                'nim' => $request->input('nim'),
                'nama' => $user->nama,
                'role_id' => $user->user_role_id,
            ];
            $request->session()->regenerate();
            $request->session()->put('user',$data);
            return redirect()->intended('/dashboard');
         }
        return back()->with('loginError','Login Failed!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');

    }
}