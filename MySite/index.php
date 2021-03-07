<?php include 'header.php';
include 'slider.php';
$hakkimizdasor=$db->prepare("select*from hakkimizda where hakkimizda_id=?");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (@$_GET['durum']=='ok'){?>
	<script type="text/javascript">
		swal({
			title:"Tebrikler",
			text:"Mesajınız gönderildi.",
			icon: "success",

			button: "Tamam",
		})
		;
		</script><?php

	}
	else if (@$_GET['durum']=='no'){?>
		<script type="text/javascript">
			swal({
				title:"Hata",
				text:"Mesajınız görderilemedi.",
				icon: "warning",

				button: "Tamam",
			})
			;
			</script><?php
		}
		?>
		<section class="section section-default section-no-border mt-none">
			<div class="container">
				<div class="row mb-xl">
					<div class="col-md-7">
						<h2 class="mt-xl mb-none"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></h2>
						<div class="divider divider-primary divider-small mb-xl">
							<hr>
						</div>
						<p class="mt-lg"><?php echo substr($hakkimizdacek['hakkimizda_icerik'],0,500); ?>...</p>

						<a class="mt-md" href="hakkimizda.php">Devamını oku <i class="fa fa-long-arrow-right"></i></a>
					</div>
					<div class="col-md-4 col-md-offset-1">
						<?php
						$sayi=rand(1,10);
						if($sayi>5){ ?>
							<h4 class="mt-xl mb-none">Vizyonumuz</h4>
							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>
							<p class="font-size-lg">"<?php echo substr($hakkimizdacek['hakkimizda_vizyon'],0,300); ?>..."</p>
							<a class="mt-md" href="hakkimizda.php">Devamını oku <i class="fa fa-long-arrow-right"></i></a>

							<?php
						}
						else {?>
							<h4 class="mt-xl mb-none">Misyonumuz</h4>
							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>
							<p class="font-size-lg">"<?php echo substr($hakkimizdacek['hakkimizda_misyon'],0,260); ?>..."</p>
							<a class="mt-md" href="hakkimizda.php">Devamını oku <i class="fa fa-long-arrow-right"></i></a>
						<?php }	
						?>

					</div>
				</div>
			</div>
		</section>

		<section class="parallax section section-text-light section-parallax section-center mt-xl" data-plugin-parallax data-plugin-options='{"speed": 1.5}' data-image-src="img/demos/law-firm/parallax-law-firm-2.jpg">
			<div class="container">
				<div class="row">
					<div class="counters counters-text-light">
						<div class="col-md-3 col-sm-6">
							<div class="counter mb-lg mt-lg">
								<i class="fa fa-globe"></i>
								<strong data-to="7" data-append="+">0</strong>
								<label>Kıta</label>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="counter mb-lg mt-lg">
								<i class="fa fa-flag"></i>
								<strong data-to="128" data-append="+">0</strong>
								<label>Ülke</label>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="counter mb-lg mt-lg">
								<i class="fa fa-motorcycle"></i>
								<strong data-to="458" data-append="+">0</strong>
								<label>Farklı Gezi Turu</label>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="counter mb-lg mt-lg">
								<i class="fa fa-road"></i>
								<strong data-to="12594" data-append="+">0</strong>
								<label>Kilometre Yol</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	-->
	<div class="container">
		<div class="row">
			<div class="col-md-12 center">
				<h2 class="mt-xl mb-none">Son Gezilerimiz</h2>
				<div class="divider divider-primary divider-small divider-small-center mb-xl">
					<hr>
				</div>
			</div>
		</div>
		<?php

		$sayfada = 4;
		$sorgu=$db->prepare("select * from icerik");
		$sorgu->execute();
		$toplam_icerik=$sorgu->rowCount();
		$toplam_sayfa = ceil($toplam_icerik / $sayfada);
		$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
		if($sayfa < 1) $sayfa = 1;
		if ($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
		$limit = ($sayfa - 1) * $sayfada;

		$iceriksor=$db->prepare("select * from icerik order by icerik_zaman DESC limit $limit,$sayfada");
		$iceriksor -> execute();	
		while ($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) {  ?>

			<div class="col-md-6">
				<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
					<span class="thumb-info-side-image-wrapper p-none">
						<img src="../<?php echo $icerikcek['icerik_resimyol']; ?>" class="img-responsive" alt="" style="width: 200px; height: 130px; padding: 10px;">
					</span>
					<span class="thumb-info-caption">
						<span class="thumb-info-caption-text">
							<h2 class="mb-md mt-xs"><?php echo $icerikcek['icerik_ad'];?></a></h2>
							<span class="post-meta">
								<span><?php echo $icerikcek['icerik_zaman'];?> | <a href="#">Cihat Eray YAZICI</a></span>
							</span>
							<p><?php echo substr($icerikcek['icerik_detay'],0,280);?>...</p>
							<div align="right" class="col-md-12">
								<a class="mt-md" href="<?=seo($icerikcek['icerik_ad']).'-'.$icerikcek['icerik_id']?>">Devamını Oku <i class="fa fa-long-arrow-right"></i></a></div> 
							</span>
						</span>
					</span>	
				</div>
			<?php } ?>
		</div>
	</div>

	<section class="section section-background section-footer" style="background-image: url(dimg/bizeulasin.png); background-position: 50% 100%;">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-6">
					<h2 class="mt-xl mb-none font" style="color:white;">Bize Ulaşın</h2>
					<p style="color:white;">Bize ulaşmak için aşağıda yer alan iletişim formunu doldurun.</p>
					<div class="divider divider-primary divider-small mb-xl">
						<hr>
					</div>
					<form action="../admin/netting/islem.php" method="POST"enctype="multipart/form-data">
						<div class="row">
							<div class="form-group">
								<div class="col-sm-6">
									<input type="text" placeholder="Ad *" data-msg-required="Lütfen adınızı giriniz. " maxlength="100" class="form-control" name="iletisim_ad"required>
								</div>
								<div class="col-sm-6">
									<input type="email" value="" placeholder="E-mail *" data-msg-required="Please enter your email address." data-msg-email="Lütfen e-mail adresinizi giriniz. " maxlength="100" class="form-control" name="iletisim_mail" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-12">
									<input type="text" value="" placeholder="Konu *" data-msg-required="Lütfen konuyu belirtiniz. " maxlength="100" class="form-control" name="iletisim_konu" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-12">
									<textarea maxlength="5000" placeholder="Mesaj *" data-msg-required="Lütfen mesaj yazınız. " rows="3" class="form-control" name="iletisim_mesaj"required></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div align="right">
									<button type="submit" name="iletisimgnd" class="btn btn-primary btn-lg mb-xlg">Gönder</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include 'footer.php'; ?>