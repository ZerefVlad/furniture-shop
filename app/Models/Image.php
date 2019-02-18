<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * @package App\Models
 * @property string model
 * @property string url
 * @property string $title
 * @property string $alt
 * @property int model_id
 */
class Image extends Model
{
    protected $fillable = [
        'title',
        'model',
        'model_id',
        'alt',
        'url',
    ];

    public function models()
    {
        $model = app()->make($this->model);

        return $this->belongsTo($model, 'model_id', 'id');
    }
}
