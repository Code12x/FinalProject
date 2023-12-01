<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'tblAppointments';
<<<<<<< HEAD:app/Models/Appointments.php
=======

    protected $primaryKey = 'intAppointmentId';
>>>>>>> 4f7f6d79d8efa14c4cd00559a98afd7526c8cec3:app/Models/Appointment.php

    protected $fillable = ['intAppointmentId',
                            'intPatientId',
                            'intDoctorId',
                            'dteAppointmentDate'];
}
