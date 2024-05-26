<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'description',
        // 'time',
        'status',
        'employee_id',
        'procedure_id',
    ];
    protected $dates = ['time'];


    /**
     * Get the patient associated with the appointment.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get the employee associated with the appointment.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get the procedure associated with the appointment.
     */
    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }
}

