<?php

namespace Manhle\CartPackage\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primary_key = 'id';
    protected $fillable = ['code', 'status_id', 'price', 'product_id', 'user_id', 'qty'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
