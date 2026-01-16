<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class LoginController extends Controller
{

    public function dashboard(Request $request){
        return view('admin/dashboard');
    }

    public function register(){
        $data = array(
            'fname' => 'Admin',
            // 'email' => 'admin@gmail.com',
            // 'password' => Hash::make('password'),
            'email' => 'admin@thesalononwheels.com',
            'password' => Hash::make('4A7zo2WNkoFb'),
            'role' => 'superadmin'
        );
        Admin::create($data);
    }

    public function login(){
        return view('admin/login');
    }

    public function authenticate(Request $request){

        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json([
                'message' => 'Invalid email or password',
            ], 401);
        }

        // Success
        $admin->update(['last_login' => now()]);
        
        $request->session()->put('username', $admin->fname);
        $request->session()->put('userid', $admin->id);
        $request->session()->put('isAdmin', 'yes');
        $request->session()->put('last_login', $admin->last_login ?? now());

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
        ]);

    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('owm/login');
    }
}
