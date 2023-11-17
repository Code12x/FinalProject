<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'tblAppoitment';

    protected $fillable = ['intAppointmentId',
                            'intPatientId',
                            'intDoctorId',
                            'dteAppointmentDate'];
}
