<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getUser(): ?User
    {
        if (User::find($this->user_track)->exists()) {
            return User::find($this->user_track);
        }

        return null;
    }
}
