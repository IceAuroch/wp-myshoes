<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <form action="#" method="post">
            <input type="text" id="city_input">
            <select id="city_list"></select>
            <select id="street"></select>
        </form>
        <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
        <script>
            $("#city_input").keyup(function() {
                var city_input_value = $( "#city_input").val();

                $.post('city.php',{city_key: city_input_value}, function(data){
                    $('#city_list').html(data);
                });
            });
            
            $("#city_list").on('change', function(){
                var city_list = $(this).val();

                $.post('ajax.php',{id: city_list}, function(data){
                    $('#street').html(data);
                    //console.log(data);
                });
            })
        </script>
    </body>
</html>