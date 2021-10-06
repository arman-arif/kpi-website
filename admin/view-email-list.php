<?php
require_once 'lib/init.php';
$odb = new Database();

$page_title = "Email Inbox";
$m_email = "active";

$infos = $odb->getDescData("message", "id");

include 'include/header.php';
?>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo $page_title; ?>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTable">
							<thead>
							<tr>
								<th>S/N</th>
								<th>Sender</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Date</th>
								<th>Message</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
							foreach ($infos as $info):
								?>
								<tr class="<?php echo ($i%2==0)?"even":"odd"; ?>">
									<td class="text-center" width="5%"><?php echo $i++; ?></td>
									<td width="15%"><?= $info['sender'] ?></td>
									<td width="20%"><a href="send-email.php?email=<?= $info['email'] ?>"><?= $info['email'] ?></a></td>
                                    <td class="text-center"><?= $info['phone'] ?></td>
                                    <td class="text-center"><?= $ofn->formatDate($info['added']) ?></td>
									<td class="<?= ($info['seen'] == 0)?"font-weight-bold":"font-weight-light"; ?>">
                                        <?= ($info['seen'] == 0)?"<span class='badge'>New</span>":""; ?>
                                        <?= $ofn->textShorten(strip_tags(html_entity_decode($info['message'])), 30) ?>
                                    <a style="float: right;" href="view-message.php?id=<?= $info['id'] ?>">Read</a></td>
									<td class="text-center" width="10%">
                                        <?php if ($info['seen'] == 0): ?>
                                            <a href="modify.php?a=read&c=message&id=<?= $info['id'] ?>" title="Mark as read"><span class="fa fa-envelope-open-o"></span></a>&ensp;&ensp;
                                        <?php else: ?>
                                            <a href="modify.php?a=unread&c=message&id=<?= $info['id'] ?>" title="Mark as unread"><span class="fa fa-envelope-o"></span></a>&ensp;&ensp;
                                        <?php endif; ?>
										<a href="modify.php?a=del&c=message&id=<?= $info['id'] ?>" onclick="return confirmDelete();" class="text-danger"><span class="ti-trash"></span></a>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

<?php
include "include/footer.php";
?>