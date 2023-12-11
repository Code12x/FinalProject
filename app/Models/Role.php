<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'tblRoles';

    protected $primaryKey = 'intRoleId';

    protected $fillable = [
        'intRoleId',
        'strName',
        'intAccessLevel',
    ];
}
