<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance_3G_Student extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attendance_3_g__students';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'course_code',
                  'date',
                  'hours',
                  'hall',
                  'attendance_mark'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'attendance_mark' => 'array'
    ];
    
    /**
     * Get the student for this model.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function student()
    {
        return $this->hasMany('App\Student','st_regno');
    }

    /**
     * Set the date.
     *
     * @param  string  $value
     * @return void
     */
    // public function setDateAttribute($value)
    // {
    //     $this->attributes['date'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    // }

    // /**
    //  * Get date in array format
    //  *
    //  * @param  string  $value
    //  * @return array
    //  */
    // public function getDateAttribute($value)
    // {
    //     return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    // }

}
