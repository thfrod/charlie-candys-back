<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //
    use HttpResponses;


    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return $this->response(
                Response::$statusTexts[Response::HTTP_OK],
                Response::HTTP_OK,
                ['token' => $request->user()->createToken('charlie-candys')->plainTextToken]
            );
        } else {
            return $this->response(Response::$statusTexts[Response::HTTP_FORBIDDEN], Response::HTTP_FORBIDDEN);
        }
    }

    public function logout() {}
}
