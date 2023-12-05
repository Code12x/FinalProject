<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'tblEmployees';

    protected $fillable = ['intEmployeeId',
                            'intUserId',
                            'dmlSalary'];
}