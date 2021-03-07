<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Yönetici Giriş </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="../netting/islem.php" method="POST">
            <h1>İki Teker Bir Dünya </br></br> Yönetici Giriş Paneli</h1>
            <div>
              <input type="text" name="kullaniciad" class="form-control" placeholder="Kullanıcı Adınız" required="" />
            </div>
            <div>
              <input type="password" name="kullanicisifre" class="form-control" placeholder="Şifreniz" required="" />
            </div>
            <div>
              <button class="btn btn-default" type="submit" name="admingiris" style="width: 100%;
              background-color:#73989C;
              color: white;">Giriş Yap</button>

            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link"></p>
              <?php 
              if (@$_GET['durum']=="no")
              {
                echo "Kullanıcı Bulunamadı...";
              }
              if (@$_GET['exit']=="yes")
              {
                echo "Başarıyla çıkış yaptınız.";
              }
              ?>
              <div> </br>
                <h1><i class="fa fa-motorcycle"></i> İki Teker Bir Dünya</h1>
                <p>Cihat Eray Yazıcı © Copyright 2020 |</p>
              </div>
            </div>
          </form>
        </section>
      </div>


    </div>
  </div>
</body>
</html>
