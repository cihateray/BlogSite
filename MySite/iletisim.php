<?php include 'header.php'; ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">
			<div class="col-md-7">
				<h1 class="mt-xl mb-none">Bize Ulaşın</h1>
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
					<div class="divider divider-primary divider-small mb-xl">
						<hr>
					</div>
					<p class="lead mb-xl mt-lg">Bize ulaşmak için aşağıda bulunan iletişim formunu eksizsizce doldurarak gönderebilirsiniz.</p>


					<form action="../admin/netting/islem.php" method="POST"enctype="multipart/form-data">
						<div class="row">
							<div class="form-group">
								<div class="col-md-12">
									<input type="text" placeholder="Adınızı giriniz" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control input-lg" name="iletisim_ad" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-12">
									<input type="email" placeholder="E-mail adresinizi giriniz" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control input-lg" name="iletisim_mail" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-12">
									<input type="text" placeholder="Konu" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control input-lg" name="iletisim_konu" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-12">
									<textarea maxlength="5000" placeholder="Mesaj" data-msg-required="Please enter your message." rows="5" class="form-control input-lg" name="iletisim_mesaj" required></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12" align="right">
								<button type="submit" name="iletisimgonder" class="btn btn-primary btn-lg mb-xlg">Gönder</button>
							</div>
						</div>
					</form>

				</div>
				<div class="col-md-4 col-md-offset-1">

					<h4 class="mt-xl mb-none">Adres İletişim</h4>
					<div class="divider divider-primary divider-small mb-xl">
						<hr>
					</div>

					<ul class="list list-icons list-icons-style-3 mt-xlg mb-xlg">
						<li><i class="fa fa-map-marker"></i> <strong>Adres: </strong><?php echo $ayarcek['ayar_adres']; ?>
						<br><?php echo $ayarcek['ayar_ilce']; ?> | <?php echo $ayarcek['ayar_il']; ?></li>
						<li><i class="fa fa-phone"></i> <strong>Telefon numarası: </strong><?php echo $ayarcek['ayar_tel']; ?></li>
						<li><i class="fa fa-envelope"></i> <strong>Mail Adresi: </strong> <a href="<?php echo $ayarcek['ayar_mail']; ?>"><?php echo $ayarcek['ayar_mail']; ?></a></li>
					</ul>

					<h4 class="pt-xl mb-none">Mesai Saatleri</h4>
					<div class="divider divider-primary divider-small mb-xl">
						<hr>
					</div>

					<p><?php echo $ayarcek['ayar_mesai']; ?></p>

				</div>
			</div>
		</div>

		<!-- Google Maps - Go to the bottom of the page to change settings and map location. 
		 <div id="googlemaps" class="google-map google-map-footer"></div>-->
	</div>
	<?php include 'footer.php'; ?>
