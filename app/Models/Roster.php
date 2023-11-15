<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roster extends Model
{
    use HasFactory;
    protected $Roster = 'tblRoster';
    protected $fillable = ['intRosterId', 
                            'dteRosterDate',
                            'intSupervisor',
                            'intDoctor',
                            'intCaregiver1',
                            'intCaregiver2', 
                            'intCaregiver3',
                            'intCaregiver4'];
}
