  <?php include 'header.php';
  include '../netting/baglan.php';
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
                  <h2>İçerik Ekleme<small> 
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

                  <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="first-name" required="required" name="icerik_resimyol" class="form-control col-md-7 col-xs-12">
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik Ad <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="icerik_ad" placeholder="İçerik adını giriniz..." class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik Detay <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="ckeditor" id="editor1" name="icerik_detay"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik Keyword <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="icerik_keyword" placeholder="Anahtar kelime giriniz..." class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik Durum <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="heard" class="form-control" name="icerik_durum" required="required">
                          <option value="1">Aktif</option>
                          <option value="0">Pasif</option>
                        </select>
                      </div>
                    </div>

                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" name="icerikkaydet" class="btn btn-primary">Kaydet</button>
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