<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<script>
    var pressedButtonId;
    var headers = ["<h3>Вывести таблицу с товарами</h3>",

        "<h3>Вывести № заказа, название товара </h3>",

        "<h3>Номер заказа, имя товара, цена, количество, " +
        "имя оператора который за которым числится заказ " +
        "ГДЕ количество товара >2 И id оператора 10 ИЛИ 12</h3>",

        "<h3>Имя товара, количество товара, и сумма (price) по каждому товару (сгруппировать)</h3>"];


    $(document).ready(function () {


        $("#firstTask").bind("click", function () {
            pressedButtonId = 0;
            $.ajax({
                url: "repository.php",
                type: "post",
                data: ({id: pressedButtonId}),
                dataType: "html",
                success: renderData
            });
        });


        $("#secondTask").bind("click", function () {
            pressedButtonId = 1;
            $.ajax({
                url: "repository.php",
                type: "post",
                data: ({id: pressedButtonId}),
                dataType: "html",
                success: renderData
            });
        });


        $("#thirdTask").bind("click", function () {
            pressedButtonId = 2;
            $.ajax({
                url: "repository.php",
                type: "post",
                data: ({id: pressedButtonId}),
                dataType: "html",
                success: renderData
            });
        });


        $("#FourthTask").bind("click", function () {
            pressedButtonId = 3;
            $.ajax({
                url: "repository.php",
                type: "post",
                data: ({id: pressedButtonId}),
                dataType: "html",
                success: renderData
            });
        });

    });

    function renderData(data) {
        data = JSON.parse(data);
        var table = "<table border='1'>";
        data.forEach(function (t) {
            table += "<tr>";
            t.forEach(function (t2) {
                table += "<td>" + t2 + "</td>";
            });
            table += "</tr>";
        });

        table += "</table>";
        $("#information").html(headers[pressedButtonId] + table);
    }


</script>
<body>

<button id="firstTask"> First Task</button>
<button id="secondTask"> Second Task</button>
<button id="thirdTask"> Third Task</button>
<button id="FourthTask"> Fourth Task</button>
<div id="information"></div>

</body>
</html>

