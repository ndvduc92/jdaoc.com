<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    public const TYPES = [
        'auto' => "Thanh toán tự động",
        'manual' => "Lệnh tạo bằng tay"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function process_user() {
        return $this->belongsTo(User::class, "processing_user", "id");
    }

    public function processing_by() {
        return $this->belongsTo(User::class, 'processing_user', 'id');
    }
}
