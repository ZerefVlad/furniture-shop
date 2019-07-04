
@extends('layouts.app')

@section('content')


    <!-- CONTENT AREA -->
<div class="content-area">

    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="page-header">
                <h1>Популярні питання</h1>
            </div>
            <ul class="breadcrumb"></ul>
        </div>
    </section>
    <!-- /BREADCRUMBS -->

    <!-- PAGE -->
    <section class="page-section color">
        <div class="container">

{{--            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla.</p>--}}

            <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading1">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                <span class="dot"></span> Які терміни доставки?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                        <div class="panel-body">
                            <p><span class="italic">Дивани, ліжка, столи, матраци з виставки </span> – 3-4 робочих дні</p>
                            <p><span class="italic">Шафи-купе стандарт </span> – 10-15 робочих днів</p>
                            <p><span class="italic">Шафи-купе під замовлення </span> – 30 робочих днів</p>
                            <p><span class="italic">Кухні під замовлення</span> – 35 робочих днів</p>
                            <p><span class="italic">Дивани під замовлення </span> –21 робочих днів</p>
                            <p><span class="italic">Матраци під замовлення  </span> – 2-3 тижні</p>
                            <p><span class="italic">Столи, стільці, ліжка </span> – 1-2 тижні</p>
                            <p><span class="italic">Ліжка під замовлення </span> – 2 місяці</p>
                            </div>
                    </div>
                </div>
                <!---->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading2">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                <span class="dot"></span> Яка вартість доставки?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                        <div class="panel-body">
                            <p>Вартість доставки по м.Бровари – 150 грн</p>
                            <p>Доставка в інші міста прораховується індивідуально в залежності від кілометражу</p>
                        </div>
                    </div>
                </div>
                <!---->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading3">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                <span class="dot"></span> Чи доступна послуга монтажу придбаних меблів?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                        <div class="panel-body">
                            <p>Так.
                                Вартість монтажу та підйому виробів на поверх  прораховується індивідуально</p>

                        </div>
                    </div>
                </div>
                <!---->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading4">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                <span class="dot"></span> Чи можливо купити меблі у розстрочку або кредит?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                        <div class="panel-body">
                            <p>Так, наша компанія співпрацює з банками які надають послуги розстрочки та кредитування. </p>
                        </div>
                    </div>
                </div>
                <!---->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading5">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                <span class="dot"></span> Які строки гарантії?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                        <div class="panel-body">
                            <p> Гарантія на корпусні меблі складає 24 місяці </p>
                            <p> Гарантія на м’які меблі складає 18 місяців </p>

                        </div>
                    </div>
                </div>
                <!---->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading6">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                <span class="dot"></span> Як відбувається оплата товару?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                        <div class="panel-body">
                            <p> Придбання товару відбувається по предоплаті. </p>
                            <p> <span class="italic">Розміри предоплати : </span> </p>
                            <p> Шафи-купе стандарт, товари з виставки – мінімальний розмір – 200 грн </p>
                            <p> Шафи-купе та кухні під замовлення – 50% від суми замовлення </p>
                            <p> Дивани, матраци, ліжка, столи під замовлення – 10% від суми замовлення </p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading7">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse6">
                                <span class="dot"></span> Які є форми оплати товару?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                        <div class="panel-body">
                            <p> Готівка або безготівка за допомогою інтернет-банкінгу </p>

                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading8">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse6">
                                <span class="dot"></span> Що таке базова вартість Шафи-купе Стандарт?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                        <div class="panel-body">
                            <p> Базова вартість – це вартість шафи-купе Стандарт у базовій комплектації: корпус, фасади ДСП, колір профілю – срібло. Вартість шухляд у базову вартість не входить. </p>

                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading9">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse6">
                                <span class="dot"></span> Чи можливо змінювати тканину на диванах?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
                        <div class="panel-body">
                            <p> Так.
                                У наших салонах представлено більше 1000 варіантів тканин на будь-який смак. Вартість виробу залежить від категорії обраної тканини. </p>

                        </div>
                    </div>
                </div>
                <!---->
            </div>


        </div>
    </section>
    <!-- /PAGE -->

    <!-- PAGE -->

    <!-- /PAGE -->

</div>
<!-- /CONTENT AREA -->
@endsection