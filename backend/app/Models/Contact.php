<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = ['id'];

    public function getPathAttribute(): string
    {
        return asset("/contact/$this->id");
    }

    public function getFullNameAttribute(): string
    {
        return $this->last_name.' '.$this->first_name;
    }

    public function getBirthdayAttribute($value) {
        return $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }
}
