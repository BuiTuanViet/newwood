{{--<div class="link-social">--}}
{{--    <ul class="social social-header">--}}
{{--        @foreach(\App\Entity\SubPost::showSubPost('mang-xa-hoi', 5) as $id => $item)--}}
{{--            <li>--}}
{{--                <a href="{{ isset($item['link']) ? $item['link'] : ''}}" title="{{ isset($item['title']) ? $item['title'] : ''}}"--}}
{{--                   target="_blank"><img src="{{ isset($item['image']) ? $item['image'] : ''}}" alt="">--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
{{--</div>--}}
<div class="header">
    <div class="header-bottom">
        <div class="wrap-content d-flex align-items-center justify-content-between">
            <a class="logo-header" href="/">
                <img class="lazy" data-src="{{ isset($information['logo']) ? $information['logo'] : ''}}"></a>
            <div class="search w-clear">
                <form action="{{ route('search_product') }}" name="search_form" id="search_form" method="get">
                    <input type="text" id="keyword" name="word" placeholder="Nhập từ khóa cần tìm..."
                           value="{{ (!empty($_GET['word'])) ? $_GET['word'] : '' }}">
                    <p style="cursor: pointer" onclick="return $('#search_form').submit()">
                        Tìm kiếm
                    </p>
                </form>
            </div>
            <div class="display-table-cell">
                <ul class="info">
                    <li><i class="fa fa-mobile"></i>Hotline:
                        <b>{{ isset($information['hotline']) ? $information['hotline'] : '' }}</b></li>
                    <li><i class="fa fad fa-envelope"></i>Email:
                        <b>{{ isset($information['email']) ? $information['email'] : '' }}</b></li>
                </ul>
            </div>

            {{--            <a class="hotline-header">--}}
            {{--                <p>Hotline:</p>--}}
            {{--                <span>{{ isset($information['hotline']) ? $information['hotline'] : ''}}</span>--}}
            {{--            </a>--}}
            {{--            <a href="">--}}
            {{--                Email:--}}
            {{--            </a>--}}
        </div>
    </div>

</div>
<div class="menu">
    <div class="wap_1200">
        <div class="row">
            <div class="col-md-3 p-0">
                <ul class="d-flex align-items-center justify-content-between wrap-content menu_desktop">
                    <li class="li_sp">
                        <a class="transition " href="#" title="Danh mục sản phẩm"><h2>Danh mục sản phẩm</h2></a>
                        <ul>
                            @foreach (\App\Entity\Menu::showWithLocation('side-left-menu') as $Mainmenu)
                                @foreach (\App\Entity\MenuElement::showMenuPageArray($Mainmenu->slug) as $id=>$menuelement)
                                    @if (!empty($menuelement['children']))
                                        <li class="has-children">
                                            <span></span>
                                            <a href="{{ $menuelement['url'] }}">
                                                <h2>{{ $menuelement['title_show'] }}
                                                    <i class="fas fa-chevron-right float-right"></i>
                                                </h2>
                                            </a>
                                            <ul>
                                                @foreach ($menuelement['children'] as $elementparent)
                                                    <li>
                                                        <span></span>
                                                        <a href="{{ $elementparent['url'] }}">
                                                            <h2>1{{ $elementparent['title_show'] }}</h2>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li class="no-children">
                                            <span></span>
                                            <a href="{{ $menuelement['url'] }}">
                                                <h2>{{ $menuelement['title_show'] }}</h2>
                                            </a>
                                        </li>
                                        @endif
                                        </li>
                                @endforeach
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 p-0">
                <ul class="d-flex align-items-center justify-content-between wrap-content menu_desktop">
                    @foreach (\App\Entity\Menu::showWithLocation('menu-chinh') as $Mainmenu)
                        @foreach (\App\Entity\MenuElement::showMenuPageArray($Mainmenu->slug) as $id=>$menuelement)
                            <li><a class="transition " href="{{ $menuelement['url'] }}"
                                   title="{{ $menuelement['title_show'] }}"><h2>{{ $menuelement['title_show'] }}</h2>
                                </a></li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>

<div class="wap_1200">
    <div class="row">
        <div class="col-md-3 p-0">
        </div>
        <div class="col-md-9 float-right p-0">
            <div class="slideshow">
                <p class="control-slideshow prev-slideshow transition">
                    <i class="fas fa-chevron-left"></i>
                </p>
                <div class="owl-carousel owl-theme owl-slideshow">
                    @foreach(\App\Entity\SubPost::showSubPost('slide', 5) as $id => $item)
                        <div>
                            <a href="{{ isset($item['link']) ? $item['link'] : '' }}" target="_blank" title="">
                                <img class="lazy"
                                     data-src="{{ isset($item['image']) ? $item['image'] : '' }}"
                                     alt="" title=""></a>
                        </div>
                    @endforeach
                </div>
                <p class="control-slideshow next-slideshow transition">
                    <i class="fas fa-chevron-right"></i>
                </p>
            </div>
        </div>
    </div>
</div>