<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Giftcode;
use App\Models\Post;
use App\Models\Mail;
use App\Models\Promotion;
use App\Models\User;
use App\Models\Shop;
use App\Models\Char;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use hrace009\PerfectWorldAPI\API;

class MailController extends Controller
{
    public function index()
    {
        $mails = Mail::with("char", "item")->latest()->get();
        return view("mail.index", ["mails" => $mails]);
    }

    public function create()
    {
        $users = User::where("role", "member")->orderBy("username")->get();
        $chars = [];
        $userid = "";
        if (request()->userid) {
            $user = User::where("userid", request()->userid)->first();
            if ($user) {
                $chars = $user->chars();
                $userid = request()->userid;
            }
        }
        return view("mail.add", ["users" => $users, "chars" => $chars, "userid" => $userid]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'char_id' => 'bail|required',
            'itemid' => 'bail|required',
            "quantity" => 'bail|required',
        ]);

        try {
            DB::beginTransaction();
            $gameApi = env('GAME_API_ENDPOINT', '');
            $client = new \GuzzleHttp\Client();
            $client->request('POST', $gameApi . '/api/mail.php', ["form_params" => [
                "receiver" => $request->char_id,
                "itemid" => $request->itemid,
                "count" => $request->quantity,
                "proctype"=> $request->bind
            ]]);
            $item = new Mail;
            $item->char_id = $request->char_id;
            $item->receiver = $request->receiver;
            $item->itemid = $request->itemid;
            $item->quantity = $request->quantity;
            $item->description = $request->description;
            $item->send_by = Auth::user()->id;
            $item->save();
            DB::commit();
            return redirect("/mail")->with("success", "Đã gửi tín sứ thành công!");
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return back()->with("error", "Đã có lỗi xảy ra, không thể gửi được!");
        }
    }


    public function createFast()
    {
        $chars = Char::orderBy("char_id")->get();
        return view("mail.add2", ["chars" => $chars]);
    }

    public function storeFast(Request $request)
    {
        $validated = $request->validate([
            'char_id' => 'bail|required|array|min:1',
            'itemid' => 'bail|required',
            "quantity" => 'bail|required',
        ]);

        try {
            DB::beginTransaction();
            foreach ($request->char_id as $char) {
                $gameApi = env('GAME_API_ENDPOINT', '');
                $client = new \GuzzleHttp\Client();
                $client->request('POST', $gameApi . '/api/mail.php', ["form_params" => [
                    "receiver" => $char,
                    "itemid" => $request->itemid,
                    "count" => $request->quantity,
                    "proctype"=> $request->bind
                ]]);
                $item = new Mail;
                $item->char_id = $char;
                $char = Char::where("char_id", $char)->first();
                if (!$char) {
                    return back()->with("error", "Không tồn tại nhân vật với ID ".$char);
                }
                $item->itemid = $request->itemid;
                $item->quantity = $request->quantity;
                $item->description = $request->description;
                $item->send_by = Auth::user()->id;
                $item->save();
            }
            DB::commit();
            return redirect("/mail")->with("success", "Đã gửi tín sứ thành công!");
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return back()->with("error", "Đã có lỗi xảy ra, không thể gửi được!");
        }
    }

    public function createAll()
    {
        $api = new API;
        for ($i=0; $i < 50; $i++) {
            $api->worldChat(1136, $i, $i);
        }
        
        $chars = Char::orderBy("char_id")->get();
        return view("mail.all", ["chars" => $chars]);
    }

    public function storeAll(Request $request)
    {
        $validated = $request->validate([
            'itemid' => 'bail|required',
            "quantity" => 'bail|required'
        ]);
        $api = new API;
        try {
            DB::beginTransaction();
            $type = $request->type;
            if ($type == "all") {
                foreach (Char::all() as $char) {
                    $gameApi = env('GAME_API_ENDPOINT', '');
                    $client = new \GuzzleHttp\Client();
                    $client->request('POST', $gameApi . '/api/mail.php', ["form_params" => [
                        "receiver" => $char->char_id,
                        "itemid" => $request->itemid,
                        "count" => $request->quantity,
                        "proctype"=> 19
                    ]]);
                }

            } else {
                foreach (getOnlineList() as $char) {
                    $gameApi = env('GAME_API_ENDPOINT', '');
                    $client = new \GuzzleHttp\Client();
                    $client->request('POST', $gameApi . '/api/mail.php', ["form_params" => [
                        "receiver" => $char["roleid"],
                        "itemid" => $request->itemid,
                        "count" => $request->quantity,
                        "proctype"=> 19
                    ]]);
                }
            }
            $api->worldChat(1280, "Phần quà nhỏ NPH Hỗn Thế gởi tới tất cả người chơi đang online. Cảm ơn các bạn đã luôn đồng hành cùng chúng tôi", 20);
            
            $item = new Mail;
            $item->type = $type;
            $item->itemid = $request->itemid;
            $item->quantity = $request->quantity;
            $item->description = $request->description;
            $item->send_by = Auth::user()->id;
            $item->save();
            DB::commit();
            return redirect("/mail")->with("success", "Đã gửi tín sứ thành công!");
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return back()->with("error", "Đã có lỗi xảy ra, không thể gửi được!");
        }
    }
}
