<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD:app/Models/Rosters.php
class Rosters extends Model
=======
class Roster extends Model
>>>>>>> 4f7f6d79d8efa14c4cd00559a98afd7526c8cec3:app/Models/Roster.php
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'tblRosters';
<<<<<<< HEAD:app/Models/Rosters.php
=======

    protected $primaryKey = 'intRosterId';
>>>>>>> 4f7f6d79d8efa14c4cd00559a98afd7526c8cec3:app/Models/Roster.php

    protected $fillable = ['intRosterId', 
                            'dteRosterDate',
                            'intSupervisor',
                            'intDoctor',
                            'intCaregiver1',
                            'intCaregiver2', 
                            'intCaregiver3',
                            'intCaregiver4'];
}
