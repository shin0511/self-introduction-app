<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Introduction extends Model
{
    use HasFactory;

    /**
     * 自己紹介に関連しているユーザーの取得
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

}
