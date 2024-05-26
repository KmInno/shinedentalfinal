<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'issued_by',
        'doctor_id',
        'prescription',
        'procedure_id',
        'balance',
        'discount',
        'total_cost', // Add total_cost to the fillable attributes
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function issuer()
    {
        return $this->belongsTo(User::class, 'issued_by');
    }

    public function doctor()
    {
        return $this->belongsTo(Employee::class, 'doctor_id');
    }

    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }
}

