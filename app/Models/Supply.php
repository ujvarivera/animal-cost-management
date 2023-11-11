<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'suppliable_type',
        'suppliable_id',
        'supply_type',
        'quantity',
        'unit_price',
        'date',
        'animal_id',
        'supplier_id'
    ];

    public function suppliable()
    {
        return $this->morphTo();
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
