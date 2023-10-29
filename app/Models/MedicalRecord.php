<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'examination_date',
        'next_examination',
        // 'total_cost',
        'animal_id',
        'vet_id'
    ];

    public function vet() {
        return $this->belongsTo(Vet::class);
    }

    public function animal() {
        return $this->belongsTo(Animal::class);
    }

    public function lines() {
        return $this->hasMany(MedicalRecordLine::class);
    }
}
