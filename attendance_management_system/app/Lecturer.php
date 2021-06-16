<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lecturer extends Model
{
    use Notifiable;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'lect_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lect_name', 'lect_email', 'position','lect_title',
    ];

    /**
     * Set the position
     *
     */

    public function setPositionAttribute($value)
    {
        $this->attributes['position'] = implode(',',$value);
    }
    
    
    /**
     * Get the position
     *
     */
    // public function getPositionAttribute($value)
    // {
    //     return explode(',',$value);
    // }
}
