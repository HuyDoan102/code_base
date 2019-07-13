<?php

namespace App\Repositories\Validators\Post;

use Prettus\Validator\LaravelValidator;

/**
 * Class CreatePostValidator.
 *
 * @package namespace App\Repositories\Validators\Post;
 */
class CreatePostValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        'title' => 'required|max:255',
        'description' => 'required|max:30000',
    ];
}
