<?php
    use NovaPoshta\Config;

    use NovaPoshta\ApiModels\Address;
    use NovaPoshta\MethodParameters\Address_getStreet;
    use NovaPoshta\MethodParameters\Address_getWarehouses;
    use NovaPoshta\MethodParameters\Address_getCities;
    use NovaPoshta\MethodParameters\Address_getAreas;

    require_once ('bootstrap.php');

    Config::setApiKey('71d04c1ea85b327aa12e89fd90917135');
    Config::setFormat(Config::FORMAT_JSON);
    Config::setLanguage(Config::LANGUAGE_RU);


    class Address_example {
        public static function getCities() {
            $data = new Address_getCities();
            return Address::getCities($data);
        }
    }

    $all_city_obj =  Address_example::getCities();

    $all_city = $all_city_obj->data;

    if(isset($_POST['city_key'])){
        $city_key = $_POST['city_key'];
    }

    foreach($all_city as $city) {
        $pos = strripos($city->DescriptionRu, $city_key);

        if ($pos === false) {
            //echo "К сожалению не найдено";
        } else {
            echo "<option>$city->DescriptionRu</option>";
        }
    }