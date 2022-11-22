<?php

namespace App\Models;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id', 'name', 'phone', 'email', 'address'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}