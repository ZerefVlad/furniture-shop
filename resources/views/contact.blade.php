


@extends('layouts.app')

@section('content')


<!-- CONTENT AREA -->
<div class="content-area">

    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="page-header">
                <h1 style="color: #333333;font-family: Montserrat;font-size: 47px;font-weight: 900;line-height: 50px;text-transform: uppercase;">Контакти</h1>
            </div>
            <p style="color: #252424;font-family: Montserrat;font-size: 18px;font-weight: 400;"> Lorem ipsum dolor sit amet,    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

        </div>
    </section>
    <!-- /BREADCRUMBS -->

    <!-- PAGE -->
    <section class="page-section color">
        <div class="container">

            <div class="row">



                <div class="col-md-12 text-left">

                    <h2 class="block-title"><span>Форма зворотнього зв'язку</span></h2>

                    <!-- Contact form -->
                    <form name="contact-form" method="get" action="{{route('callback-send')}}" class="contact-form" id="contact-form">

                        <div class="outer required" >
                            <div class="form-group af-inner">
                                <label class="sr-only" for="name">Ім'я</label>
                                <input style="border-radius: 5px;border: 1px solid #c1c1c1;background-color:#f3f3f3;"
                                       type="text" name="name" id="name" placeholder="Ім'я" value="" size="30"
                                       data-toggle="tooltip" title="Name is required"
                                       class="form-control placeholder" required/>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="contact">
                        <div class="outer required">
                            <div class="form-group af-inner">
                                <label class="sr-only" for="email">Email</label>
                                <input style="border-radius: 5px;border: 1px solid #c1c1c1;background-color:#f3f3f3;"
                                       type="email" name="email" id="email" placeholder="Email" value="" size="30"
                                       data-toggle="tooltip" title="Email is required"
                                       class="form-control placeholder" required/>
                            </div>
                        </div>

                        <div class="outer required">
                            <div class="form-group af-inner">
                                <label class="sr-only" for="subject">Телефон</label>
                                <input style="border-radius: 5px;border: 1px solid #c1c1c1;background-color:#f3f3f3;"
                                       type="text" name="phone" id="subject" placeholder="Номер телефону" value="" size="30"
                                       data-toggle="tooltip" title="Subject is required"
                                       class="form-control placeholder" required/>
                            </div>
                        </div>

                        <div class="form-group af-inner">
                            <label class="sr-only" for="input-message">Ваше питання</label>
                            <textarea style="border-radius: 5px;border: 1px solid #c1c1c1;background-color:#f3f3f3;"
                                      name="message" id="input-message" placeholder="Ваше питання" rows="4" cols="50"
                                      data-toggle="tooltip" title="Message is required"
                                      class="form-control placeholder"></textarea>
                        </div>

                        <div class="outer required">
                            <div class="form-group af-inner">
                                <input style="border-radius: 30px;background-color: #02bbdb;color: #ffffff;font-family: Montserrat;font-size: 18px;font-weight: 700;line-height: 50px;margin-left: 40%;" type="submit" name="submit" class="form-button form-button-submit btn" id="submit_btn" value="Надіслати" />
                            </div>
                        </div>

                    </form>
                    <!-- /Contact form -->

                </div>



            </div>

        </div>
    </section>
    <!-- /PAGE -->
    <section class="page-section color">
        <div class="container">



            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info">

                        <h2 class="block-title" ><span>М. БРОВАРЫ, BУЛ КИЇВСЬКА 152 (2 ПОВЕРХ)</span></h2>

                        <div class="media-list">
                            <div class="media">
                                <i class="pull-left fa fa-home" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body" >
                                    <strong>Адреса:</strong><br>
                                    Україна,  КиЇвська обл., м.Бровары, вул. КиЇвска 152 (2 поверх)
                                </div>
                            </div>

                            <div class="media">
                                <i class="pull-left fa fa-clock-o" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body" >
                                    <strong>Графік роботи:</strong><br>
                                    Пн-Нд: 10<span style="font-size: 75%;line-height: 0; position: relative; vertical-align: baseline;    top: -0.5em;">00</span > - 19<span style="font-size: 75%;line-height: 0; position: relative; vertical-align: baseline;    top: -0.5em;">00</span>
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-phone" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>Телефон:</strong><br>
                                    (067) 201-3772
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-phone" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>Телефон:</strong><br>
                                    (099) 041-7115
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-viber" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>Viber:</strong><br>
                                    099 041 7115
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-envelope-o" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>E-mail:</strong><br>
                                    brestonua@gmail.com
                                </div>
                            </div>




                        </div>

                    </div>
                </div>
                <div class="col-md-8">
                    <img style="float: right; max-width: 300px; max-height: 360px; margin-left: 50px;margin-bottom:20px " src="{{asset('storage/static_img/kievska1.jpeg')}}">
                    <img style="float: right; max-height: 360px; max-width: 300px; margin-left: 50px;margin-bottom:20px " src="{{asset('storage/static_img/kievska2.jpeg')}}">
                </div>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2537.9357477984076!2d30.764801251263687!3d50.49815357938127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4dbd1c080b6bf%3A0xf98f43a8634d7b04!2z0YPQuy4g0JrQuNC10LLRgdC60LDRjywgMTUyLCDQkdGA0L7QstCw0YDRiywg0JrQuNC10LLRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwgMDc0MDA!5e0!3m2!1sru!2sua!4v1559282227578!5m2!1sru!2sua" width="1100" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>

            <div class="row" style="margin-top: 20px">
                <div class="col-md-4">
                    <div class="contact-info">

                        <h2 class="block-title" ><span> М. БРОВАРЫ ИУЛ ОНІКІЄНКА 20/2</span></h2>

                        <div class="media-list">
                            <div class="media">
                                <i class="pull-left fa fa-home" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body" >
                                    <strong>Адреса:</strong><br>
                                    Украина, Київска обл., м.Бровары, вул. Олега Онікієнка 20/2


                                </div>
                            </div>

                            <div class="media">
                                <i class="pull-left fa fa-clock-o" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body" >
                                    <strong>Графік роботи:</strong><br>
                                    Пн-Нд: 10<span style="font-size: 75%;line-height: 0; position: relative; vertical-align: baseline;    top: -0.5em;">00</span > - 19<span style="font-size: 75%;line-height: 0; position: relative; vertical-align: baseline;    top: -0.5em;">00</span>
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-phone" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>Телефон:</strong><br>
                                    +380 (4594) 64585
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-phone" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>Телефон:</strong><br>
                                    (096) 706-2381
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-viber" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>Viber:</strong><br>
                                    096 706 2381
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-envelope-o" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>E-mail:</strong><br>
                                    brestonua@gmail.com
                                </div>
                            </div>




                        </div>

                    </div>
                </div>
                <div class="col-md-8">
                    <img style="float: right; max-width: 300px; max-height: 360px; margin-left: 50px;margin-bottom:20px " src="{{asset('storage/static_img/onikienka1.jpeg')}}">
                    <img style="float: right; max-height: 360px; max-width: 300px; margin-left: 50px;margin-bottom:20px " src="{{asset('storage/static_img/onikienka2.jpeg')}}">
                </div>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2537.333358475172!2d30.81811031573347!3d50.509363879483516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4d94423e859b9%3A0x87143dadc37c3e1a!2z0LLRg9C70LjRhtGPINCe0LvQtdCz0LAg0J7QvdGW0LrRltGU0L3QutCwLCAyMC8yLCDQkdGA0L7QstCw0YDQuCwg0JrQuNGX0LLRgdGM0LrQsCDQvtCx0LsuLCAwNzQwMA!5e0!3m2!1sru!2sua!4v1559282110596!5m2!1sru!2sua" width="1100" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>

            <div class="row" style="margin-top: 20px">
                <div class="col-md-4">
                    <div class="contact-info">

                        <h2 class="block-title" ><span>С.Проліски вул. Броварська, 2А, ТЦ "FOZZY"</span></h2>

                        <div class="media-list">
                            <div class="media">
                                <i class="pull-left fa fa-home" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body" >
                                    <strong>Адреса:</strong><br>
                                    Україна, с.Проліски, вул. Броварська, 2А, ТЦ "FOZZY"
                                </div>
                            </div>

                            <div class="media">
                                <i class="pull-left fa fa-clock-o" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body" >
                                    <strong>Графік роботи:</strong><br>
                                    Пн-Нд: 10<span style="font-size: 75%;line-height: 0; position: relative; vertical-align: baseline;    top: -0.5em;">00</span > - 19<span style="font-size: 75%;line-height: 0; position: relative; vertical-align: baseline;    top: -0.5em;">00</span>
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-phone" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>Телефон:</strong><br>
                                    (066) 971-2921
                                </div>
                            </div>

                            <div class="media">
                                <i class="pull-left fa fa-viber" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>Viber:</strong><br>
                                    066 971 2921
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-envelope-o" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>E-mail:</strong><br>
                                    brestonua@gmail.com
                                </div>
                            </div>




                        </div>

                    </div>
                </div>
                <div class="col-md-8">
                    <img style="float: right; max-width: 300px; max-height: 360px; margin-left: 50px;margin-bottom:20px " src="{{asset('storage/static_img/prolisku1.jpeg')}}">
                    <img style="float: right; max-height: 360px; max-width: 300px; margin-left: 50px;margin-bottom:20px " src="{{asset('storage/static_img/prolisku2.jpeg')}}">
                </div>
            </div>
            <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2543.665488592401!2d30.79735915125975!3d50.39143407936646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4c2db6cfacba7%3A0x5421d378f9e15781!2z0LLRg9C70LjRhtGPINCR0YDQvtCy0LDRgNGB0YzQutCwLCAyLCDQn9GA0L7Qu9GW0YHQutC4LCDQmtC40ZfQstGB0YzQutCwINC-0LHQuy4sIDA4MzIy!5e0!3m2!1sru!2sua!4v1559282343745!5m2!1sru!2sua" width="1100" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </section>
    <!-- PAGE -->






        </div>
    </section>
    <!-- /PAGE -->

</div>
<!-- /CONTENT AREA -->
@endsection