<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\Validators\Post\CreatePostValidator;
use App\Repositories\Validators\Post\UpdatePostValidator;
use App\Services\PostService;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class PostsController extends Controller
{
    /**
     * @var PostService
     */
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;

        $this->postService->setRepository(app(PostRepository::class));
    }

    public function create()
    {
        return view('posts.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        $attributes = $request->only([
            'title',
            'description',
        ]);

        $this->postService
            ->setValidator(app(CreatePostValidator::class))
            ->create($attributes);

        return redirect()->route('posts.create');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, Post $post)
    {
        $attributes = $request->only([
            'title',
            'description',
        ]);

        $validator = app(UpdatePostValidator::class);
        $validator->setPost($post);

        try {
            $this->postService
                ->setValidator($validator)
                ->update($post->id, $attributes);
        } catch (ValidatorException $exception) {
            dd($exception->getMessageBag());
        }

        return redirect()->route('posts.edit', $post->id);
    }
}
