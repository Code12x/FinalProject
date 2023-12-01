<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'tblAppointments';

    protected $fillable = ['intAppointmentId',
                            'intPatientId',
                            'intDoctorId',
                            'dteAppointmentDate'];
}
