<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'middle_name',
        'last_name',
        'date',
        'contact',
        'gender',
        'age',
        'address',
        'procedure_id',
        'description',
        'balance',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime',
        'balance' => 'decimal:2',
    ];

    /**
     * Get the procedure associated with the patient.
     */
    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }

    /**
     * Get the appointments for the patient.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Get the receipts for the patient.
     */
    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

    public function showForm()
    {
        $procedures = Procedure::all();
        return view('patients.form', compact('patients'));
    }
}
