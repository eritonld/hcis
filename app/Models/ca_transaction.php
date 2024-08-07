<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ca_transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_ca','no_ca','no_sppd','user_id','unit','contribution_level_code','destination','ca_needs','start_date','end_date','date_required','detail_ca','total_ca','total_real','total_cost','approval_status','approval_sett','approval_extend'
    ];
}
