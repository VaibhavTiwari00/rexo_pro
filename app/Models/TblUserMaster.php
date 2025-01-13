<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TblUserMaster extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\TblUserMasterFactory> */
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'user_delete'
    ];
    protected $guarded = [];
}
