<?php
namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\Post;
use App\Requests\Post\PostEditRequest;
use App\Requests\Post\PostRequest;
use App\Requests\Post\PostDeleteRequest;

class PostController
{
    public $errors;
    public function __construct()
    {
        if (!Auth::check()) {
            redirect("/login");
        }
    }
    public function index()
    {
        $models = Post::all();
        return view('posts/index', 'Posts', ['models' => $models, 'errors' => $this->errors]);
    }
    public function create()
    {
        $post = new PostRequest($_POST);
        if ($post->validate()) {
            Post::create($post->getData());
            redirect('/posts');
        } else {
            $this->errors = $post->errors;
            $this->index();
        }
    }
    public function update()
    {
        $post = new PostEditRequest($_POST);
        if ($post->validate()) {
            $data = $post->getData();

            $id = $data['id'];

            unset($data['id']);
            Post::update($data, $id);
            redirect('/posts');
        } else {
            $this->errors = $post->errors;
            $this->index();
        }
    }

    public function destroy()
    {
        $post = new PostDeleteRequest($_POST);
        if ($post->validate()) {
            $id = $post->getData()['id'];
            Post::delete($id);
            redirect('/posts');
        } else {
            $this->errors = $post->errors;
            $this->index();
        }
    }
}
