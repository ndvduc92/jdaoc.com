<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logging extends Model
{
    use HasFactory;

    public const BOSSES = [
        "25949" => "Tần Quảng",
        "10671" => "Quỷ Điệp Vương",
        "10669" => "Côn Luân Nô",
        "10672" => "Thiên Nhẫn Vương",
        "10673" => "Quỷ Điệp Vương",
        "10674" => "Anh Mộc Vương",
        "10675" => "Âm Dương Vương",
        "10676" => "Phong Hoả Vương",
        "10670" => "An Thổ Vương",

        "10670" => "Kim Cương",
        "10670" => "Thần Hỏa Ma Tổ",
        "10670" => "Cự Hùng Yêu",
        "10670" => "Phệ Huyết Ác Tăng",
        "10670" => "Cô Lâu Tướng Quân",
        "10670" => "Ngư Nhân Chu",
        "10670" => "Hải Đạo Thuyền Trưởng",
        "10670" => "Tê Giáp Chi Vương",
        "10670" => "Tử Trạch Ngư Yêu",
        "10670" => "Vạn Trùng Chi Mẫu",
        "10670" => "Tử Trạch Lệ Quỷ",
        "10670" => "Huyết Sư",
        "10670" => "Huyền Minh Ưu Quỷ"
    ];


    private function getBoss($bossid)
    {
        if (in_array(intval($bossid), array_keys(self::BOSSES))) {
            return self::BOSSES[$bossid];
        }
        return "Không xác định";
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'itemid', 'itemid')->withDefault(["name" => "Không xác định"]);
    }

    public function stone()
    {
        return $this->belongsTo(Item::class, 'refine_stoneid', 'itemid')->withDefault(["name" => "Không xác định"]);
    }

    public function char()
    {
        return $this->belongsTo(Char::class, 'char_id', 'char_id')->withDefault(["name" => "Chưa cập nhật"]);
    }
}
