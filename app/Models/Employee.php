<?php
// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model

{

    protected $table = 'employees';
    protected $fillable = ['first_name', 'last_name', 'gender', 'mobile', 'email', 'company_id', 'status'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
