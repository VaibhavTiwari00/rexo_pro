<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DialerData extends Model
{
    use HasFactory;

    protected $table = 'tbl_dialer_data';

    protected $fillable = [
        'foreign_id',
        'agent_name',
        'employee_code',
        'crm_duration',
        'call_duration',
        'start_time',
        'end_time',
        'disposition',
        'sub_disposition',
        'remarks',
        'call_recording_url',
    ];
}
