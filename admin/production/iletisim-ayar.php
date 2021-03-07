  <?php include 'header.php';
  include '../netting/baglan.php';
  $ayarsor=$db->prepare("select*from ayar where ayar_id=?");
  $ayarsor->execute(array(0));
  $ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

  ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Ayarlar</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>İletişim Ayarları<small> <?php 
                  if (@$_GET['durum']=='ok') {?> <b style="color:green;">Güncelleme Başarılı...</b> <?php } 
                  else if (@$_GET['durum']=='no'){ ?> <b style="color:red;">Güncelleme Başarısız...</b> <?php }
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Numarası <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ayar_tel" value="<?php echo $ayarcek['ayar_tel']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gsm Numaranız <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ayar_gsm" value="<?php echo $ayarcek['ayar_gsm']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Faks Numaranız <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ayar_faks" value="<?php echo $ayarcek['ayar_faks']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail Adresiniz <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ayar_mail" value="<?php echo $ayarcek['ayar_mail']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adresiniz <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ayar_adres" value="<?php echo $ayarcek['ayar_adres']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İlçeniz <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ayar_ilce" value="<?php echo $ayarcek['ayar_ilce']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İliniz <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ayar_il" value="<?php echo $ayarcek['ayar_il']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mesai Saatleriniz <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ayar_mesai" value="<?php echo $ayarcek['ayar_mesai']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>


                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="iletisimayarkaydet" class="btn btn-primary">Güncelle</button>
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