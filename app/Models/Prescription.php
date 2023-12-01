<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'tblPrescriptions';

    protected $primaryKey = 'intPrescriptionId';

    protected $fillable = ['intPrescriptionId',
                            'intAppointmentId',
                            'strComment',
                            'strMorning',
                            'strAfternoon',
                            'strNight'];
}
