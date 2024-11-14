<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Route extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scheduled_start_date',
        'scheduled_finish_date',
        'start_date',
        'finish_date',
        'driver_id',
        'start_city_id',
        'finish_city_id',
        'vehicle_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'scheduled_start_date' => 'datetime',
        'scheduled_finish_date' => 'datetime',
        'start_date' => 'datetime',
        'finish_date' => 'datetime',
        'driver_id' => 'integer',
        'start_city_id' => 'integer',
        'finish_city_id' => 'integer',
        'vehicle_id' => 'integer',
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function startCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'start_city_id');
    }

    public function finishCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'finish_city_id');
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function incidents(): HasMany
    {
        return $this->hasMany(Incident::class);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }
}
