<?php

namespace App\Models;

use App\Enums\FeeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'is_vending' => 'boolean',
        'is_kronos' => 'boolean',
        'management_fee_type' => FeeType::class,
        'administrative_fee_type' => FeeType::class,
        'support_fee_type' => FeeType::class
    ];

    /**
     * Get the district that owns the unit.
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get the county that owns the unit.
     */
    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }

    /**
     * Get the city that owns the unit.
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the unit type owns the unit.
     */
    public function unitType(): BelongsTo
    {
        return $this->belongsTo(UnitType::class);
    }
}
