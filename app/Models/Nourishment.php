<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nourishment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'product_code',
        'value',
        'unit'
    ];

    public function supplies()
    {
        return $this->morphMany(Supply::class, 'suppliable');
    }
}
