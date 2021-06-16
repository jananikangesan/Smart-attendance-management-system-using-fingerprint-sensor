<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    //
    use Notifiable;

     //
     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'st_id';

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
        'st_name', 'st_regno', 'st_level','st_acyear','st_fid',
    ];
}
