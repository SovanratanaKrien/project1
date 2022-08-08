<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    //Table name
    protected $table = 'staffs';
    // primary key
    public $primaryKey = 'id';
    // TimeStamps
    public $timestamps = true;

    protected $fillable = [
        'name',
        'image',
        'fname',
        'lname',
        'phone_number',
        'gender',
        'email',
        'dob',
        'detail'
    ];

}
