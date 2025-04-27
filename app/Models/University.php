<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable=[
        'name',
        'location',
    ];
    public function facultets()
    {
        return $this->hasMany(Fakultet::class,'universitet_id');
    }
}
