<?php
$token = "5910973138:AAF_tvEnFX3BWzhThTJD62Mt7WSsZ2du0_Y";
$chat_id = "-1001957617848";
$name = $_POST['name'];
$phone = $_POST['phone'];

if($_POST['bottle']) {
    $arr = array(
      'Имя:' => $name,
      'Телефон:' => $phone,
      'Количество бутылок:' => $_POST['bottle'],
      'На сумму:' => $_POST['price'],
    );
  }else {
    $arr = array(
      'Имя:' => $name,
      'Телефон:' => $phone
    );
  }
foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
};
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

$to = $_POST['mail']; // емайл получателя данных из формы
$tema = "Заявка с сайта"; // тема полученного емайла
// $message = "Ваше имя: ".$_POST['name']."<br>";//присвоить переменной значение, полученное из формы name=name
// $message .= "E-mail: ".$_POST['email']."<br>"; //полученное из формы name=email
// $message .= "Номер телефона: ".$_POST['phone']."<br>"; //полученное из формы name=phone
// $message .= "Сообщение: ".$_POST['message']."<br>"; //полученное из формы name=message
$headers = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
mail($to, $tema, $txt, $headers); //отправляет получателю на емайл значения переменных

?>