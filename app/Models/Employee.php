<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'department_id',
        'speciality',
        'working_days',
        'working_hours',
    ];

    /**
     * Get the department that the employee belongs to.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the appointments for the employee.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Get the receipts issued by the employee.
     */
    // public function issuedReceipts()
    // {
    //     return $this->hasMany(Receipt::class, 'issued_by');
    // }

    /**
     * Get the receipts associated with the employee as a doctor.
     */
    public function doctorReceipts()
    {
        return $this->hasMany(Receipt::class, 'doctor');
    }
}

