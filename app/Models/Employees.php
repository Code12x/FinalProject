<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $Employees = 'tblEmployees';
    protected $fillable = ['intEmployeeId',
                            'intUserId',
                            'dmlSalary'];
}
