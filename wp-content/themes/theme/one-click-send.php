<?php
    if((isset($_POST['name'])&&$_POST['name']!="")&&(isset($_POST['tel'])&&$_POST['tel']!="")){ //Проверка отправилось ли наше поля name и не пустые ли они
            $to = 'sales@myshoes.space'; //Почта получателя, через запятую можно указать сколько угодно адресов
            $subject = 'Быстрый заказ «' . $_POST['model'] . '»'; //Загаловок сообщения
            $message = '
                    <html>
                        <head>
                            <title>'.$subject.'</title>
                        </head>
                        <body>
                            <p>Имя: <b>'.$_POST['name'].'</b></p>
                            <p>Телефон: '.$_POST['tel'].'</p>
                            <p>Хочет купить <b>' . $_POST['model'] . '.</b></p>
                        </body>
                    </html>'; //Текст нащего сообщения можно использовать HTML теги
            $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
            $headers .= "From: Заказ с сайта <noreply@myshoes.space> \r\n"; //Наименование и почта отправителя
            mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
    }
?>