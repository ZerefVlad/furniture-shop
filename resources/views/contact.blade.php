


@extends('layouts.app')

@section('content')


<!-- CONTENT AREA -->
<div class="content-area">

    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs">
        <div class="container">
            <div class="page-header">
                <h1 style="color: #333333;font-family: Montserrat;font-size: 47px;font-weight: 900;line-height: 50px;text-transform: uppercase;">Contact</h1>
            </div>
            <p style="color: #252424;font-family: Montserrat;font-size: 18px;font-weight: 400;"> Lorem ipsum dolor sit amet,    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

        </div>
    </section>
    <!-- /BREADCRUMBS -->

    <!-- PAGE -->
    <section class="page-section color">
        <div class="container">

            <div class="row">



                <div class="col-md-8 text-left">

                    <h2 class="block-title"><span>Contact Form</span></h2>

                    <!-- Contact form -->
                    <form name="contact-form" method="get" action="{{route('callback-send')}}" class="contact-form" id="contact-form">

                        <div class="outer required" >
                            <div class="form-group af-inner">
                                <label class="sr-only" for="name">Name</label>
                                <input style="border-radius: 5px;border: 1px solid #c1c1c1;background-color:#f3f3f3;"
                                       type="text" name="name" id="name" placeholder="Name" value="" size="30"
                                       data-toggle="tooltip" title="Name is required"
                                       class="form-control placeholder"/>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="contact">
                        <div class="outer required">
                            <div class="form-group af-inner">
                                <label class="sr-only" for="email">Email</label>
                                <input style="border-radius: 5px;border: 1px solid #c1c1c1;background-color:#f3f3f3;"
                                       type="email" name="email" id="email" placeholder="Email" value="" size="30"
                                       data-toggle="tooltip" title="Email is required"
                                       class="form-control placeholder"/>
                            </div>
                        </div>

                        <div class="outer required">
                            <div class="form-group af-inner">
                                <label class="sr-only" for="subject">Phone</label>
                                <input style="border-radius: 5px;border: 1px solid #c1c1c1;background-color:#f3f3f3;"
                                       type="text" name="phone" id="subject" placeholder="Phone" value="" size="30"
                                       data-toggle="tooltip" title="Subject is required"
                                       class="form-control placeholder"/>
                            </div>
                        </div>

                        <div class="form-group af-inner">
                            <label class="sr-only" for="input-message">Message</label>
                            <textarea style="border-radius: 5px;border: 1px solid #c1c1c1;background-color:#f3f3f3;"
                                      name="message" id="input-message" placeholder="Message" rows="4" cols="50"
                                      data-toggle="tooltip" title="Message is required"
                                      class="form-control placeholder"></textarea>
                        </div>

                        <div class="outer required">
                            <div class="form-group af-inner">
                                <input style="border-radius: 30px;background-color: #02bbdb;color: #ffffff;font-family: Montserrat;font-size: 18px;font-weight: 700;line-height: 50px;margin-left: 40%;" type="submit" name="submit" class="form-button form-button-submit btn" id="submit_btn" value="Send message" />
                            </div>
                        </div>

                    </form>
                    <!-- /Contact form -->

                </div>

                <div class="col-md-4">
                    <div class="contact-info">

                        <h2 class="block-title" ><span>Contact Us</span></h2>

                        <div class="media-list">
                            <div class="media">
                                <i class="pull-left fa fa-home" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body" >
                                    <strong>Address:</strong><br>
                                    987 Main st. New York, NY, 00001, U.S.A
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-phone" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>Telephone:</strong><br>
                                    (012) 345-7689
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-phone" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>Telephone:</strong><br>
                                    (012) 345-7689
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-envelope-o" style="color: #02bbdb;background-color: #ffffff;font-size: 20px;font-weight: 400;"></i>
                                <div class="media-body">
                                    <strong>Fax:</strong><br>
                                    0123456789
                                </div>
                            </div>




                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- /PAGE -->

    <!-- PAGE -->
    <section class="page-section no-padding no-bottom-space" style="padding-top: 0;">
        <div class="container full-width">

            <!-- Google map -->
            <div class="google-map">
                <div id="map-canvas"></div>
            </div>
            <!-- /Google map -->

        </div>
    </section>
    <!-- /PAGE -->

</div>
<!-- /CONTENT AREA -->
@endsection