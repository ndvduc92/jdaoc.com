<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where("role", "member")->whereNotNull("main_id")->latest()->get();
        if (request()->type == "all") {
            $users = User::where("role", "member")->latest()->get();
        }
        return view("users.index", ["users" => $users]);
    }

    public function login($id)
    {
        $token = substr(md5(mt_rand()), 0, 32);
        $user = User::find($id);
        $user->admin_login_token = $token;
        $user->save();
        return \Redirect::to("https://id.trutienhonthe.com/dang-nhap?token=" . $token);
    }

    public function edit($id)
    {
        $deposits = Deposit::where("user_id", $id)->latest()->get();
        $user = User::find($id);
        if (!$user) {
            $user = User::where("username", $id)->first();
        }
        return view("users.edit", ["user" => $user, "deposits" => $deposits]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'phone' => 'bail',
            'balance' => 'bail|required',
        ]);
        $user = User::find($id);
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->balance_free = $request->balance_free;
        $user->rank = $request->rank;
        $user->save();
        return back();
    }
}
