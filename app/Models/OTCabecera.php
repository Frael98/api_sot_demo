<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\OTDetalle;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OTCabecera extends Model
{
    /** @use HasFactory<\Database\Factories\OTCabeceraFactory> */
    use HasFactory;

    protected $fillable = [
        "",
    ];

    /**
     * Get all of the otDetalle for the OTCabecera
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function otDetalle(): HasMany
    {
        return $this->hasMany(OTDetalle::class);
    }
}
