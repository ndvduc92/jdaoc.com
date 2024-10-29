<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giftcode extends Model
{
    use HasFactory;

    public const TYPES = [
        'account' => "Theo tài khoản",
        'all' => "Tất cả",
        'vip' => "VIP only"
    ];


    public function users() {
        return $this->hasMany(GiftcodeUser::class);
    }

    public function only_users() {
        return $this->hasMany(GiftcodeOnlyUser::class);
    }

    public function items()
    {
        return $this->hasMany(GiftcodeItem::class);
    }
}
