<?php

namespace SaltCMS\Traits;

use Illuminate\Support\Str;
use SaltCMS\Models\Contents;

trait KeySluggable
{
    /**
     * Boot function from Laravel.
     */
    public static function bootKeySluggable() {
        static::creating(function ($model) {
            if(empty($model->key) && is_null($model->key)) {
                $model->key = Str::slug($model->value, '-');
            }

            $count = Contents::where('slug', $model->key)->count();
            if($count === 0) return;

            $model->key = $model->key .'-'. ($count + 1);
        });

        static::updating(function ($model) {
            $count = Contents::where('slug', $model->key)->count();
            if($count === 0) return;

            $model->key = $model->key .'-'. ($count + 1);
        });
    }
}
