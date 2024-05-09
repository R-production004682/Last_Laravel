<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /*NOTE : 最低限持っててほしいカラムを設定。以下カラム情報
    「商品ID」、「顧客ID」、「個数」、「値段」、「出荷(shipped_at)」*/
    protected $fillable = 
    [
        'product_id' ,
        'customer_id',
        'number_of_products',
        'price' ,
        'shipped_at'
    ];

    
    protected $dates = ['shipped_at'];

    //注文 <= 商品 [Many to one]
    public function relationProduct() {
        return $this->belongsTo(Product::class);
    }

    //注文 <= 顧客 [Many to one]
    public function relationCustomer() {
        return $this->belongsTo(Customer::class);
    }
}
