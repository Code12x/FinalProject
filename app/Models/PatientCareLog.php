<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientCareLog extends Model
{
    public $timestamps = false;

    use HasFactory;
    
    protected $table = 'tblPatientCareLogs';

    protected $fillable = ['intPatientId',
                            'dteLogDate',
                            'bitMorningMed',
                            'bitAfternoonMed',
                            'bitEveningMed',
                            'bitBreakfast',
                            'bitLunch',
                            'bitDinner'];
}
