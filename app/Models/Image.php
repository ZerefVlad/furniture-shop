<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * @package App\Models
 * @var string title
 * @var string alt
 * @var string filename
 */
class Image extends Model
{
    protected $fillable = [
        'title',
        'alt',
        'filename',
        'file_location',
        'url'
    ];
}
