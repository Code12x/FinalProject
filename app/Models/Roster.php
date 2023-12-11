<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'tblRosters';

    protected $primaryKey = 'intRosterId';

    protected $fillable = ['intRosterId', 
                            'dteRosterDate',
                            'intSupervisor',
                            'intDoctor',
                            'intCaregiver1',
                            'intCaregiver2', 
                            'intCaregiver3',
                            'intCaregiver4'];
}
