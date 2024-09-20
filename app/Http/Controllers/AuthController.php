<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    use HttpResponses;


    public function login(Request $request)
    {
        $user = User::where('USUARIO_EMAIL', $request->email)->first();

        if ($user && Hash::check($request->password, $user->USUARIO_SENHA)) {

            $token = Hash::make(env('HASH_PASSOWRD') . $user->USUARIO_ID);

            $response = [
                'token' => $token,
            ];
            return $this->response(
                Response::$statusTexts[Response::HTTP_OK],
                Response::HTTP_OK,
                $response
            );
        } else {
            return $this->response(Response::$statusTexts[Response::HTTP_FORBIDDEN], Response::HTTP_FORBIDDEN);
        }
    }

    public function logout() {}
}
