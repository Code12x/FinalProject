<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'tblPatients';

    protected $fillable = [
        'intPatientId',
        'intUserId',
        'strFamilyCode',
        'strEmergencyContactPhone',
        'strEmergencyContactRelation',
        'intGroup',
        'dteAdmissionDate',
    ];
}
