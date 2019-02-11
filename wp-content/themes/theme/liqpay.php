<body onLoad="document.getElementById('sendliq').click()">
<?php
require("api.php");
$micro = sprintf("%06d",(microtime(true) - floor(microtime(true))) * 1000000);
$number = date("YmdHis");
$order_id = $number.$micro;
$merchant_id='i95693185138';
$signature="uDr9ibqSWJvQY1wISvxD8R1pSSnlZ7agMKuNfZqB";

if(isset($_POST['continius'])){
    $continius = 'Постоянный платеж: Включен';
}
$desc = 'Клиент: '.$_POST['order_billing_first_name'].',  Телефон: '.$_POST['order_phone'].',  E-mail: '.$_POST['order_email'].
		' Платеж за заказ ID: '.$_POST['order_number'];
$price = preg_replace("/[^0-9]/", '', $_POST['order_price']);
$liqpay = new LiqPay($merchant_id, $signature);
$html = $liqpay->cnb_form(array(
	'version' => '3',
	'result_url' => '//myshoes.space/thank-you',
	'amount' => "$price",
	'subscribe' => $_POST['continius'],
	'currency' => 'UAH',
	'description' => $desc,
	'order_id' => $order_id
));

echo $html;
?>
</body>