<div class="header">
    <div class="header-bottom">
        <div class="wrap-content d-flex align-items-center justify-content-between">
            <a class="logo-header" href="/">
                <img class="lazy" data-src="{{ isset($information['logo']) ? $information['logo'] : ''}}"></a>
            <div class="search w-clear">
                <form action="{{ route('search_product') }}" name="search_form" id="search_form" method="get">
                    <input type="text" id="keyword" name="word" placeholder="Nhập từ khóa cần tìm..." value="{{ (!empty($_GET['word'])) ? $_GET['word'] : '' }}">
                    <p style="cursor: pointer" onclick="return $('#search_form').submit()">
                        Tìm kiếm
                    </p>
                </form>
            </div>
            <a class="hotline-header">
                <p>Hotline:</p>
                <span>{{ isset($information['hotline']) ? $information['hotline'] : ''}}</span>
            </a>
            <ul class="social social-header">
                <span>Mạng xã hội: </span>
                @foreach(\App\Entity\SubPost::showSubPost('mang-xa-hoi', 5) as $id => $item)
                    <li>
                        <a href="{{ isset($item['link']) ? $item['link'] : ''}}" title="{{ isset($item['title']) ? $item['title'] : ''}}"
                           target="_blank"><img src="{{ isset($item['image']) ? $item['image'] : ''}}" alt="">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
<div class="menu">
    <div class="flex-menu">
        <ul class="d-flex align-items-center justify-content-between wrap-content menu_desktop">
            <li class="li_sp">
                <a class="transition " href="#" title="Danh mục sản phẩm"><h2>Danh mục sản phẩm</h2></a>
                <ul>
                    @foreach (\App\Entity\Menu::showWithLocation('side-left-menu') as $Mainmenu)
                        @foreach (\App\Entity\MenuElement::showMenuPageArray($Mainmenu->slug) as $id=>$menuelement)
                            @if (!empty($menuelement['children']))
                                <li><span></span>
                                    <a href="{{ $menuelement['url'] }}">
                                        <h2>{{ $menuelement['title_show'] }}</h2>
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
                                <li>
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
            @foreach (\App\Entity\Menu::showWithLocation('menu-chinh') as $Mainmenu)
                @foreach (\App\Entity\MenuElement::showMenuPageArray($Mainmenu->slug) as $id=>$menuelement)
                    <li><a class="transition " href="{{ $menuelement['url'] }}" title="{{ $menuelement['title_show'] }}"><h2>{{ $menuelement['title_show'] }}</h2></a></li>
                @endforeach
            @endforeach
        </ul>
    </div>
</div>