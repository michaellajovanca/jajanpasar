<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\verifyMail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json($users,200);
    }

    // login
    public function login(Request $request)
    {
      $user = User::where('email',$request->email)->first();

      if($user){
          if($request->password = $user->password){
                $token = $user->CreateToken('Laravel Password Grant Client')->accessToken;
                // $response = ['token' => $token];
                $response = [
                  'user' => $user,
                  'token' => $token,
                ];
              return response()->json($response, 200);
          }else{
              $response = 'Password mismatch';
              return response($response, 422);
          }
      }else{
          $response = 'User doesnt exist';
          return response($response, 422);
      }

        // $credentials = [
        //     'email' => $request->get('email'),
        //     'password' => $request->get('password')
        // ];

        // if (Auth::attempt($credentials)) {
        //     $status = 200;
        //     $response = [
        //         'user' => Auth::user(),
        //         'token' => Auth::user()->createToken('jajanpasar')->accessToken,
        //     ];
        // }

        // return response()->json($response, $status);
    }

    // register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'username' => 'required|max:50',
            'password' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        $data = $request->only(['name', 'username', 'email', 'password']);
        $data['password'] = bcrypt($data['password']); 

        $user = User::create($data);
        $user->is_admin = 0;
        
        //Mail::to($user->email)->send(new VerifyMail($user));

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('jajanpasar')->accessToken,
        ]);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(!is_null($request->name)){
            $user->name = $request->name;
        }

        if(!is_null($request->username)){
            $user->username = $request->username;
        }

        $success = $user->save();
        if(!$success){
            return response()->json('Error Updating',500);
        }else   
            return response()->json('Success',200);
    }

    public function destroy($id)
    {
        try {

            $user= User::find($id);
            $produk->delete();
            return response()->json('Success',201);

        } catch (\Exception $e) {
            return response()->json($e,400);
        }
    }

}
