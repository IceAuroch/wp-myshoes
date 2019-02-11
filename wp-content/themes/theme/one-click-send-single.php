<?php
    if((isset($_POST['name-single'])&&$_POST['name-single']!="")&&(isset($_POST['tel-single'])&&$_POST['tel-single']!="")){ //Проверка отправилось ли наше поля name и не пустые ли они
            $to = 'sales@myshoes.space'; //Почта получателя, через запятую можно указать сколько угодно адресов
            $subject = 'Быстрый заказ «' . $_POST['model-single'] . '»'; //Загаловок сообщения
            $message = '
                    <html>
                        <head>
                            <title>'.$subject.'</title>
                        </head>
                        <body>
                            <p>Имя: <b>'.$_POST['name-single'].'</b></p>
                            <p>Телефон: '.$_POST['tel-single'].'</p>
                            <p>Хочет купить <b>' . $_POST['model-single'] . '.</b></p>
                        </body>
                    </html>'; //Текст нащего сообщения можно использовать HTML теги
            $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
            $headers .= "From: Заказ с сайта <info@myshoes.space> \r\n"; //Наименование и почта отправителя
            mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
    }
?>