<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Wheel;
use App\Models\WheelItem;
use App\Models\WheelUser;
use App\Models\Item;

class WheelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wheels = Wheel::with("items")->get();
        return view("wheels.index", ["wheels" => $wheels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("wheels.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $wheel = new Wheel;
        $wheel->name = $request->name;
        $wheel->type = $request->type;
        $wheel->viplevel = $request->viplevel;
        $wheel->coin_amount = $request->coin_amount;
        $wheel->num_of_times = $request->num_of_times;
        $wheel->status = $request->status;
        $wheel->save();
        return redirect("/wheels");
    }

    public function editItems($id)
    {
        return view("wheels.edit", ["wheel" => Wheel::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $wheel = Wheel::find($id);

        $wheel->name = $request->name;
        $wheel->type = $request->type;
        $wheel->viplevel = $request->viplevel;
        $wheel->coin_amount = $request->coin_amount;
        $wheel->num_of_times = $request->num_of_times;
        $wheel->status = $request->status;
        $wheel->save();
        return back();
    }

    public function updateItems($id, Request $request)
    {
        $wheel = Wheel::find($id);
        $items = [];
        $items = $wheel->items->pluck("id")->toArray();
        foreach($items as $item) {
            if (!in_array(strval($item), $request->id)) {
                WheelItem::find($item)->delete();
            }
        }
        foreach ($request->id as $index => $idx) {
            if ($idx) {
                $it = WheelItem::find($idx);
                $it->name = Item::where("itemid", $request->itemid[$index])->first()->name;
                $it->itemid = $request->itemid[$index];
                $it->quantity = $request->quantity[$index];
                $it->ratio = $request->ratio[$index];
                $it->bind = $request->bind[$index];
                $it->wheel_id = $id;
                $it->save();
            } else {
                $r = new WheelItem;
                $r->name = Item::where("itemid", $request->itemid[$index])->first()->name;
                $r->itemid = $request->itemid[$index];
                $r->quantity = $request->quantity[$index];
                $r->ratio = $request->ratio[$index];
                $r->bind = $request->bind[$index];
                $r->wheel_id = $id;
                $r->save();
            }
           

        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
