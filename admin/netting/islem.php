<?php 
ob_start();
session_start();
include "baglan.php";

if(isset($_POST['admingiris'])){
	$kullaniciad=$_POST['kullaniciad'];
	$kullanicisifre=md5($_POST['kullanicisifre']);

	if($kullaniciad && $kullanicisifre){

		$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_ad=:ad and kullanici_sifre=:sifre");
		$kullanicisor->execute(array(
			'ad'=>$kullaniciad,
			'sifre'=>$kullanicisifre,
		));
		$say=$kullanicisor->rowCount();
		if($say>0){
			$_SESSION['ad']= $kullaniciad;
			
			header('location:../production/index.php');
		}
		else {
			header('location:../production/login.php?durum=no');
		}
	}

}

if(isset($_POST['kullanicikaydet'])){

	$kullanicisifre=md5($_POST['kullanici_sifre']);

	$kullanicikaydet=$db->prepare("UPDATE kullanici SET
		kullanici_adsoyad=:adsoyad,
		kullanici_sifre=:sifre
		where kullanici_id={$_POST['kullanici_id']}");

	$update=$kullanicikaydet->execute(array(
		'adsoyad'=> $_POST['kullanici_adsoyad'],
		'sifre'=> $kullanicisifre
	));

	if($update){
		header("location:../production/kullanici-profil.php?durum=ok");
	} else{
		header("location:../production/kullanici-profil.php?durum=no");
	}
}

if(isset($_POST['genelayarkaydet'])){

	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_siteurl=:siteurl,
		ayar_title=:title,
		ayar_description=:description,
		ayar_keywords=:keywords,
		ayar_author=:author

		where ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'siteurl'=> $_POST['ayar_siteurl'],
		'title'=> $_POST['ayar_title'],
		'description'=> $_POST['ayar_description'],
		'keywords'=> $_POST['ayar_keywords'],
		'author'=> $_POST['ayar_author']	

	));

	if($update){
		header("location:../production/genel-ayar.php?durum=ok");
	} else{
		header("location:../production/genel-ayar.php?durum=no");
	}
}

if(isset($_POST['iletisimayarkaydet'])){

	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:tel,
		ayar_gsm=:gsm,
		ayar_faks=:faks,
		ayar_mail=:mail,
		ayar_adres=:adres,
		ayar_ilce=:ilce,
		ayar_il=:il,
		ayar_mesai=:mesai

		where ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'tel'=> $_POST['ayar_tel'],
		'gsm'=> $_POST['ayar_gsm'],
		'faks'=> $_POST['ayar_faks'],
		'mail'=> $_POST['ayar_mail'],
		'adres'=> $_POST['ayar_adres'],
		'ilce'=> $_POST['ayar_ilce'],
		'il'=> $_POST['ayar_il'],
		'mesai'=> $_POST['ayar_mesai']

	));

	if($update){
		header("location:../production/iletisim-ayar.php?durum=ok");
	} else{
		header("location:../production/iletisim-ayar.php?durum=no");
	}
}

if(isset($_POST['apiayarkaydet'])){

	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_recaptcha=:recaptcha,
		ayar_googlemap=:googlemap,
		ayar_analystic=:analystic

		where ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'recaptcha'=> $_POST['ayar_recaptcha'],
		'googlemap'=> $_POST['ayar_googlemap'],
		'analystic'=> $_POST['ayar_analystic']

	));

	if($update){
		header("location:../production/api-ayar.php?durum=ok");
	} else{
		header("location:../production/api-ayar.php?durum=no");
	}
}

if(isset($_POST['sosyalayarkaydet'])){

	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_facebook=:facebook,
		ayar_twitter=:twitter,
		ayar_youtube=:youtube,
		ayar_google=:google

		where ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'facebook'=> $_POST['ayar_facebook'],
		'twitter'=> $_POST['ayar_twitter'],
		'youtube'=> $_POST['ayar_youtube'],
		'google'=> $_POST['ayar_google']

	));

	if($update){
		header("location:../production/sosyal-ayar.php?durum=ok");
	} else{
		header("location:../production/sosyal-ayar.php?durum=no");
	}
}

if(isset($_POST['mailayarkaydet'])){

	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_smtphost=:smtphost,
		ayar_smtpuser=:smtpuser,
		ayar_smtppassword=:smtppassword,
		ayar_smtpport=:smtpport

		where ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'smtphost'=> $_POST['ayar_smtphost'],
		'smtpuser'=> $_POST['ayar_smtpuser'],
		'smtppassword'=> $_POST['ayar_smtppassword'],
		'smtpport'=> $_POST['ayar_smtpport']

	));

	if($update){
		header("location:../production/mail-ayar.php?durum=ok");
	} else{
		header("location:../production/mail-ayar.php?durum=no");
	}
}


if(isset($_POST['hakkimizdakaydet'])){

	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:baslik,
		hakkimizda_icerik=:icerik,
		hakkimizda_video=:video,
		hakkimizda_vizyon=:vizyon,
		hakkimizda_misyon=:misyon

		where hakkimizda_id=0");

	$update=$ayarkaydet->execute(array(
		'baslik'=> $_POST['hakkimizda_baslik'],
		'icerik'=> $_POST['hakkimizda_icerik'],
		'video'=> $_POST['hakkimizda_video'],
		'vizyon'=> $_POST['hakkimizda_vizyon'],
		'misyon'=> $_POST['hakkimizda_misyon']	

	));

	if($update){
		header("location:../production/hakkimizda.php?durum=ok");
	} else{
		header("location:../production/hakkimizda.php?durum=no");
	}
}

if(isset($_POST['sliderkaydet'])){

	$uploads_dir='../../Mysite/dimg/slider';
	@$tmp_name=$_FILES['slider_resimyol']['tmp_name'];
	@$name=$_FILES['slider_resimyol']['name'];
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir,6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:ad, 
		slider_link=:link,
		slider_sira=:sira,
		slider_durum=:durum,
		slider_resimyol=:resimyol");

	$insert=$kaydet->execute(array(
		'ad' => $_POST['slider_ad'],
		'link' => $_POST['slider_link'],
		'sira' => $_POST['slider_sira'],
		'durum' => $_POST['slider_durum'],
		'resimyol'=>$refimgyol,
	));

	if($insert){
		header("location:../production/slider.php?durum=ok");
	} else{
		header("location:../production/slider.php?durum=no");
	}
}

if($_GET['slidersil']=='ok'){

	$id=$_GET['slider_id'];
	$res=$db->prepare("SELECT * from slider WHERE slider_id=?");
	$res->execute(array($id));
	$bul=$res->fetch(PDO::FETCH_ASSOC);
	$resimsil=$bul['slider_resimyol'];
	unlink("../../$resimsil");


	$sil=$db->prepare("DELETE FROM slider where slider_id=:slider_id");
	$kontrol=$sil->execute(array(
		'slider_id'=>$_GET['slider_id']
	));
	if($kontrol){

		header("location:../production/slider.php?durum=ok");
	} else{
		header("location:../production/slider.php?durum=no");
	}
}

if(isset($_POST['sliderduzenle'])){

	if($_FILES['slider_resimyol']["size"] > 0) {

		$uploads_dir='../../Mysite/dimg/slider';
		@$tmp_name=$_FILES['slider_resimyol']['tmp_name'];
		@$name=$_FILES['slider_resimyol']['name'];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir,6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum,
			slider_resimyol=:resimyol

			where slider_id={$_POST['slider_id']}");

		$update=$duzenle->execute(array(
			'ad'=> $_POST['slider_ad'],
			'link'=> $_POST['slider_link'],
			'sira'=> $_POST['slider_sira'],
			'durum'=> $_POST['slider_durum'],
			'resimyol' => $refimgyol

		));
		$slider_id=$_POST['slider_id'];
		if($update){

			$resimsilunlink=$_POST['slider_resimyol'];
			unlink("../../$resimsilunlink");

			header("location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");
		} else{
			header("location:../production/slider-duzenle.php?durum=no");
		}

	}
	else{

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum

			where slider_id={$_POST['slider_id']}");

		$update=$duzenle->execute(array(
			'ad'=> $_POST['slider_ad'],
			'link'=> $_POST['slider_link'],
			'sira'=> $_POST['slider_sira'],
			'durum'=> $_POST['slider_durum']

		));
		$slider_id=$_POST['slider_id'];
		if($update){
			header("location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");
		} else{
			header("location:../production/slider-duzenle.php?durum=no");
		}
	}
}

if(isset($_POST['icerikkaydet'])){

	$uploads_dir='../../Mysite/dimg/icerik';
	@$tmp_name=$_FILES['icerik_resimyol']['tmp_name'];
	@$name=$_FILES['icerik_resimyol']['name'];
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir,6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$kaydet=$db->prepare("INSERT INTO icerik SET
		icerik_ad=:ad, 
		icerik_detay=:detay,
		icerik_keyword=:keyword,
		icerik_durum=:durum,
		icerik_resimyol=:resimyol,
		icerik_zaman=:zaman");

	$insert=$kaydet->execute(array(
		'ad' => $_POST['icerik_ad'],
		'detay' => $_POST['icerik_detay'],
		'keyword' => $_POST['icerik_keyword'],
		'durum' => $_POST['icerik_durum'],
		'resimyol'=>$refimgyol,
		'zaman'=>$zaman,
	));

	if($insert){
		header("location:../production/icerik.php?durum=ok");
	} else{
		header("location:../production/icerik.php?durum=no");
	}
}


if(isset($_POST['icerikduzenle'])){

	if($_FILES['icerik_resimyol']["size"] > 0) {

		$uploads_dir='../../Mysite/dimg/icerik';
		@$tmp_name=$_FILES['icerik_resimyol']['tmp_name'];
		@$name=$_FILES['icerik_resimyol']['name'];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir,6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");


		$tarih=$_POST['icerik_tarih'];
		$saat=$_POST['icerik_saat'];
		$zaman=$tarih." ".$saat;


		$duzenle=$db->prepare("UPDATE icerik SET
			icerik_ad=:ad, 
			icerik_detay=:detay,
			icerik_keyword=:keyword,
			icerik_durum=:durum,
			icerik_resimyol=:resimyol,
			icerik_zaman=:zaman

			where icerik_id={$_POST['icerik_id']}");

		$update=$duzenle->execute(array(
			'ad' => $_POST['icerik_ad'],
			'detay' => $_POST['icerik_detay'],
			'keyword' => $_POST['icerik_keyword'],
			'durum' => $_POST['icerik_durum'],
			'resimyol'=>$refimgyol,
			'zaman'=>$zaman

		));

		$icerik_id=$_POST['icerik_id'];
		if($update){

			$resimsilunlink=$_POST['icerik_resimyol'];
			unlink("../../$resimsilunlink");

			header("location:../production/icerik-duzenle.php?icerik_id=$icerik_id&durum=ok");
		} else{
			header("location:../production/icerik-duzenle.php?durum=no");
		}

	}
	else{
		$tarih=$_POST['icerik_tarih'];
		$saat=$_POST['icerik_saat'];
		$zaman=$tarih." ".$saat;

		$duzenle=$db->prepare("UPDATE icerik SET
			icerik_ad=:ad, 
			icerik_detay=:detay,
			icerik_keyword=:keyword,
			icerik_durum=:durum,
			icerik_zaman=:zaman

			where icerik_id={$_POST['icerik_id']}");

		$update=$duzenle->execute(array(
			'ad' => $_POST['icerik_ad'],
			'detay' => $_POST['icerik_detay'],
			'keyword' => $_POST['icerik_keyword'],
			'durum' => $_POST['icerik_durum'],
			'zaman'=>$zaman
		));
		$icerik_id=$_POST['icerik_id'];
		if($update){
			header("location:../production/icerik-duzenle.php?icerik_id=$icerik_id&durum=ok");
		} else{
			header("location:../production/icerik-duzenle.php?durum=no");
		}
	}
}

if($_GET['iceriksil']=='ok'){

	$id=$_GET['icerik_id'];
	$res=$db->prepare("SELECT * from icerik WHERE icerik_id=?");
	$res->execute(array($id));
	$bul=$res->fetch(PDO::FETCH_ASSOC);
	$resimsil=$bul['icerik_resimyol'];
	unlink("../../$resimsil");



	$sil=$db->prepare("DELETE FROM icerik where icerik_id=:icerik_id");
	$kontrol=$sil->execute(array(
		'icerik_id'=>$_GET['icerik_id']
	));
	if($kontrol){

		header("location:../production/icerik.php?durum=ok");
	} else{
		header("location:../production/icerik.php?durum=no");
	}
}


if(isset($_POST['iletisimgonder'])){

	$iletisimkaydet=$db->prepare("INSERT INTO iletisim SET
		iletisim_ad=:ad,
		iletisim_mail=:mail,
		iletisim_konu=:konu,
		iletisim_mesaj=:mesaj");

	$kaydet=$iletisimkaydet->execute(array(
		'ad'=> $_POST['iletisim_ad'],
		'mail'=> $_POST['iletisim_mail'],
		'konu'=> $_POST['iletisim_konu'],
		'mesaj'=> $_POST['iletisim_mesaj']	

	));


	if($kaydet){
		header("location:../../Mysite/iletisim.php?durum=ok");
	} else{
		header("location:../../Mysite//iletisim.php?durum=no");
	}
}

if(isset($_POST['iletisimgnd'])){

	$iletisimkaydet=$db->prepare("INSERT INTO iletisim SET
		iletisim_ad=:ad,
		iletisim_mail=:mail,
		iletisim_konu=:konu,
		iletisim_mesaj=:mesaj");

	$kaydet=$iletisimkaydet->execute(array(
		'ad'=> $_POST['iletisim_ad'],
		'mail'=> $_POST['iletisim_mail'],
		'konu'=> $_POST['iletisim_konu'],
		'mesaj'=> $_POST['iletisim_mesaj']	

	));


	if($kaydet){
		header("location:../../Mysite/index.php?durum=ok");
	} else{
		header("location:../../Mysite/index.php?durum=no");
	}
}

if($_GET['mesajlarsil']=='ok'){

	$id=$_GET['iletisim_id'];
	$res=$db->prepare("SELECT * from iletisim WHERE iletisim_id=?");
	$res->execute(array($id));
	$bul=$res->fetch(PDO::FETCH_ASSOC);

	$sil=$db->prepare("DELETE FROM iletisim where iletisim_id=:iletisim_id");
	$kontrol=$sil->execute(array(
		'iletisim_id'=>$_GET['iletisim_id']
	));
	if($kontrol){

		header("location:../production/mesajlar.php?durum=ok");
	} else{
		header("location:../production/mesajlar.php?durum=no");
	}
}

if(isset($_POST['menukaydet'])){

	$kategori_id1="1";
	$kategori_icon1="icon";
	$kaydet=$db->prepare("INSERT INTO menu SET
		menu_ust=:ust, 
		menu_ad=:ad,
		menu_url=:url,
		menu_detay=:detay,
		menu_sira=:sira,
		menu_durum=:durum,
		kategori_id=:kategori_id1,
		kategori_icon=:kategori_icon1
		");

	$insert=$kaydet->execute(array(
		'ust' => $_POST['menu_ust'],
		'ad' => $_POST['menu_ad'],
		'url' => $_POST['menu_url'],
		'detay' => $_POST['menu_detay'],
		'sira' => $_POST['menu_sira'],
		'durum' => $_POST['menu_durum'],
		'kategori_id1' => $kategori_id1,
		'kategori_icon1' => $kategori_icon1,

	));

	if($insert){
		header("location:../production/menu.php?durum=ok");
	} else{
		header("location:../production/menu.php?durum=no");
	}
}

?>