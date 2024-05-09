<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    //NOTE : 複数代入の脆弱性対策として、$fillableを採用
    protected $fillable = ['name'];

    //顧客 => 注文 [One to Many]
    public function relationOrder() {
        return $this->hasMany(Order::class);
    }
}
