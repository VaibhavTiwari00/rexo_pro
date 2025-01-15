<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_dialer_insert_api_log extends Model
{
    //
    protected $table = 'tbl_dialer_insert_api_logs';

    protected $fillable = ['id', 'ndr_request_id', 'request_payload', 'response_status', 'response_data', 'created_at', 'updated_at'];
}
