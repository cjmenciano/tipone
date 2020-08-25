<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Employees Table
    protected $table = 'employees';
    // Primary Key
    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'company_id', 'email', 'phone',
    ];
    
    //Employee belongs to Company
    public function company(){

        return $this->belongsTo('App\Company');
        
    }
}
