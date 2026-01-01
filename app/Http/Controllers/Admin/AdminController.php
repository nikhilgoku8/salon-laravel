<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;

class AdminController extends Controller
{

    public function change_password(){
        return view('admin/change-password');
    }

    public function changePasswordFunction(Request $request){

        $validator = Validator::make($request->all(), [
            'old_password'=>'required',
            'new_password'=>'required'
        ]);
        
        if(!$validator->passes()){
            return response()->json([
                'error' => true,
                'error_type' => 'form',
                'message' => 'Invalid request',
                'errors' => $validator->errors()->toArray(),
            ], 422);

        }else{

            $admin = Admin::find(session('userid'));

            if($admin){

                if (Hash::check($request->old_password, $admin->password)) {

                    $newPassword = Hash::make($request->new_password);
                    // print_r($newPassword);
                    $data = array(
                        'password' => $newPassword,
                    );

                    $admin->update($data);

                    session()->flash('success','Password Changed Successfully');
                    
                    $response = array(
                        'success' => true,
                        'message' => 'Password Changed Successfully'
                    );
                    // return $response;
                }else{
                    $response = array(
                        'error' => true,
                        'error_type' => 'form',
                        'message' => 'Old Password Does Not Match',
                        'errors' => ['old_password'=>'Old Password Does Not Match'],
                    );
                    // return $response;
                }      
            }else{
                $response = array(
                    'error' => true,
                    'error_type' => 'form',
                    'message' => 'User Id Not Found',
                    'errors' => ['old_password'=>'User Id Not Found'],
                );
                // return $response;
            }

            return response()->json($response);

        }

    }
}
