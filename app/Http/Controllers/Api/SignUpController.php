<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SignUpRequest $request)
    {
        $userData = $request->safe()->only([
            'first_name',
            'last_name',
            'email'
        ]);

        $user = User::create($userData);


        return response()->json(
            new UserResource($user)
        );
    }
}
