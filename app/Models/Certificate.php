<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'cert_id',
        'user_id',
        'course_id',
        'issued_on',
        'pdf_path',
        'verified',
    ];
}
