  <?php include 'header.php';
  include '../netting/baglan.php';
  $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_ad=:ad");
  $kullanicisor->execute(array(
    'ad'=>$_SESSION['ad'],
  ));
  $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

  ?>
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Kullanıcı Profil İşlemleri</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Kullanıcı : <?php echo $kullanicicek['kullanici_adsoyad']; ?><small> 
                  <?php 
                  if (@$_GET['durum']=='ok'){?> 
                    <b style="color:green;">Güncelleme Başarılı...</b> 
                  <?php } 
                  else if (@$_GET['durum']=='no'){ ?> 
                    <b style="color:red;">Güncelleme Başarısız...</b>
                  <?php }
                  ?> </small></h2>

                  <ul class="nav navbar-right panel_toolbox">
                   <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                   </li>
                   <li><a class="close-link"><i class="fa fa-close"></i></a>
                   </li>
                 </ul>
                 <div class="clearfix"></div>
               </div>

               <div class="x_content">

                <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yönetici Ad Soyad <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Ad <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input readonly="" type="text" id="first-name" required="required" name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Şifre <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="first-name" required="required" name="kullanici_sifre" value="<?php echo $kullanicicek['kullanici_sifre']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">

                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="kullanicikaydet" class="btn btn-primary">Güncelle</button>
                  </div>


                </form>
              </div>
            </div>
          </div>                 
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<?php include 'footer.php' ?>