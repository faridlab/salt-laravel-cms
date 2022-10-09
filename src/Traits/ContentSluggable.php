<?php

namespace SaltCMS\Traits;

use Illuminate\Support\Str;
use SaltCMS\Models\Contents;

trait ContentSluggable
{
    /**
     * Boot function from Laravel.
     */
    public static function bootContentSluggable() {
        static::creating(function ($model) {
            if(empty($model->slug) && is_null($model->slug)) {
                $model->slug = Str::slug($model->title, '-');
            }

            $count = Contents::where('slug', $model->slug)->count();
            if($count === 0) return;

            $model->slug = $model->slug .'-'. ($count + 1);
        });

        static::updating(function ($model) {
            $count = Contents::where('slug', $model->slug)->count();
            if($count === 0) return;

            $model->slug = $model->slug .'-'. ($count + 1);
        });
    }
}
