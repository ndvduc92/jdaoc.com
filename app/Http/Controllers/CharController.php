<?php

namespace App\Http\Controllers;

use App\Models\Char;

class CharController extends Controller
{
    public function delete($id)
    {
        $char = Char::find($id);
        $char->delete();
        return back();
    }

    public function index()
    {
        $chars = Char::with("user")->get();
        return view("chars.index", ["chars" => $chars]);
    }
}
