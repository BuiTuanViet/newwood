@extends('site.layout.site1')

@section('title','Liên hệ')
@section('meta_description', isset($information['meta_description']) ? $information['meta_description'] : '')
@section('keywords', isset($information['meta_keyword']) ? $information['meta_keyword'] : '')

@section('content')
    <div class="breadCrumbs">
        <div class="wrap-content">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="/"><span>Trang chủ</span></a>
                </li>
                <li class="breadcrumb-item active"><a class="text-decoration-none"
                                                      href="/lien-he"><span>Liên hệ</span></a>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrap-main  w-clear">
        <div class="title-main"><span>Liên hệ</span></div>
        <div class="content-main w-clear">
            <div class="top-contact">
                <div class="article-contact">
                    @foreach(\App\Entity\SubPost::showSubPost('dia-chi-footer', 1) as $id => $item)
                        {!! isset($item['content']) ? $item['content'] : '' !!}
                    @endforeach
                </div>
                <form class="form-contact validation-contact" novalidate="" method="POST" id="contactForm"
                      enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{ method_field('POST') }}
                    <div class="row">
                        <div class="input-contact col-sm-6">
                            <input type="text" class="form-control" id="ten" name="name" placeholder="Họ tên"
                                   required="">
                            <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                        </div>
                        <div class="input-contact col-sm-6">
                            <input type="number" class="form-control" id="dienthoai" name="phone"
                                   placeholder="Số điện thoại" required="">
                            <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-contact col-sm-6">
                            <input type="text" class="form-control" id="diachi" name="address" placeholder="Địa chỉ"
                                   required="">
                            <div class="invalid-feedback">Vui lòng nhập địa chỉ</div>
                        </div>
                        <div class="input-contact col-sm-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                   required="">
                            <div class="invalid-feedback">Vui lòng nhập địa chỉ email</div>
                        </div>
                    </div>
                    <div class="input-contact">
                        <input type="text" class="form-control" id="tieude" name="subject" placeholder="Chủ đề"
                               required="">
                        <div class="invalid-feedback">Vui lòng nhập chủ đề</div>
                    </div>
                    <div class="input-contact">
                        <textarea class="form-control" id="noidung" name="message" placeholder="Nội dung"
                                  required=""></textarea>
                        <div class="invalid-feedback">Vui lòng nhập nội dung</div>
                    </div>
                    <button onclick="return contact(this);" type="button" class="btn btn-primary" name="submit-contact">Gửi</button>
                    <input type="reset" class="btn btn-secondary" value="Nhập lại">
                    <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
                </form>
            </div>
            <div class="bottom-contact">
                {!! isset($information['nhung-ban-do']) ? $information['nhung-ban-do'] : '' !!}
            </div>
        </div>
    </div>
    <script>
        function contact(e){
            let form = $('#contactForm');
            var data = $(form).serialize();

            $.ajax({
                type: "POST",
                url: '<?php echo route('sub_contact'); ?>',
                data: data,
                success: function(result){
                    var obj = jQuery.parseJSON( result);
                    // gửi thành công
                    if(obj.status == 500){
                        $('.invalid-feedback').show();
                    }else{
                        // gửi thành công
                        alert(obj.message);
                    }

                    return;
                },
                error: function(error) {
                    alert('Lỗi gì đó đã xảy ra!')
                }
            });
        }
    </script>

@endsection
