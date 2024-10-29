<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public function item() {
        return $this->belongsTo(Item::class, 'itemid', 'itemid')->withDefault(["name" => "Không xác định"]);;
    }
}
