@extends('site.layout.site')

@section('title', 'Đối tác')
@section('meta_description', isset($information['meta_description']) ? $information['meta_description'] : '')
@section('keywords', isset($information['meta_keyword']) ? $information['meta_keyword'] : '')

@section('content')
    <div class="wrap-main  w-clear"><div class="title-main"><span>Đối tác</span></div>
        <div class="box_dtac">
            @foreach(\App\Entity\SubPost::showSubPost('doi-tac', 10) as $id => $item)
                    <a class="partner text-decoration-none" href="" target="_blank" title="">
                        <img src="{{ isset($item['image']) ? $item['image'] : '' }}" alt="">
                    </a>
            @endforeach
        </div>
        <div class="content-main w-clear"></div>
        <div class="share">
            <b>Chia sẻ:</b>
            <div class="social-plugin w-clear">
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            </div>
        </div></div>


@endsection
