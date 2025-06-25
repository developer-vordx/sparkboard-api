<?php

namespace App\Services\Api\V1\Auth;


use App\Contracts\Api\V1\Auth\SignUpInterface;
use App\Exceptions\ApiException;
use App\Mail\WelcomeMail;
use App\Models\User;
use App\Utils\BaseService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTAuth;


class SignUpService extends  BaseService  implements SignUpInterface
{
    public function handle($request)
    {
        try {
            $user = User::create([
                'username' =>  $request['username'],
                'name' => $request['name'] ?? 'N/A',
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            $token = JWTAuth::fromUser($user);
            $data = [
                'user' => $user,
                'token' => $token,
            ];

            Mail::to($user->email)->send(new WelcomeMail($user->name));

            return success('user created', $data, 201);

        } catch (ApiException $exception) {

            $this->logException($exception);
            return errors($exception->getMessage(), $exception->getCode(),500);
        }
    }
}
