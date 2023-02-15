@extends('site.layout.site1')

@section('type_meta', 'article')
@section('title', isset($product->meta_title) ? $product->meta_title : $product->title )
@section('meta_description',  !empty($product->meta_description) ? $product->meta_description : $product->description)
@section('keywords', $product->meta_keyword)
@section('meta_image', !empty($product->image) ? asset($product->image) : $information['logo'] )
@section('meta_url', route('product', [ 'post_slug' => $product->slug]) )

@section('content')
    <div class="breadCrumbs">
        <div class="wrap-content">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none" href=""><span>Trang chủ</span></a></li>
                <li class="breadcrumb-item ">
                    <a class="text-decoration-none" href="{{ route('product', [ 'post_slug' => $product->slug]) }}">
                        <span>{{ $product->title }}</span>
                    </a>
                </li>

            </ol>
        </div>
    </div>

    <div class="wrapper clearfix pt-5 bg-white">
        <div class="block block-two-col wap_1200">
            <div class="row">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 block-col-main">
                    <div class="block-title-commom block-detail">
                        <div class="block-content">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="block block-slide-detail">
                                        <!-- Place somewhere in the <body> of your page -->
                                        <img style="margin:auto;"
                                             src="{{ $product->image }}"
                                             alt="{{ $product->title }}"/>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="block-page-common clearfix">
                                        <div class="block-title"><h1 class="title-sp-view">{{ $product->title }}</h1></div>
                                        <div class="block-content">
                                            <div class="block block-product-options clearfix">
                                                <div class="bl-modul-cm">

                                                </div>
                                                <div class="bl-modul-cm block-editor-content">
                                                    {!! $product->properties !!}
                                                    <br/>
                                                </div>
                                                <div class="bl-modul-cm block-btn-addtocart">
                                                    <a href="/lien-he"
                                                       class="btn btn-order-contact">LIÊN HỆ</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block block-page-common block-title-cm clearfix">
                        <div class="block-title"><h2 class="fs18">Thông tin chi tiết</h2></div>
                        <div class="block-content block-editor-content">
                            {!! $product->content !!}
                        </div>
                    </div>
                    <div class="block-page-common block-title-cm clearfix block-related mb-5">
                        <div class="block-content">
                            <div class="block-title">
                                <h2 class="fs18">Sản Phẩm khác</h2></div>
                            <div class="box_sp1 row">
                                @foreach(\App\Entity\Product::showAllProduct(4) as $id => $item)
                                    <div class="col-md-3">
                                        <div class="box-product">
                                            <a class="productc1 text-decoration-none w-clear"
                                               href="{{ route('product', ['slug' => $item->slug]) }}"
                                               title="{{ isset($item['title']) ? $item['title'] : '' }}">
                                                <p class="pic-productc1 scale-img">
                                                    <img
                                                            src="{{ isset($item['image']) ? $item['image'] : '' }}"
                                                            alt="{{ isset($item['title']) ? $item['title'] : '' }}">
                                                </p>
                                                <div class="description">
                                                    <h3 class="name-productc1 text-split">{{ isset($item['title']) ? $item['title'] : '' }}</h3>
                                                    <span class="view-productc1">
                                                        Chi tiết
                                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                    </span>

                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 block-col-sidebar">
                    <div class="block-sidebar">
                        <div class="block-module block-links-sidebar">
                            <div class="block-title">
                                <h2><i class="fa fa-newspaper-o"></i> Tin khuyến mãi</h2>
                            </div>
                            <div class="block-content">
                                <ul class="list">
                                        @foreach(\App\Entity\Post::newPost('khuyen-mai', 5) as $item)
                                    <li>
                                        <a href="{{ route('post', ['cateSlug' => 'khuyen-mai', 'slug' => $item->slug]) }}"
                                           title="{{ isset($item['title']) ? $item['title'] : '' }}">
                                            <p class="thumb">
                                                <img src="{{ isset($item['image']) ? $item['image'] : '' }}"
                                                     alt="{{ isset($item['title']) ? $item['title'] : '' }}">
                                            </p>
                                            <h3>{{ isset($item['title']) ? $item['title'] : '' }}</h3>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="block-sidebar block-sidebar-contact-info">
                        <div class="block-module block-links-sidebar">
                            <div class="block-title">
                                <h2><i class="fa fa-newspaper-o"></i> Hỗ trợ trực tuyến</h2>
                            </div>
                            <div class="block-content clearfix">
                                <div class="item">
                                    <div class="content">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <b>Tư vấn kỹ thuật - Kinh doanh</b>
                                        Phone: <span class="txt-number">{{ isset($information['hotline']) ? $information['hotline'] : '' }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection