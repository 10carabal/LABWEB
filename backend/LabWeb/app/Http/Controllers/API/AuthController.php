<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $cred = [
            "CODIGO" => $request->codigo,
            "CLAVE" => $request->clave,
        ];
        //return $cred;
        $user =  User::where([["codigo","=",$request->codigo]])->first();
        if(empty($user)){
            return response([
                'description' => "unauthorized",
                'message' => 'Error:'
            ], 401);
        }
        if (Hash::check($request->clave, $user->CLAVE)) {
            Auth::login($user);
            //return Auth::user();
            $token = Auth::user()->createToken($request->token_name)->plainTextToken;
            return response()->json([
                'token' => $token,
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'description' => "unauthorized",
            'message' => 'Error'
        ], 401);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new User();
        //$user->name = "$request->name";
        $user->CODIGO = $request->email;
        $user->CLAVE = bcrypt($request->password);
        $user->save();
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
