<div class="footer">
    <div class="footer-article">
        <div class="wap_footer">
            <div class="footer-left">
                <div class="footer-news" id="main_footer">

                    <div class="info-footer">
                        @foreach(\App\Entity\SubPost::showSubPost('dia-chi-footer', 1) as $id => $item)
                            {!! isset($item['content']) ? $item['content'] : '' !!}
                        @endforeach
                    </div>
                    <ul class="social social-footer">
                        <span>Mạng xã hội: </span>
                        @foreach(\App\Entity\SubPost::showSubPost('mang-xa-hoi', 5) as $id => $item)
                            <li>
                                <a href="{{ isset($item['link']) ? $item['link'] : ''}}" title="{{ isset($item['title']) ? $item['title'] : ''}}"
                                   target="_blank"><img src="{{ isset($item['anh-footer']) ? $item['anh-footer'] : ''}}" alt="">
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>

                <div class="footer-news">
                    <p class="title-footer">Fanpage facebook</p>
                    <div id="fanpage-facebook">
                        {!! isset($information['nhung-fanpage']) ? $information['nhung-fanpage'] : ''  !!}
                </div>
            </div>
            </div>

            <div class="footer-right p-3">
                <div id="footer-map">
                    {!! isset($information['nhung-ban-do']) ? $information['nhung-ban-do'] : '' !!}
                </div>
            </div>
    </div>
    <div class="footer-powered">
        <div class="wrap-content d-flex align-items-center justify-content-between">
            <p class="copyright">{{ isset($information['coppy-right']) ? $information['coppy-right'] : ''}}</p>
        </div>
    </div>
    <div id="messages-facebook">
        <!-- Your Plugin chat code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>
    </div>
</div>
</div>
