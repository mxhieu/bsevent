<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'status';
    
    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
