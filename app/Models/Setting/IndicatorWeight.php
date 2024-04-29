<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicatorWeight extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->createdAt = $model->freshTimestamp();
            $model->createdBy = auth()->check() ? session('name') : "System";
        });

        static::updating(function ($model) {
            $model->updatedAt = $model->freshTimestamp();
            $model->updatedBy = auth()->check() ? session('name') : "System";
        });
    }
}
