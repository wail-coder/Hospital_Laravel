<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        
        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade
        
        // Auth::user();
        // var_dump(Auth::user());

        $user = Auth::user();
        if($user->password_status == 1)
        {
            return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended(config('fortify.home'));
        }
        else
        {
            return redirect()->route('dashboard');
        }
        
    }

}