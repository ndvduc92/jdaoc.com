<?php

namespace App\Http\Controllers;

use App\Models\Logging;
use App\Models\Trade;
use hrace009\PerfectWorldAPI\API;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $onlines = [];
        $trades = [];
        $refines = [];
        $api = new API;
        if (request()->type == "online") {
            $onlines = getOnlines();
        }
        if (request()->type == "refine") {
            $trades = Logging::with("item", "stone", "char")->where("type", "refine")->get();
        }
        if (request()->type == "trade") {
            $trades = Trade::with("items")->get();
        }
        return view("tools.index", compact("onlines", "trades", "refines"));
    }

    public function fetch()
    {
        $type = request()->type;
        switch ($type) {
            case 'online':
                # code...
                break;
            case 'refine':
                $this->callIdApi("GET", "/trades", []);
                break;
            case 'trade':
                $this->callIdApi("GET", "/trades", []);
                break;
            default:
                # code...
                break;
        }
        return redirect("/tools?type=".$type);
    }
}
