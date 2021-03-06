<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Discount
 * @package App\Models
 * @property int $value
 * @property int product_id
 */
class Discount extends Model
{
    protected $fillable = [
        'value',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
