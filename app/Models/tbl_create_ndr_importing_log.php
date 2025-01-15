<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_create_ndr_importing_log extends Model
{
    //
    protected $fillable = ['file_name', 'file_size', 'entries_fetched', 'error_log'];
}
