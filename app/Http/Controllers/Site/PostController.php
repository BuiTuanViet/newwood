<?php

namespace App\Http\Controllers\Site;

use App\Entity\Category;
use App\Entity\Input;
use App\Entity\Post;
use Illuminate\Support\Facades\Log;

/**
 * Created by PhpStorm.
 * User: Nam Handsome
 * Date: 10/19/2017
 * Time: 9:50 AM
 */
class PostController extends SiteController
{
    public function __construct(){
        parent::__construct();
    }

    public function index($cate_slug, $slug_post) {
        if (!empty($this->domainUser)) {
            if ( strtotime($this->domainUser->end_at) < time() && ($this->emailUser != 'vn3ctran@gmail.com')) {
                return redirect(route('admin_dateline'));
            }
        }

        $post = $this->getPostDetail($slug_post);
        $category = $this->getCategory($post);
        $nextPost = $this->getNextPostDetail($post->post_id);

        if (empty($post->template) or $post->template == 'default'  ) {
           return view('site.default.single', compact('post', 'category', 'nextPost'));
        } else {
            return view('site.template.'.$post->template, compact('post', 'category', 'nextPost'));
        }
    }

    private function getPostDetail($slug_post) {
        try {
            $post = Post::where('slug', $slug_post)
                ->where('post_type', 'post')
                ->first();
            $post->view +=1;
            $post->save();

            $inputs = Input::where('post_id', $post->post_id)->get();
            foreach ($inputs as $input) {
                $post[$input->type_input_slug] = $input->content;
            }

            return $post;
        } catch (\Exception $e) {
            Log::error('http->site->PostController->getPostDetail: lỗi lấy dữ liệu post');

            return null;
        }
    }

    private function getCategory($post) {
        try {
            $category = Category::join('category_post', 'categories.category_id', '=', 'category_post.category_id')
                ->select('categories.*')
                ->where('category_post.post_id', $post->post_id)
                ->first();

            if (empty($category)) {
                $category = Category::first();
            }

            return $category;
        } catch (\Exception $e) {
            Log::error('http->site->PostController->getPostDetail: lỗi lấy dữ liệu post');

            return redirect('/');
        }
    }

    private function getNextPostDetail($id)
    {
        try {
            $postID = Post::where('post_id', ">", $id)
                ->where('post_type', 'post')
                ->min('post_id');

            $post = Post::find($postID);

            $inputs = Input::where('post_id', $post->post_id)->get();
            foreach ($inputs as $input) {
                $post[$input->type_input_slug] = $input->content;
            }

            return $post;
        } catch (\Exception $e) {
            Log::error('http->site->PostController->getPostDetail: lỗi lấy dữ liệu post');

            return null;
        }
    }

}
