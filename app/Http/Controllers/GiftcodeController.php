<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Giftcode;
use App\Models\GiftcodeItem;
use App\Models\GiftcodeOnlyUser;
use App\Models\Post;
use App\Models\Mail;
use App\Models\Promotion;
use App\Models\User;
use App\Models\Shop;
use App\Models\Item;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GiftcodeController extends Controller
{
    public function index()
    {
        $giftcodes = Giftcode::with("items")->latest()->get();
        return view("giftcodes.index", ["giftcodes" => $giftcodes]);
    }

    public function create()
    {
        return view("giftcodes.add");
    }

    public function editItems($id)
    {
        return view("giftcodes.edit", ["giftcode" => Giftcode::find($id)]);
    }

    public function editAccounts($id)
    {
        $user_ids = GiftcodeOnlyUser::where("giftcode_id", $id)->get();
        $users = User::whereNotIn("id", GiftcodeOnlyUser::where("giftcode_id", $id)->pluck("user_id"))->orderBy("username")->get();
        return view("giftcodes.accounts", ["giftcode" => Giftcode::find($id), "users" => $users, "user_ids" => $user_ids]);
    }

    public function updateAccounts($id, Request $request)
    {
        $giftcode = Giftcode::find($id);
        $ids = [];
        foreach($request->user_ids as $idx) {
            if (!GiftcodeOnlyUser::where("giftcode_id", $id)->where("user_id", $idx)->first()) {
                array_push($ids, [
                    "giftcode_id" => $id,
                    "user_id" => $idx
                ]);
            }
        }
        GiftcodeOnlyUser::insert($ids);
        return back();
    }

    public function deleteAccount($id, $user_id, Request $request)
    {
        $item = GiftcodeOnlyUser::where("giftcode_id", $id)->where("user_id", $user_id)->first();
        $item->delete();
        return back();
    }

    public function update($id, Request $request)
    {
        $giftcode = Giftcode::find($id);
        $giftcode->giftcode = $request->giftcode;
        $giftcode->type = $request->type;
        $giftcode->viplevel = $request->viplevel;
        $giftcode->expired = $request->expired;
        $giftcode->save();
        return back();
    }

    public function updateItems($id, Request $request)
    {
        $giftcode = Giftcode::find($id);
        $giftcode->items()->delete();
        $items = [];
        foreach ($request->id as $index => $idx) {
            array_push($items, [
                "name" => Item::where("itemid", $request->itemid[$index])->first()->name,
                "itemid" => $request->itemid[$index],
                "quantity" => $request->quantity[$index],
                "bind" => $request->bind[$index],
                "giftcode_id" => $id
            ]);
           

        }
        GiftcodeItem::insert($items);
        return back();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'giftcode' => 'bail|required',
            'expired' => 'bail|required|date|after:today'
        ]);
        if (Giftcode::where("giftcode", $request->giftcode)->first()) {
            return redirect()->back()->with('error', 'Mã giftcode đã tồn tại.');
        }
        $item = new Giftcode;
        $item->giftcode = $request->giftcode;
        $item->type = $request->type;
        $item->viplevel = $request->viplevel;
        $item->expired = $request->expired;
        $item->save();
        return redirect("/giftcodes");
    }
}
