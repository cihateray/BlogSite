<?php include 'header.php';
include '../netting/baglan.php';

$iletisimsor=$db->prepare("SELECT * FROM iletisim order by iletisim_id");
$iletisimsor->execute();
$say=$iletisimsor->rowCount();

?>
<?php

if (@$_GET['durum']=='okeyto'){?>
  <script type="text/javascript">
    confirm("Mesajınız Gönderildi")
    ;
    </script><?php

  }
  else if (@$_GET['durum']=='nonono'){?>
    <script type="text/javascript">
      confirm("Mesajınız Gönderilemedi")
      ;
      </script><?php
    }
    ?>

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Mesajlar</h3>

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

                      <h2>Mesaj Görüntüleme
                       <small> 
                        <?php
                        echo $say." kayıt listelendi.";

                        if (@$_GET['durum']=='ok'){?> 
                          <b style="color:green;">İşlem Başarılı...</b> 
                        <?php } 
                        else if (@$_GET['durum']=='no'){ ?> 
                          <b style="color:red;">İşlem Başarısız...</b>
                        <?php }
                        ?> </small></h2>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                      <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <tr class="headings">
                              <th class="column-title">Gönderen Adı </th>
                              <th class="column-title">Gönderen Mail </th>
                              <th class="column-title">Konu </th>
                              <th class="column-title">Mesaj </th>
                              <th width="100px" class="column-title text-center"></th>
                              <th width="100px" class="column-title text-center"></th>
                              <th width="100px" class="column-title text-center"></th>
                            </th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php


                          $iletisimsor=$db->prepare("select * from iletisim");
                          $iletisimsor -> execute();
                          while($iletisimcek=$iletisimsor->fetch(PDO::FETCH_ASSOC)){
                            ?>

                            <tr>

                              <td><?php echo substr($iletisimcek['iletisim_ad'],0,20)?></td>
                              <td><?php echo substr($iletisimcek['iletisim_mail'],0,20)?></td>
                              <td><?php echo substr($iletisimcek['iletisim_konu'],0,20)?></td>
                              <td><?php echo substr($iletisimcek['iletisim_mesaj'],0,20)?></td>

                              <td class="text-center"><a href="mesaj-detay.php?iletisim_id=<?php echo $iletisimcek['iletisim_id']?>"><button style="width: 100px;" class="btn btn-primary btn-xs"><i class="fa fa-book" arida-hidden="true"></i> Mesaja bak</button></a></td>

                              <td class="text-center"><a href="mesaj-gonder.php?iletisim_id=<?php echo $iletisimcek['iletisim_id']?>"><button style="width: 80px;" class="btn btn-success btn-xs"><i class="fa fa-envelope-o arida-hidden=true"></i> Cevapla</button></a></td>

                              <td class="text-center"><a href="../netting/islem.php?mesajlarsil=ok&iletisim_id=<?php echo $iletisimcek['iletisim_id']?>"><button style="width: 80px;" class="btn btn-danger btn-xs"><i class="fa fa-trash" arida-hidden="true"></i> Sil</button></a></td>




                            </td>
                          </tr>   
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
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