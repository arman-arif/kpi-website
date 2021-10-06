<?php
require_once "lib/init.php";

$page_title = "Contact Us";

include 'include/header.php' ?>

        <!-- Start Banner -->
        <div class="inner-banner contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <h1>Contact Us</h1>
                        </div>
                    </div>
                    <div class="col-sm-4 col-lg-3"> <a href="//www.btebadmission.gov.bd" class="apply-online clearfix">
                        <div class="left clearfix"> <span class="icon"><img src="images/apply-online-sm-ico.png" class="img-responsive" alt=""></span> <span class="txt">Apply Online</span> </div>
                        <div class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                        </a></div>
                </div>
            </div>
        </div>
        <!-- End Banner --> 

        <!-- Start Contact Us -->
        <section class="form-wrapper padding-lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <?php if (isset($_SESSION['message'])): ?>
                        <p class="alert alert-success"><?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        ?></p>
                        <?php endif ?>
                        <form name="contact-form" id="ContactForm" method="post" action="lib/email.php">
                            <div class="row input-row">
                                <div class="col-sm-6">
                                    <input name="first_name" type="text" placeholder="First Name" required>
                                </div>
                                <div class="col-sm-6">
                                    <input name="last_name" type="text" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="row input-row">
                                <div class="col-sm-6">
                                    <input name="email" type="text" placeholder="Email" required>
                                </div>
                                <div class="col-sm-6">
                                    <input name="phone" type="text" placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="row input-row">
                                <div class="col-sm-12">
                                    <input name="subject" type="text" placeholder="Subject" required>
                                </div>
                            </div>
                            <div class="row input-row">
                                <div class="col-sm-12">
                                    <textarea type="text" name="message" rows="5" required placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-block">Send Message <span class="icon-more-icon"></span></button>
                                    <div class="msg"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </section>
        <!-- end Contact Us --> 

        <!-- Start Google Map -->
        <section class="google-map">
            <div><img src="images/banner2.jpg" style="width: 100%; height: auto;"></div>
            <div class="container">
                <div class="contact-detail">
                    <div class="address">
                        <div class="inner">
                            <h3>Khulna Polytechnic Institute</h3>
                            <p>Old Jessore Road, <br>Khalishpur Industrial Area,<br> Khulna, GPO-9000</p></div>
                        <div class="inner">
                            <h3>+88-041-762352</h3>
                        </div>
                        <div class="inner"> <a href="info@kpi.edu.bd">info@kpi.edu.bd</a> </div>
                    </div>
                    <div class="contact-bottom">
                        <ul class="follow-us clearfix">
                            <li><a href="<?= $odb->getInfo("facebook_url") ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $odb->getInfo("twitter_url") ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $odb->getInfo("linkedin_url") ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $odb->getInfo("gplus_url") ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Google Map -->

        <!-- Start Have Questions -->
        <section class="our-impotance have-question padding-lg">
            <div class="container">
            </div>
        </section>
        <!-- End Have Questions -->

<?php include "include/footer.php"; ?>