@extends('site.layout.site1')

@section('type_meta', 'website')
@section('title', !empty($post->meta_title) ? $post->meta_title : $post->title)
@section('meta_description', !empty($post->meta_description) ? $post->meta_description : $post->description) @section('keywords', $post->meta_keyword ) @section('meta_image', asset($post->image) )
@section('meta_url', route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) )
@section('meta_image', asset($post->image) ? $post->image : '' )
@section('meta_url', route('post', ['cate_slug' =>  $category->slug, 'post_slug' => $post->slug]) )

@section('content')
    <div class="breadCrumbs">
        <div class="wrap-content">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="http://optuongsaigon.vn/"><span>Trang chủ</span></a>
                </li>
                <li class="breadcrumb-item active">
                    <a class="text-decoration-none"
                       href="{{ route('post', ['cate_slug' =>  $category->slug, 'post_slug' => $post->slug]) }}">
                        <span>{{ isset($post->title) ? $post->title : '' }}</span>
                    </a>
                </li>
            </ol>
        </div>
    </div>

    <div class="w-clear bg-white">
        <div class="wap_1000">
            <div class="title-main"><span>{{ isset($post->title) ? $post->title : '' }}</span></div>
            <div class="time-main"><i
                        class="fas fa-calendar-week"></i><span>Ngày đăng: {{ date("d/m/Y H:i", strtotime($post->updated_at)) }}</span>
            </div>
            <div class="content-main w-clear" id="toc-content">
                {!!  isset($post->content) ? $post->content : '' !!}
            </div>
            <div class="share">
                <b>Chia sẻ:</b>
                <div class="social-plugin w-clear">
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox"></div>
                </div>
            </div>
            <div class="share othernews">
                <b>Bài viết khác:</b>
                <ul class="list-news-other">
                    <li><a class="text-decoration-none"
                           href="{{ route('post', ['cate_slug' =>  $category->slug, 'post_slug' => $post->slug]) }}"
                           title="So sánh sàn gỗ nhựa ngoài trời và sàn gỗ tự nhiên">
                            {{ isset($nextPost->title) ? $nextPost->title : '' }}
                            - {{ isset($nextPost->updated_at) ? date("d/m/Y H:i", strtotime($nextPost->updated_at)) : '' }} </a>
                    </li>
                </ul>
                <div class="pagination-home"></div>
            </div>
        </div>
    </div>
@endsection