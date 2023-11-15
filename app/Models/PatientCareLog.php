<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientCareLog extends Model
{
    use HasFactory;
    protected $PatientCareLog = 'tblPatientCareLog';
    protected $fillable = ['intPatientId',
                            'dteLogDate',
                            'bitMorningMed',
                            'bitAfternoonMed',
                            'bitEveningMed',
                            'bitBreakfast',
                            'bitLunch',
                            'bitDinner'];
}
