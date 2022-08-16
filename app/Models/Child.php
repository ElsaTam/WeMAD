<?php

namespace App\Models;

trait Child
{
    public static function boot()
    {
        parent::boot();
        static::creating(function($model) {
            $class_path = explode('\\', static::class);
            $model->forceFill(['type' => strtolower(end($class_path))]);
        });
    }
    
    protected static function booted()
    {
        static::addGlobalScope(static::class, function (Builder $builder) {
            $class_path = explode('\\', static::class);
            $builder->where('type', strtolower(end($class_path)));
        });
    }
}