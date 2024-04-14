<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	if($_POST) {
		$name 		= htmlspecialchars(stripslashes(trim($_POST['name'])));
		$tel 			= htmlspecialchars(stripslashes(trim($_POST['phone'])));
		$email 		= htmlspecialchars(stripslashes(trim($_POST['email'])));
		$subject 	= htmlspecialchars(stripslashes(trim($_POST['subject'])));
		$country 	= htmlspecialchars(stripslashes(trim($_POST['country'])));
		$message 	= htmlspecialchars(stripslashes(trim($_POST['message'])));

		$mail=new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth=true;
		$mail->SMTPSecure="tls";
		$mail->Port=587;
		$mail->Subject = mb_convert_encoding($subject, "UTF-8", "auto");
		$mail->CharSet = 'UTF-8';
		$mail->Encoding = 'base64';
		$mail->Host="smtp.gmail.com";
		$mail->Username="buntacademy@gmail.com";
		$mail->Password="beev ivqy otob nqat";
		$mail->addAddress("i.karrabulut@gmail.com");
		$mail->Subject=$subject;
		
		$mail->Body='
		Adı Soyadı: '.$name.', 
		Telefon: '.$tel.', 
		E-Posta: '.$email.', 
		Subject: '.$subject.', 
		Ülke: '.$country.', 
		Mesaj: '.$message.'
		';
		if($mail->Send()){
			echo "Mail Gönderildi.";
		}else{
			echo "Mail Gönderilemedi.";
		}
	?>
		<?php
		?>
	<?php
	}else{
		?>
		<!DOCTYPE html>
		<html lang="tr">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Document</title>
				<link rel="stylesheet" href="main.css">
			</head>
			<body>
				<form class="material-form" action="#" method="post">
					<div class="input-block floating-field">
						<label>Ad Soyad</label>
						<input name="name" value="" type="text" class="form-control">
					</div>
					<div class="input-block floating-field">
						<label>E-Posta Adresi</label>
						<input name="email" value="" type="text" class="form-control">
					</div>
					<div class="input-block floating-field">
						<label>Telefon Numarası</label>
						<input name="phone" value="" type="tel" class="form-control">
					</div>

					<div class="select-block">
						<label>Ülke</label>
						<div class="custom-select">
							<div class="active-list">Türkiye</div>
							<input name="country" type="text" class="list-field" value="Türkiye" />
							<ul class="drop-down-list">
								<li>Türkiye</li>
								<li>Almanya</li>
								<li>Amerika</li>
								<li>İngiltere</li>
								<li>Fransa</li>
							</ul>
						</div>
					</div>
					<div class="form-note">Aktif yaşadığınız ülkeyi seçiniz.</div>
					<div class="select-block">
						<label>Konu Seçiniz</label>
						<div class="custom-select">
							<div class="active-list">Konu Seçiniz</div>
							<input name="subject" type="text" class="list-field" value="Konu Seçiniz" />
							<ul class="drop-down-list">
								<li>Ücret hakkında bilgi almak istiyorum.</li>
								<li>Öğretmenler hakkında bilgi almak istiyorum.</li>
								<li>Ders saatleri hakkında bilgi almak istiyorum.</li>
								<li>Diğer</li>
							</ul>
						</div>
					</div>
					<div class="input-block floating-field textarea">
						<label>Mesajınız</label>
						<textarea name="message" rows="3" class="form-control"></textarea>
					</div>
					<button class="btn square-button material-btn" type="submit">Formu Gönder</button>
				</form>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
				<script>
					//Important Note

					//This pen Copyrighted (c) 2016 by Nikhil Krishnan (https://codepen.io/nikhil8krishnan/pen/ALLLkv). If you have any query please let me know at nikhil8krishnan@gmail.com.

					//material contact form animation
					var floatingField = $(".material-form .floating-field").find(".form-control");
					var formItem = $(".material-form .input-block").find(".form-control");

					//##case 1 for default style
					//on focus
					formItem.focus(function() {
						$(this).parent(".input-block").addClass("focus");
					});
					//removing focusing
					formItem.blur(function() {
						$(this).parent(".input-block").removeClass("focus");
					});

					//##case 2 for floating style
					//initiating field
					floatingField.each(function() {
						var targetItem = $(this).parent();
						if ($(this).val()) {
							$(targetItem).addClass("has-value");
						}
					});

					//on typing
					floatingField.blur(function() {
						$(this).parent(".input-block").removeClass("focus");
						//if value is not exists
						if ($(this).val().length == 0) {
							$(this).parent(".input-block").removeClass("has-value");
						} else {
							$(this).parent(".input-block").addClass("has-value");
						}
					});

					//dropdown list
					$("body").click(function() {
						if ($(".custom-select .drop-down-list").is(":visible")) {
							$(".custom-select").parent().removeClass("focus");
						}
						$(".custom-select .drop-down-list:visible").slideUp();
					});
					$(".custom-select .active-list").click(function() {
						$(this).parent().parent().addClass("focus");
						$(this)
							.parent()
							.find(".drop-down-list")
							.stop(true, true)
							.delay(10)
							.slideToggle(300);
					});
					$(".custom-select .drop-down-list li").click(function() {
						var listParent = $(this).parent().parent();
						//listParent.find('.active-list').trigger("click");
						listParent.parent(".select-block").removeClass("focus").addClass("added");
						listParent.find(".active-list").text($(this).text());
						listParent.find("input.list-field").attr("value", $(this).text());
					});
				</script>
			</body>
		</html>
		<?php
	}
?>