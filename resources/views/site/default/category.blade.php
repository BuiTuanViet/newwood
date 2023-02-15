@extends('site.layout.site1')

@section('type_meta', 'website')
@section('title', isset($category['meta_title']) && !empty($category['meta_title']) ? $category['meta_title'] : $category->title)
@section('meta_description',  isset($category['meta_description']) && !empty($category['meta_description']) ? $category['meta_description'] : $category->description)
@section('keywords', isset($category['meta_keyword']) && !empty($category['meta_keyword']) ? $category['meta_keyword'] : '')
@section('meta_image', !empty($category->image) ?  asset($category->image) : $information['logo'] )
@section('meta_url', '/danh-muc/'.$category->slug)

@section('content')
    <div class="wap_1200">
        <div class="row">
        <div class="title-main py-5 m-auto">
            <span>{{ isset($category['title']) ? $category['title'] : ''  }}</span>
        </div>
        <div class="box_item pt-3 mb-5">
            <div class="content-main css_flex_baiviet row-dashed row">
                @if(count($posts) > 0 )
                    @foreach($posts as $id => $item)
                        <div class="col-md-6 item-post {{ ($id +1) % 2 == 0 ? "has-border" : '' }}">
                            <a class="text-decoration-none w-clear"
                               href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $item->slug] ) }}"
                               title="{{ isset($item->title) ? $item->title : '' }}">
                                <p class="pic-news scale-img" style="background: url({{ isset($item['image']) ? $item['image'] : '' }}) no-repeat; background-size: cover; background-position: center; background-repeat: no-repeat">
                                </p>
                                <div class="info-news">
                                    <h3 class="name-news">{{ isset($item->title) ? $item->title : '' }}</h3>
                                    <p class="time-news">Ngày đăng: {{ date("d/m/Y H:i", strtotime($item->updated_at)) }}</p>
                                    <div class="desc-news text-split">
                                        {{ isset($item->description) ? \App\Ultility\Ultility::textLimit($item->description, 20) : '' }}
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach
                        <div class="clear"></div>
                        <div class="pagination-home">
                        <ul class='pagination justify-content-center mb-0'>
                            @if ($posts->lastPage() > 1)
                                <li class='page-item'><a class='page-link' href='{{ $posts->url(1) }}'><i
                                                class="fas fa-caret-left"></i></a></li>
                                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                    <li class='page-item {{ ($posts->currentPage() == $i) ? ' active' : '' }}'><a
                                                class='page-link' href='{{ $posts->url($i) }}'>{{ $i }}</a></li>
                                @endfor
                                <li class='page-item'><a class='page-link'
                                                         href='{{ $posts->url($posts->currentPage()+1) }}'><i
                                                class="fas fa-caret-right"></i></a></li>
                            @endif
                        </ul>
                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        <strong>Không tìm thấy kết quả</strong>
                    </div>
                @endif
            </div>
        </div>
        </div>
    </div>
@endsection

