<div class="menu_mobi_add"></div>
<div class="menu_mobi">
    <p class="menu_baophu"></p>
    <p class="icon_menu_mobi"><i class="fas fa-bars"></i></p>
    <a class="logo-mobi" href=""><img class="lazy"
                                      data-src="{{ isset($information['logo']) ? $information['logo'] : ''}}"></a>
    <div class="search-res">
        <p class="icon-search transition"><i class="fa fa-search"></i></p>
        <div class="search-grid w-clear">
            <input type="text" name="keyword2" id="keyword2" placeholder="Nhập từ khóa cần tìm..."
                   onkeypress="doEnter(event,'keyword2');">
            <p onclick="onSearch('keyword2');"><i class="fa fa-search"></i></p>
        </div>
    </div>
</div>