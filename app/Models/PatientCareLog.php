<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientCareLog extends Model
{
    public $timestamps = false;

    use HasFactory;
    
    protected $table = 'tblPatientCareLogs';

    protected $primaryKey = 'intLogId';

    protected $fillable = ['intPatientId',
                            'dteLogDate',
                            'bitMorningMed',
                            'bitAfternoonMed',
                            'bitEveningMed',
                            'bitBreakfast',
                            'bitLunch',
                            'bitDinner',
                            'intLogId'];

    public function careLogs(){
        return $this->hasMany(Patient::class, 'intGroup');
    }
}
