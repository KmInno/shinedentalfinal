<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'issued_by',
        'doctor_id',
        'prescription',
        'balance',
        'discount',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    /**
     * Get the patient associated with the receipt.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get the user who issued the receipt.
     */
    public function issuer()
    {
        return $this->belongsTo(User::class, 'issued_by');
        // return $this->belongsTo(User::class);
    }

    /**
     * Get the doctor associated with the receipt.
     */
    public function doctor()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get the procedures associated with the receipt.
     */
    public function procedures()
    {
        return $this->belongsToMany(Procedure::class)->withPivot('procedure_cost');
    }

    /**
     * Calculate the total charge for the receipt.
     */
    public function balance()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Auto-fill balance when selecting a patient.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($receipt) {
            $receipt->balance = $receipt->patient->balance ?? 0;
        });
    }
}
