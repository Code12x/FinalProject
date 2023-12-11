<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'tblPatients';

    protected $primaryKey = 'intPatientId';

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
