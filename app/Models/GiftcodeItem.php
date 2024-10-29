<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftcodeItem extends Model
{
    use HasFactory;

    public function giftcode()
    {
        return $this->belongsTo(Giftcode::class);
    }

    public function item() {
        return $this->belongsTo(Item::class, 'itemid', 'itemid')->withDefault(["name" => "Không xác định"]);;
    }
}
