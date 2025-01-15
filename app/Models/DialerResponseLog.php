<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DialerResponseLog extends Model
{
    //
    use HasFactory;

    protected $table = 'tbl_dialer_response_logs';

    protected $fillable = [
        'id',
        'request_id',
        'request_time',
        'status',
        'error_message',
        'data'
    ];
}
