<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescriptions extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'tblPrescriptions';
<<<<<<< HEAD:app/Models/Prescriptions.php
=======

    protected $primaryKey = 'intPrescriptionId';
>>>>>>> 4f7f6d79d8efa14c4cd00559a98afd7526c8cec3:app/Models/Prescription.php

    protected $fillable = ['intPrescriptionId',
                            'intAppointmentId',
                            'strComment',
                            'strMorning',
                            'strAfternoon',
                            'strNight'];
}
