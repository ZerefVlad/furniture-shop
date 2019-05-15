<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Админ Панель</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-xxl.css')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/reset.css')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Open+Sans:400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
{{--    <script src="{{asset('js/mane-page-builder.js')}}"></script>--}}

</head>
<body>

<header class="header">

    <div class="container">
        <nav class="navbar navbar-expand-xl navbar-light header-navbar">
            <a class="navbar-brand" href="/">
                <img src="img/admin-logo.png" alt="" class="nav-brand-img">

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainMenu" style="margin-left: -200px;">


                <ul class="navbar-nav ml-auto  mt-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link " href="{{route('order_list')}}">Заказы </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{route('user_list')}}">Пользователи </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category_list')}}">Категории</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('post_list')}}">Посты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('attribute_list')}}">Аттрибуты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product_list')}}">Продукты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('main_page_create')}}">Главная страница</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('comment_list')}}">Комментарии</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subscribers')}}">Подписки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product_color_view')}}">Цвета товаров</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('filter')}}">Фильтры</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('callback')}}">обратная связь</a>
                    </li>




                </ul>

                <a href="{{route('main-page')}}" class="logout"><i class="fas fa-sign-out-alt"></i> <span>Выйти</span></a>


            </div>
        </nav>

    </div>
</header>


<section class="main-section" id="accordion">
    <div class="container">
        @yield('content')



{{--        <div class="row users-data">--}}
{{--            <div class="col-12 col-md-7 user-item">--}}
{{--                <div class="users-info">--}}
{{--                    <a href="" class="change-controller"><i class="fas fa-cog"></i><span>Change</span></a>--}}
{{--                    <ul class="data-list static-list">--}}
{{--                        <li class="list-item">--}}
{{--                            <i class="fas fa-user"></i><span>Keven Feil</span>--}}
{{--                        </li>--}}
{{--                        <li class="list-item">--}}
{{--                            <i class="fas fa-envelope"></i><span>sample_mail@gmail.com</span>--}}
{{--                        </li>--}}
{{--                        <li class="list-item">--}}
{{--                            <i class="fas fa-envelope"></i><span>password</span>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <form action="" class="change-form d-none">--}}
{{--                        <ul class="data-list">--}}
{{--                            <li class="list-item">--}}
{{--                                <i class="fas fa-user"></i><input class="change-input user-name" type="text" value="Keven Feil">--}}
{{--                            </li>--}}
{{--                            <li class="list-item">--}}
{{--                                <i class="fas fa-envelope"></i><input class="change-input user-mail" type="text"  value="sample_mail@gmail.com">--}}
{{--                            </li>--}}
{{--                            <li class="list-item">--}}
{{--                                <i class="fas fa-envelope"></i><input class="change-input user-password" type="text"  value="password">--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <div class="button-group">--}}
{{--                            <button class="btn cancel">Отмена</button>--}}
{{--                            <button class="btn save">Сохранить</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="col-12 col-md-5 user-item">--}}
{{--                <div class="users-balance">--}}
{{--                    <div class="balance-title">Баланс:</div>--}}
{{--                    <div class="balance-value">50 000$</div>--}}
{{--                    <button class="get-cash">Вывод средств</button>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}

{{--        <ul class="nav nav-tabs" id="tab-menu" role="tablist">--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link active" id="rate-tab" data-toggle="tab" href="#rate" role="tab" aria-controls="rate" aria-selected="true">Тарифы</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">История транзакций</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" id="referal-tab" data-toggle="tab" href="#referal" role="tab" aria-controls="referal" aria-selected="false">Реферальная система</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" id="king-tab" data-toggle="tab" href="#king" role="tab" aria-controls="king" aria-selected="false">Крипто король</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <div class="tab-content" id="tab-content">--}}
{{--            <div class="tab-pane fade show active" id="rate" role="tabpanel" aria-labelledby="rate-tab">--}}
{{--                <div class="table-responsive">--}}
{{--                    <table class="rate-table">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th scope="col">Название тарифного плана</th>--}}
{{--                            <th scope="col">Дата</th>--}}
{{--                            <th scope="col">Итог на текущий день</th>--}}

{{--                        </tr>--}}

{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td>qweqweq</td>--}}
{{--                            <td>qweqweq</td>--}}
{{--                            <td>qweqweq</td>--}}
{{--                            <td>qweqweq</td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                    <div class="no-result">--}}
{{--                        На данный момент у вас нету активных тарифных планов--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="rate-plan">--}}
{{--                    <h3 class="title-plan">Описание тарифных планов</h3>--}}
{{--                    <div class="plan-category">РУБЛЕВЫЕ ТАРИФЫ</div>--}}
{{--                    <div class="accordion-list">--}}

{{--                        <div class="card">--}}


{{--                            <button class="btn-collapse" data-toggle="collapse" data-target="#collapse1"--}}
{{--                                    aria-expanded="false" aria-controls="collapse1">--}}
{{--                                ТАРИФ «Старт»--}}
{{--                            </button>--}}


{{--                            <div id="collapse1" class="collapse show" aria-labelledby="headingTwo"--}}
{{--                                 data-parent="#accordion">--}}
{{--                                <div class="card-body">--}}
{{--                                    <p class="description">Это базовый тариф. Он позволяет сделать первые шаги в инвестировании своих средств. Вне зависимости от знаний фондового рынка и правил трейдинга, Вы можете заработать на этом, так как Ваши деньги будут реинвестированы в брокерскую компанию Interactive Investor. </p>--}}
{{--                                    <p class="description">Interactive investor входит в десятку лучших брокерских фирм Соединенного королевства.  GDCinvest заключила договор с Interactive Investor, дающий гарантию заработка для наших инвесторов. Гибкая финансовая политика компании позволяет сделать минимальные инвестиции. </p>--}}
{{--                                    <p class="description">По истечению срока тарифа прибыль составит 70% к телу депозита</p>--}}
{{--                                    <ul class="parameter-list">--}}
{{--                                        <li class="parameter-item"><b class="title">Депозит:</b> От 7000р до 70000р.</li>--}}
{{--                                        <li class="parameter-item"><b class="title">Ставка:</b> 0.7% в день</li>--}}
{{--                                        <li class="parameter-item"><b class="title">Период:</b> 100 дней</li>--}}
{{--                                        <li class="parameter-item"><b class="title">Рефовод получает 5%</b></li>--}}
{{--                                        <li class="parameter-item"><b class="title">Распределённые инвестиции</b></li>--}}
{{--                                    </ul>--}}
{{--                                    <div class="note">*Примечание касательно страховки</div>--}}
{{--                                    <div class="button-group">--}}
{{--                                        <a href="#accordion" class="calculate">РАССЧИТАТЬ ПРИБЫЛЬ</a>--}}
{{--                                        <a href="#accordion" class="invest">ИНВЕСТИРОВАТЬ</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                    </div>--}}




{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">--}}
{{--                <div class="table-responsive">--}}
{{--                    <table class="rate-table">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th scope="col">Дата</th>--}}
{{--                            <th scope="col">Транзакция</th>--}}
{{--                            <th scope="col">Сумма</th>--}}
{{--                            <th scope="col">Остаток</th>--}}

{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td>10.01.2019</th>--}}
{{--                            <td class="recharge">Пополнение баланса</td>--}}
{{--                            <td class="recharge">1500$</td>--}}
{{--                            <td>3000$</td>--}}

{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>8.01.2019</th>--}}
{{--                            <td>Вывод средств</td>--}}
{{--                            <td>-500$</td>--}}
{{--                            <td>1000$</td>--}}

{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>01.01.2019</th>--}}
{{--                            <td class="recharge">Пополнение баланса</td>--}}
{{--                            <td class="recharge">1500$</td>--}}
{{--                            <td>1500$</td>--}}

{{--                        </tr>--}}

{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                    <div class="no-result d-none">--}}
{{--                        На данный момент у вас нету активных тарифных планов--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="tab-pane fade" id="referal" role="tabpanel" aria-labelledby="referal-tab">--}}
{{--                <div class="referal-content">--}}
{{--                    <div class="referal-text">--}}
{{--                        <p class="description">Скопируйте реферальную ссылку в поле ниже.</p>--}}
{{--                        <p class="description">Делитесь реферальной ссылкой удобным способом и получайте бонусы за новых пользователей.</p>--}}
{{--                    </div>--}}
{{--                    <div class="referal-link">http://www.sample_site.com/index.php?ref=newuser=23</div>--}}
{{--                    <div class="referal-info">Количество приглашенных пользователей: <span class="number">11</span></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="tab-pane fade" id="king" role="tabpanel" aria-labelledby="king-tab">--}}
{{--                <div class="king-content">--}}
{{--                    <div class="king-text">--}}
{{--                        <p class="description">К сожалению данная функция пока недоступна.</p>--}}
{{--                        <p class="description">Приносим наши извинения за причиненное неудобство.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}







    </div>
</section>


{{--<script src="{{ asset('js/admin/jquery.min.js')}}" ></script>--}}

<script src="{{ asset('js/admin/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/admin/fontawesome.js')}}"></script>
{{--<script src="{{asset('js/mane-page-builder.js')}}"></script>--}}

<script src="{{ asset('js/admin/main.js')}}"></script>
<script src="{{asset('js/category.js')}}"></script>
</body>
</html>
</body>
</html>