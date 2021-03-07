<?php
include '../admin/netting/baglan.php';
$ayarsor=$db->prepare("select*from ayar where ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

include "../phpmail/class.phpmailer.php";

if(isset($_POST['iletisimgonder'])){
	$_ad=htmlspecialchars(trim($_POST['ad']));
	$_email=htmlspecialchars(trim($_POST['email']));
	$_konu=htmlspecialchars(trim($_POST['konu']));
	$_mesaj=htmlspecialchars(trim($_POST['mesaj']));

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->Host = $ayarcek['ayar_smtphost'];
	$mail->Port = $ayarcek['ayar_smtpport'];
	$mail->SMTPSecure = 'ssl';
	$mail->Username = $ayarcek['ayar_smtpuser'];
	$mail->Password = $ayarcek['ayar_smtppassword'];
	$mail->SetFrom($mail->Username,$_ad);
	$mail->AddAddress($_email, $_ad);
	$mail->CharSet = 'UTF-8';
	$mail->Subject = 'Bigilendirme Maili';
	$content = 'Firma Mesajı: ';
	$mail->MsgHTML($content);
	if($mail->Send()) {
	} 
	else {
		echo $mail->ErrorInfo;
	}

}


	?>