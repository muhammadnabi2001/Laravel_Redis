<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultet extends Model
{
    protected $fillable=[
        'name',
        'universitet_id'
    ];
    public function universitet()
    {
        return $this->belongsTo(University::class,'universitet_id');
    }
}
