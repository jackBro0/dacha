@extends('admin.main')

@section('content')
    <div class="main">

        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            {{--        @include('admin.templates.topbar')--}}
            <!--user image-->
            <div class="user">
                <img src="/assets/img/user.png" alt="">
            </div>
        </div>

        <!-- cards -->
        @include('admin.templates.cards')
        <div class="details">
            <!-- data list -->
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>@lang('main.recent_orders')</h2>
                    <a href="{{ route('order.index') }}" class="btn">@lang('main.view_all')</a>
                </div>
                <div>
                    <form id="click_form" action="https://my.click.uz/services/pay" method="get" target="_blank">
                        <input type="hidden" name="service_id" value="23092"/>
                        <input type="hidden" name="merchant_id" value="15939"/>
                        <input type="hidden" name="transaction_param" value="13"/>
                        <input type="hidden" name="amount" value="1000"/>
                        <input type="hidden" name="return_url" value="http://dacha/test"/>
                        <button type="submit" class="click_logo"><i></i>Оплатить через CLICK</button>
                    </form>
                </div>
                <div>
                                        <form method="GET" action="https://payment.apelsin.uz">
{{--                                                                // Обязательные поля--}}
                                            <input type="hidden" name="cash" value="f81c68ccf43c462e8334d22b2cb04ce9"/>
{{--                                                                // уникальный Cash ID (выдается Апельсином)--}}
                                            <input type="hidden" name="redirectUrl" value="https://work.bingo99.uz/test"/>
{{--                                                                // URL для отправки на сайт после оплаты--}}
                                            <input type="hidden" name="description" value="TEST"/>
{{--                                                                // фраза, который выйдет на экране оплаты у Пользователя, например «Пополнение--}}
{{--                                                                платежа на www._______.uz»--}}
{{--                                                                // Предусматривается установка дополнительных полей для Клиента. После--}}
{{--                                                                проведения платежа, данные по полям будут отправляться на ваш биллинг URL в формате--}}
{{--                                                                JSON.--}}
{{--                                                                // В JSON не будет required/optional полей--}}
{{--                                                                // В JSON будут поля amount (сумма оплаты Пользователя) и transactionId (уникальный--}}
{{--                                                                айди транзакции)--}}
                                            <input type="hidden" name="amount" value="100000"/>
{{--                                                                    <input type="hidden" name="" value=""/>--}}
{{--                                                                    <input type="hidden" name="" value=""/>--}}
{{--                                                                    ...--}}
                                            <button type="submit"
                                                    style="cursor: pointer;
                    border: 1px solid #ebebeb; border-radius: 6px;
                    background: linear-gradient(to top, #f1f2f2, white);
                    width: 100px; height: 54px; display: flex;
                    align-items: center; justify-content: center;">
                                                <img style="width: 100px; height: 42px;" src="https://oplata.kapitalbank.uz/images/apelsin-v1.png">
                                            </button>
                                        </form>
                </div>

                <div>
                    <body onload="Paycom.Button('#form-payme', '#button-container')">
                    <form id="form-payme" method="POST" action="https://checkout.paycom.uz/">
                        <input type="hidden" name="merchant" value="62a046bdc14e3c99ddcfd770">
                        <input type="hidden" name="account[user_id]" value="1">
                        <input type="hidden" name="amount" value="100000">
                        <input type="hidden" name="lang" value="ru">
                        <input type="hidden" name="button" data-type="svg" value="colored">
                        <div id="button-container"></div>
                    </form>
                    <!-- ... -->
                    <script src="https://cdn.paycom.uz/integration/js/checkout.min.js"></script>
                    </body>
                </div>
            </div>
        </div>
        <iframe
            src="https://payment.apelsin.uz?cash=f81c68ccf43c462e8334d22b2cb04ce9&description=Пополнение%20баланса&amount=100000" style="width: 800px; height: 800px"></iframe>
    </div>

@endsection

@section('css')
    .click_logo {
    padding:4px 10px;
    cursor:pointer;
    color: #fff;
    line-height:190%;
    font-size: 13px;
    font-family: Arial;
    font-weight: bold;
    text-align: center;
    border: 1px solid #037bc8;
    text-shadow: 0px -1px 0px #037bc8;
    border-radius: 4px;
    background: #27a8e0;
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzI3YThlMCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMxYzhlZDciIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
    background: -webkit-gradient(linear, 0 0, 0 100%, from(#27a8e0), to(#1c8ed7));
    background: -webkit-linear-gradient(#27a8e0 0%, #1c8ed7 100%);
    background: -moz-linear-gradient(#27a8e0 0%, #1c8ed7 100%);
    background: -o-linear-gradient(#27a8e0 0%, #1c8ed7 100%);
    background: linear-gradient(#27a8e0 0%, #1c8ed7 100%);
    box-shadow:  inset    0px 1px 0px   #45c4fc;
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#27a8e0', endColorstr='#1c8ed7',GradientType=0 );
    -webkit-box-shadow: inset 0px 1px 0px #45c4fc;
    -moz-box-shadow: inset  0px 1px 0px  #45c4fc;
    -webkit-border-radius:4px;
    -moz-border-radius: 4px;
    }
    .click_logo i {
    background: url(https://m.click.uz/static/img/logo.png) no-repeat top left;
    width:30px;
    height: 25px;
    display: block;
    float: left;
    }
@endsection
@section('js')
@endsection

