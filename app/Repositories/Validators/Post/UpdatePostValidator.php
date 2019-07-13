<?php

namespace App\Repositories\Validators\Post;

use App\Models\Post;
use Prettus\Validator\LaravelValidator;

/**
 * Class UpdatePostValidator.
 *
 * @package namespace App\Repositories\Validators\Post;
 */
class UpdatePostValidator extends LaravelValidator
{
    /**
     * @var Post
     */
    protected $post;

    /**
     * @param Post $post
     * @return $this
     */
    public function setPost(Post $post)
    {
        $this->post = $post;

        return $this;
    }

    public function getRules($action = null)
    {
        $this->rules = [
            'title' => 'required|max:255|not_in:'.$this->post->title,
            'description' => 'required|max:30000',
        ];

        return parent::getRules($action);
    }
}
