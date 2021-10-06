
<!-- Start Footer -->
<footer class="footer">
    <!-- Start Footer Top -->
    <div class="container">
        <div class="row row1">
            <div class="col-sm-9 clearfix">
                <div class="foot-nav">
                    <h3><?= ($lang == 'en')?"About us":"আমাদের সম্পর্কে" ?></h3>
                    <ul>
                        <li>
                            <p><?= ($lang == 'en')?$odb->getInfo("about"):$odb->getInfo("bn_about") ?></p>
                        </li>
                    </ul>
                </div>
                <div class="foot-nav">
                    <h3><?= ($lang == 'en')?"Get in touch":"যোগাযোগ রাখুন" ?></h3>
                    <ul>
                        <li><?= htmlspecialchars_decode((($lang == 'en')?$odb->getInfo("location"):$odb->getInfo("bn_location"))) ?></li>
                        <li><a href="mailto:<?= $odb->getInfo("email") ?>"><?= $odb->getInfo("email") ?></a></li>
                        <li><a href="tel:<?= $odb->getInfo("telephone") ?>"><?= $odb->getInfo("telephone") ?></a></li>
                    </ul>
                </div>
                <div class="foot-nav">
                    <h3><?= ($lang == 'en')?"Menus":"মেনু সমূহ" ?></h3>
                    <ul>
                        <li><a href="index.php"><?= ($lang == 'en')?"Home":"হোম" ?></a></li>
                        <li><a href="about.php"><?= ($lang == 'en')?"About":"আমাদের সম্পর্কে" ?></a></li>
                        <li><a href="contact.php"><?= ($lang == 'en')?"Contact":"যোগাযোগ" ?></a></li>
                        <li><a href="notice-and-order.php"><?= ($lang == 'en')?"Notice":"নোটিস" ?></a></li>
                        <li><a href="news.php"><?= ($lang == 'en')?"News":"খবরসমূহ" ?></a></li>
                        <li><a href="results.php"><?= ($lang == 'en')?"Result":"ফলাফল" ?></a></li>
                        <li><a href="syllabus.php"><?= ($lang == 'en')?"Syllabus":"সিলেবাস" ?></a></li>
                        <li><a href="routine.php"><?= ($lang == 'en')?"Class Routine":"ক্লাস রুটিন" ?></a></li>
                    </ul>
                </div>
                <div class="foot-nav">
                    <?php $foot_depts = $opr->getSortedRecord("departments", "title"); ?>
                    <h3><?= ($lang == 'en')?"Departments":"বিভাগসমূহ" ?></h3>
                    <ul>
                        <li><a href="departments.php"><?= ($lang == 'en')?"All Departments":"সকল বিভাগসমূহ" ?></a></li>
						<?php foreach ($foot_depts as $dept): ?>
                        <?php $dept = $odb->fetchObjAssoc($dept); ?>
                            <li><a href="department.php?id=<?= $dept->id ?>"><?php echo ($lang == 'en')?$dept->title:$dept->bn_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="footer-logo hidden-xs"><a href="index.php"><img src="images/footer-logo.png" class="img-responsive" alt=""></a></div>
                <p>© 2019 <span>KPI</span>. All rights reserved</p>
                <ul class="terms clearfix">
                </ul>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <!-- Start Footer Bottom -->
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="connect-us">
                        <h3><?= ($lang == 'en')?"Connect with Us":"আমাদের সাথে সংযুক্ত থাকুন" ?></h3>
                        <ul class="follow-us clearfix">
                            <li><a href="<?= $odb->getInfo("facebook_url") ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $odb->getInfo("twitter_url") ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $odb->getInfo("linkedin_url") ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $odb->getInfo("gplus_url") ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <div class="instagram">
                        <a href="gallery.php"><h3><?= ($lang == 'en')?"Gallery":"গ্যালারী" ?></h3></a>
                        <ul class="clearfix">
							<?php
							$fg_items = $opr->getRandomRecord("gallary", 6);
							foreach ($fg_items as $fgi):
							$fgi = $odb->fetchObjAssoc($fgi);
							?>
                            <li><a class="gallaryImage" href="uploads/gallary/<?= $fgi->image ?>"><figure><img src="uploads/gallary/thumb/thumb_<?= $fgi->image ?>" class="img-responsive" alt=""></figure></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
<!-- End Footer -->

<!-- Scroll to top -->
<a href="#" class="scroll-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/frontend/js/jquery.min.js"></script>
<!-- Bootsrap JS -->
<script src="assets/frontend/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 JS -->
<script src="assets/frontend/assets/select2/js/select2.min.js"></script>
<!-- Match Height JS -->
<script src="assets/frontend/assets/matchHeight/js/matchHeight-min.js"></script>
<!-- Bxslider JS -->
<script src="assets/frontend/assets/bxslider/js/bxslider.min.js"></script>
<!-- Waypoints JS -->
<script src="assets/frontend/assets/waypoints/js/waypoints.min.js"></script>
<!-- Counter Up JS -->
<script src="assets/frontend/assets/counterup/js/counterup.min.js"></script>
<!-- Magnific Popup JS -->
<script src="assets/frontend/assets/magnific-popup/js/magnific-popup.min.js"></script>
<!-- Owl Carousal JS -->
<script src="assets/frontend/assets/owl-carousel/js/owl.carousel.min.js"></script>
<!-- isotope js -->
<script src="assets/frontend/assets/isotope/js/isotope.min.js"></script>
<!-- Modernizr JS -->
<script src="assets/frontend/js/modernizr.custom.js"></script>
<!-- Custom JS -->
<script src="assets/frontend/js/custom.js"></script>
</body>

</html>