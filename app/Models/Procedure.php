<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    // protected $table = 'procedures';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'name',
        'description',
        'amount',
        'status',
    ];

    /**
     * The patients that belong to the procedure.
     */
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    /**
     * The appointments that belong to the procedure.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * The receipts that belong to the procedure.
     */
    public function showForm()
    {
        $procedures = Procedure::all();
        return view('procedures.form', compact('procedures'));
    }

}
