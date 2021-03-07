  <?php 
  include 'header.php';
  include '../netting/baglan.php';
$iceriksor=$db->prepare("SELECT * FROM icerik where icerik_id=:icerik_id");
$iceriksor->execute(array(
'icerik_id'=>$_GET['icerik_id']
));

    $icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC);
  ?>
    <head>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
      CKEDITOR.replace( 'editor1',
      {
        filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
        filebrowserWindowWidth : '1000',
        filebrowserWindowHeight : '700'
      });

    </script>

  </head>
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>İçerik İşlemleri</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                    <div align="left" class="col-md-6">
                    <h2>İçerik Düzenleme
                     <small> 
                    <?php 
                    if (@$_GET['durum']=='ok'){?> 
                      <b style="color:green;">İşlem Başarılı...</b> 
                    <?php } 
                    else if (@$_GET['durum']=='no'){ ?> 
                      <b style="color:red;">İşlem Başarısız...</b>
                    <?php }
                    ?> </small></h2></div>
                    <div align="right" class="col-md-6">
                      <a href="icerik.php"><button class="btn btn-warning"><i class="fa fa-undo" arida-hidden="true">
                      </i>  Geri Dön</button></a></div>
                    <div class="clearfix"></div>
                  </div>

                 <div class="x_content">

                  <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <input type="hidden" name="icerik_id" value="<?php echo $icerikcek['icerik_id']; ?>">
                    <input type="hidden" name="icerik_resimyol" value="<?php echo $icerikcek['icerik_resimyol']; ?>">


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Resim <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <img width="200" height="100" src="assets/images/foto.jpg">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="first-name" name="icerik_resimyol" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">icerik Ad <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="icerik_ad" 
                        value="<?php echo $icerikcek['icerik_ad']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik Tarih-Saat <span class="required">*</span>
                      </label>
                        <div class="col-md-3">
                          <input type="date" id="first-name" required="required" name="icerik_tarih" value="<?php echo date('Y-m-d')?>" class="form-control col-md-7 col-xs-12">
                        </div>

                        <div class="col-md-3">
                          <input type="time" id="first-name" required="required" name="icerik_saat" value="<?php echo date('H:i:s')?>" class="form-control col-md-7 col-xs-12">    
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik Detay <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="ckeditor" id="editor1" name="icerik_detay"><?php echo $icerikcek['icerik_detay']; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik Keyword <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="icerik_keyword" value="<?php echo $icerikcek['icerik_keyword']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">icerik Durum <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="heard" class="form-control" name="icerik_durum" required="required">
                          <?php 
                          if($icerikcek['icerik_durum']==1){ ?>

                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                          
                          <?php } else { ?>

                            <option value="0">Pasif</option>
                            <option value="1">Aktif</option>
                            
                          <?php }
                          ?>
                          
                        </select>
                      </div>
                    </div>

                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" name="icerikduzenle" class="btn btn-primary">Güncelle</button>
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