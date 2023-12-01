<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'tblUsers';

    protected $primaryKey = 'intUserId';

    protected $fillable = [
        'intUserId',
        'intRoleId',
        'strFirstName',
        'strLastName',
        'strEmail',
        'strPhone',
        'strPassword',
        'dteDateOfBirth',
        'bitApproved',
        'bitDenied',
    ];
}
