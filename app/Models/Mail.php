<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    public const TYPES = [
        'player' => "Theo nhân vật",
        'all' => "Toàn bộ máy chủ",
        'online' => "Thành viên online"
    ];

    public function char() {
        return $this->belongsTo(Char::class, "char_id", "char_id")->withDefault(['name' => '---', 'char_id' => '---']);
    }

    public function sender() {
        return $this->belongsTo(User::class, 'send_by', 'id');
    }

    public function item() {
        return $this->belongsTo(Item::class, 'itemid', 'itemid')->withDefault(["name" => "Không xác định"]);;
    }
}
