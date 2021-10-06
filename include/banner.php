<!-- Start Banner Carousel -->
<div class="banner-outer">
    <div class="banner-slider">
        <?php
        $sliders = $opr->getRecord("slider");
		foreach ($sliders as $slider):
        $slider = $odb->fetchObjAssoc($slider);
        ?>
            <div class="slide2" style="background: url(uploads/slider/<?= $slider->image ?>) no-repeat center top / cover;">
                <div class="container">
                    <div class="content">
                        <h1 class="animated fadeInUp" style="color: #fff; text-shadow: 0px 0px 15px rgba(0,0,0,0.3);">
                            <?php echo $slider->text_top; ?>
                            <span><?php echo $slider->heading; ?></span>
                        </h1>
                        <p class="animated fadeInUp" style="color: #fff !important;text-shadow: 0px 0px 10px rgba(0,0,0,0.3);"><?php echo $slider->caption; ?></p>
						<?php if (!empty($slider->btn_name)): ?>
                        <a href="<?= $slider->btn_url ?>" class="btn animated fadeInUp"><?= $slider->btn_name ?> <span class="icon-more-icon"></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>
</div>
<!-- End Banner Carousel -->