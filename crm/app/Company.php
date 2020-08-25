<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // Companies Table
    protected $table = 'companies';
    // Primary Key
    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'website',
    ];

    //Company has many Employee, One-to-Many Relationship
    public function employees(){

        return $this->hasMany('App\Employee');

    }
}
