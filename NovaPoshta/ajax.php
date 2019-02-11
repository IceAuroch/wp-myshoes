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
        public static function getCities($val) {
            $data = new Address_getCities();
            $data->setFindByString($val);
            return Address::getCities($data);
        }
        public static function getWarehouses($val) {
            $data = new Address_getWarehouses();
            $data->setCityRef($val);
            $data->setPage(1);
            return Address::getWarehouses($data);
        }
    }

    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }

    $address =  Address_example::getCities($id);

    $citys = $address->data;

    foreach($citys as $item_city) {
        echo $item_city->DescriptionRu;
    }


    $city = $address->data[0];

    $city_data = array();

    foreach ($city as $key => $item) {
        $city_data += array($key => $item);
    }

    $warehouses = Address_example::getWarehouses($city_data["Ref"]);

    $warehouses_data = $warehouses->data;

    foreach ($warehouses_data as $item) {
        echo "<option>$item->DescriptionRu</option>";
    }