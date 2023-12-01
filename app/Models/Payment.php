<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'tblPayments';

    protected $primaryKey = 'intPaymentId';

    protected $fillable = ['intPaymentId',
                            'intPatientId',
                            'dmlAmount',
                            'dtePaymentDate'];
}
