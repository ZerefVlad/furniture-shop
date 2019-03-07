<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 * @property string $user_data
 * @property string $order_data
 * @property Carbon $created_at
 */
class Order extends Model
{
    protected $guarded = [
        'id',
    ];
    protected $dates = [
        'created_at'
    ];

    public function getUserData()
    {
        return json_decode($this->user_data);
    }

    public function getProducts():?array
    {
        $data = json_decode($this->order_data);
        return $data->products;
    }

    public function getComplexes(): ?array
    {
        $data = json_decode($this->order_data);
        return $data->complexes;
    }

    public function getOrderTotal(): float
    {
        return $this->getUserData()->total;
    }

    public function getCreatedAt()
    {
        return $this->created_at->format('H:i d-m-Y');
    }

    //public function
}

