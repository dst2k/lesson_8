<?php
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);

if(empty($name) OR empty($email) OR empty($message))
{
	die('Пожалуйста, заполните все поля!!!');
}
elseif(mb_strlen($name) > 250 OR mb_strlen($email) > 250)
{
	die("Многа букаф =(");
}
elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
{
	die('Введите правильный email');
}
else
{
	$fh = fopen('requests.txt', 'a');
	$date = date('F d, Y, G:i');
	$cont = $date.PHP_EOL."Имя: ".$name.PHP_EOL."Email: ".$email.PHP_EOL.$message.PHP_EOL."=================".PHP_EOL;
	fwrite($fh, $cont);
	fclose($fh);
	header('Location: index.php');
}


echo '<pre>';
var_dump($_POST);
echo '</pre>';




?>