<?php
require "lib/init.php";
$page_title = "Message of Principal";
include "include/header.php";
?>
	
	<!-- Start Banner -->
	<div class="inner-banner blog">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="content">
						<h1>Message of Principal</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Banner -->
	
	<!-- Start About -->
	<section class="about inner padding-lg">
		<div class="container">
			<div class="row">
                <div class="col-md-1"></div>
				<div class="col-md-6 left-block">
					<?php echo htmlspecialchars_decode($odb->getInfo("principal_message")); ?>
				</div>
				<div class="col-md-4 about-right"><img class="img-responsive img-thumbnail" src="uploads/images/<?= $odb->getFile("info", "principal_photo") ?>" class="img-responsive" alt=""> </div>
                <div class="col-md-1"></div>
            </div>
		</div>
	</section>
	<!-- End About -->

<?php include "include/footer.php"; ?>