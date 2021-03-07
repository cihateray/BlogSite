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
                  <h2>Sosyal Ayarları<small> <?php 
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" name="ayar_facebook" value="<?php echo $ayarcek['ayar_facebook']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Twitter <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" name="ayar_twitter" value="<?php echo $ayarcek['ayar_twitter']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Youtube <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" name="ayar_youtube" value="<?php echo $ayarcek['ayar_youtube']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Google <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" name="ayar_google" value="<?php echo $ayarcek['ayar_google']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="sosyalayarkaydet" class="btn btn-primary">Güncelle</button>
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