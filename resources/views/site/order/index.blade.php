@extends('site.layout.site')

@section('title','Đặt hàng')
@section('meta_description','')
@section('keywords','')

@section('content')
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h1 class="module-title font-alt">Checkout</h1>
                </div>
            </div>
            <hr class="divider-w pt-20">
            <form action="{{ route('send') }}" class="formCheckOut validate" method="post">
                {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-border checkout-table">
                        <tbody>
                        <tr>
                            <th class="hidden-xs">Item</th>
                            <th>Description</th>
                            <th class="hidden-xs">Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                        @if (empty($orderItems))
                            <p>không có sản phẩm trong giỏ hàng</p>
                        @else
                        @foreach($orderItems as $id => $orderItem)
                            <tr class="{{ isset($orderItem->slug) ? $orderItem->slug : '' }}">
                                <td class="hidden-xs">
                                    <a href="#">
                                        <img src="{{ isset($orderItem->image) ? $orderItem->image : '' }}"
                                             alt="{{ isset($orderItem->title) ? $orderItem->title : '' }}"/></a>
                                </td>
                                <td>
                                    <h5 class="product-title font-alt">{{ isset($orderItem->title) ? $orderItem->title : '' }}</h5>
                                </td>
                                <td class="hidden-xs">
                                    <h5 class="product-title font-alt">{{ isset($orderItem->price) ? number_format($orderItem->price) : 0 }}</h5>
                                    <input type="hidden" name="price" value="{{ isset($orderItem->price) ? $orderItem->price : 0 }}">
                                </td>
                                <td>
                                    <input type="hidden" name="price" value="{{ isset($orderItem->price) ? $orderItem->price : 0 }}">
                                    <input class="form-control" id="{{ isset($orderItem->slug) ? $orderItem->slug : '' }}" onchange="changeQuantity(this)" type="number" name="" value="1" max="50" min="1"/>
                                    <input type="hidden" name="item[{{$orderItem->slug}}][product_id]" value="{{ isset($orderItem->product_id) ? $orderItem->product_id : '' }}">
                                    <input type="hidden" class="input_quantity" name="item[{{$orderItem->slug}}][quantity]" value="1">
                                    <input type="hidden" class="" name="item[{{$orderItem->slug}}][cost]" value="{{ isset($orderItem->price) ? $orderItem->price : 0 }}">
                                    <input type="hidden" name="total_price" value="{{ isset($orderItem->price) ? $orderItem->price : 0 }}">

                                </td>
                                <td>
                                    <h5 class="product-title font-alt total_price ">
                                        {{ isset($orderItem->price) ? number_format($orderItem->price) : 0 }}
                                    </h5>
                                    <input type="hidden" name="total_price" value="{{ isset($orderItem->price) ? $orderItem->price : 0 }}">
                                </td>
                                <td class="pr-remove">
                                    <a class="remove_cart" href="javascript:void(0)" title="Remove"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
{{--                    <div class="form-group">--}}
{{--                        <input class="form-control" type="text" id="" name="" placeholder="Coupon code"/>--}}
{{--                    </div>--}}
                </div>
                <div class="col-sm-3">
{{--                    <div class="form-group">--}}
{{--                        <button class="btn btn-round btn-g" type="submit">Apply</button>--}}
{{--                    </div>--}}
                </div>
                <div class="col-sm-3 col-sm-offset-3">
                    <div class="form-group">
                        <button class="btn btn-block btn-round btn-d pull-right" type="button" onclick="return updateCart()">Update Cart</button>
                    </div>
                </div>
            </div>
            <hr class="divider-w">
            <div class="row mt-70">
                <div class="col-sm-7">
                    <div class="pay">
                        <h3 class="titleV bgorange">THÔNG TIN THANH TOÁN</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" name="ship_name" placeholder="Họ và tên"
                                   value="{{ !empty(old('ship_name')) ? old('ship_name') : '' }}"  required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="ship_phone" placeholder="Điện thoại"
                                   value="{{ !empty(old('ship_phone')) ? old('ship_phone') : '' }}"  required/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="ship_email" placeholder="Email"
                                   value="{{ !empty(old('ship_email')) ? old('ship_email') : '' }}" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="ship_address" required rows="7" placeholder="Địa chỉ nhận hàng">{{ !empty(old('ship_address')) ? old('ship_address') : '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="shop-Cart-totalbox">
                        <h4 class="font-alt">Cart Totals</h4>
                        <table class="table table-striped table-border checkout-table">
                            <tbody>
                            <tr>
                                <th>Cart Subtotal :</th>
                                <td id="total_all">0</td>
                                <input name="total_all" type="hidden" value="0">
                            </tr>
                            <tr>
                                <th>Shipping Total :</th>
                                <td>5,000</td>
                                <input name="ship_fee" type="hidden" value="5000">
                            </tr>
                            <tr class="shop-Cart-totalprice">
                                <th>Total :</th>
                                <td id="total_payment"></td>
                                <input name="total_payment" type="hidden" value="0">
                            </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-lg btn-block btn-round btn-d" type="submit"> Proceed to Checkout </button>

                    </div>
                </div>


            </div>
            </form>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            let totalAll = 0;
            let shipFee =  $('input[name=ship_fee]').val();

            $('input[name=total_price]').each(function(index, value) {
                totalAll += parseInt(value.value);
            });
            let totalAllFomat = numeral( totalAll).format('0,0');
            let totalPayment = parseInt(totalAll) + parseInt(shipFee);
            let totalPaymentFomat = numeral(totalPayment).format('0,0');

            $('#total_all').text(totalAllFomat);
            $('#total_payment').text(totalPaymentFomat);
            $('input[name=total_all]').val(totalAll);
            $('input[name=total_payment]').val(totalPayment);
        })

        function updateCart(){
            let totalAll = 0;
            let shipFee =  $('input[name=ship_fee]').val();

            $('input[name=total_price]').each(function(index, value) {
                totalAll += parseInt(value.value);
            });
            let totalAllFomat = numeral( totalAll).format('0,0');
            let totalPayment = parseInt(totalAll) + parseInt(shipFee);
            let totalPaymentFomat = numeral(totalPayment).format('0,0');


            $('#total_all').text(totalAllFomat);
            $('#total_payment').text(totalPaymentFomat);
            $('input[name=total_all]').val(totalAll);
            $('input[name=total_payment]').val(totalPayment);
        }


        $('.remove_cart').click(function () {
            $(this).parent().parent().remove()
        })
        function changeQuantity(e) {
            let slug = e.id;
            let quantity = e.value;
            let price = $('.'+ slug + (' input[name=price]')).val();
            $('.'+ slug + (' input[name=total_price]')).val();
            $('.'+ slug + (' .input_quantity')).val(quantity);
            let total = quantity * price;
            let totalFomat = numeral( total).format('0,0');
            $('.'+ slug + (' .total_price')).text(totalFomat);
            $('.'+ slug + (' input[name=total_price]')).val(total);
        }

    </script>
@endsection
