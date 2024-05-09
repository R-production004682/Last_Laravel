<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    //NOTE : 複数代入の脆弱性対策として、$fillableを採用
    protected $fillable = ['name' , 'price'];

    //商品 => 注文 [One to Meny]
    public function relationOrder() {
        return $this->hasMany(Order::class);
    }
}
