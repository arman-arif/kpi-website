<!-- Start Banner Carousel -->
<div class="banner-outer">
    <div class="banner-slider">
        <?php
        $sliders = $opr->getRecord("slider");
		foreach ($sliders as $slider):
        $slider = $odb->fetchObjAssoc($slider);
        ?>
        <div class="slide1" style="background: url(uploads/slider/<?= $slider->image ?>) no-repeat center top / cover;">
            <div class="container">
                <div class="content animated fadeInLeft">
                    <div class="">
                        <h1 class="animated fadeInLeft" style="color: #fff; text-shadow: 0px 0px 15px rgba(0,0,0,0.5);">
                            <?php if (!empty($slider->text_top)): ?>
                            <?php echo $slider->text_top; ?>
                            <?php endif ?>
                            <span class="animated fadeInLeft"><?php echo $slider->heading; ?></span> </h1>
                        <?php if (!empty($slider->caption)): ?>
                            <p class="animated fadeInLeft" style="color: #000 !important;text-shadow: 0px 0px 10px rgba(255,255,255,0.5);"><?php echo $slider->caption; ?></p>
						<?php endif ?>
                        <?php if (!empty($slider->btn_name)): ?>
                        <a href="<?= $slider->btn_url ?>" class="btn animated fadeInLeft">Know More <span class="icon-more-icon"></span></a>
                    </div>
					    <?php endif ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
    </div>
</div>
<!-- End Banner Carousel -->