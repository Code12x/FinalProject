<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roster extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'tblRoster';

    protected $fillable = ['intRosterId', 
                            'dteRosterDate',
                            'intSupervisor',
                            'intDoctor',
                            'intCaregiver1',
                            'intCaregiver2', 
                            'intCaregiver3',
                            'intCaregiver4'];
}
