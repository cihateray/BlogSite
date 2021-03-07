  <?php include 'header.php';
  include '../netting/baglan.php';

  $iletisimsor=$db->prepare("SELECT * FROM iletisim where iletisim_id=:iletisim_id");
  $iletisimsor->execute(array(
    'iletisim_id'=>$_GET['iletisim_id']
  ));
  $iletisimcek=$iletisimsor->fetch(PDO::FETCH_ASSOC);

  ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Mesaj Görüntüleme</h3>

        </div>

      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <div align="left" class="col-md-6">
                    <h2>Mesaj Detay</h2></div>
                    <div align="right" class="col-md-6">
                      <a href="mesajlar.php"><button class="btn btn-warning"><i class="fa fa-undo" arida-hidden="true">
                      </i>  Geri Dön</button></a></div>
                      <div class="clearfix"></div>
                    </div>
                    <form class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gönderen Adı <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea rows="2" cols="70" name="iletisim_ad" class="form-control col-md-7 col-xs-12" readonly><?php echo $iletisimcek['iletisim_ad']; ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gönderen Mail <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea rows="2" cols="70" name="iletisim_mail" class="form-control col-md-7 col-xs-12" readonly><?php echo $iletisimcek['iletisim_mail']; ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Konu <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea rows="2" cols="70" name="iletisim_konu" class="form-control col-md-7 col-xs-12" readonly><?php echo $iletisimcek['iletisim_konu']; ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mesaj <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea rows="10" cols="70" name="iletisim_mesaj" class="form-control col-md-7 col-xs-12" readonly><?php echo $iletisimcek['iletisim_mesaj']; ?></textarea>
                        </div>
                      </div>
                        <!-- 
                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                     <a href="../netting/islem.php?mesajlarsil=ok&iletisim_id=<?php echo $iletisimcek['iletisim_id']?>"><button style="width: 100px;" class="btn btn-danger btn-xs"><i class="fa fa-trash" arida-hidden="true"></i> Sil</button></a>
                   </div> -->

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