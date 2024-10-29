<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Wheel extends Model
{

    public const TYPES = [
        'daily' => "Vòng quay hàng ngày",
        'vip' => "Vòng quay dành cho vip",
        'coin' => "Vòng quay tiêu xu"
    ];

    public function items()
    {
        return $this->hasMany(WheelItem::class);
    }
}