<?php

namespace App\Services;

class PostService extends AbstractService
{
    public function beforeCreate(array $attributes)
    {
        $attributes['short_description'] = mb_substr($attributes['description'], 0, 30);
        $attributes['created_by_user_id'] = auth()->user()->id;

        return $attributes;
    }

    public function beforeUpdate(array $attributes)
    {
        $attributes['short_description'] = mb_substr($attributes['description'], 0, 30);

        return $attributes;
    }
}
