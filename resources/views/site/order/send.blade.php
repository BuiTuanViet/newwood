@extends('site.layout.site')

@section('title','Gửi đơn hàng thành công')
@section('meta_description','')
@section('keywords','')

@section('content')
    <style>
        section.orderPay
        {
        }
        section.orderPay h1
        {
            font-size: 24px;
            padding: 25px 0px;
            display: block;
        }
        section.orderPay  .pay h3.titleV
        {
            text-align: center;
        }
        section.orderPay  .pay h3.titleV i
        {
            padding-right: 5px;
        }
        section.orderPay .pay button
        {
            background: none;
            box-shadow: none;
            border: 1px solid #ccc;
            font-size: 16px;
            border-radius: 6px;
            padding: 7px 24px;
        }
        section.orderPay a
        {
            color: #000;
            text-decoration: none;
        }
        section.orderPay form
        {
            width: 100%;
        }
        section.orderPay form .nextpr
        {
            border: 1px dotted #ccc;
            padding: 2px 5px;
            font-size: 14px;
            display: inline-block;
        }
        .table-striped tbody tr:nth-of-type(odd)
        {
            background: none;
        }
        section.orderPay form .total
        {
            color: red;
        }
        section.orderPay form .content h3 a
        {

            font-size: 20px;
        }
        section.orderPay form .price
        {
            font-size: 14px;
        }
        section.orderPay form .price del
        {
            padding-right: 15px;
        }
    </style>
        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h4 class="font-alt mb-0 text-center">Đơn hàng <span class="text-danger">{{ $orderId }}</span> đã được ghi nhận.</h4>
                        <hr class="divider-w mt-10 mb-20">
                        <h4 class="font-alt">Thông tin thanh toán</h4>
                        <p>Quý khách vui lòng chuyển khoản với nội dung:
                            <span style="color: red">( Thanh toán đơn hàng {{ $orderId }} )</span>
                        </p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Ngân hàng</th>
                                <th>Chủ tài khoản</th>
                                <th>Số tài khoản</th>
                                <th>Chi nhánh</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Entity\OrderBank::getAllBank() as $id => $orderBank)
                                <tr>
                                    <td>
                                        {{ $orderBank->name_bank }}
                                    </td>
                                    <td>
                                        {{ $orderBank->manager_account }}
                                    </td>
                                    <td>
                                        {{ $orderBank->number_bank }}
                                    </td>
                                    <td class="totalPrice">
                                        {{ $orderBank->branch }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a href="/" class="btn btn-success">
                            Quay về trang chủ
                        </a>
                </div>
            </div>
    </section>
@endsection
