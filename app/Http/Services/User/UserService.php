<?php

namespace App\Http\Services\User;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // $insert = User::query()->create([
        //     'title' => $request['title'],
        //     'seo' => \Str::slug($request['title']),
        // ]);

        // if(!$insert) return false;

        // return $insert;

        return true;
    }
}
