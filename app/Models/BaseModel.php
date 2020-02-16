<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{   
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // public $timestamps = true;

    /**
     * Get active data from table
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where($this->table . ".is_deleted", config('constants.NOT_DELETED_FLAG'));
    }

    protected $dates = [
    'created_at',
    'updated_at'
    ];
}
