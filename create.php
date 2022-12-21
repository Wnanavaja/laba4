<?php
    if (isset($_POST['submit'])) { //возвращает tre or false
        
        $namebook = $_POST['bookName'];
        $price = $_POST['price'];
        $descr = $_POST['descr'];

        $xml = simplexml_load_file('data.xml');

        //хранится второй элемент
        $lastEl = $xml->item[($xml->count()) - 1];

        $newBook = $xml->addChild('item', ''); //добавляет пустой элемент item
        $newBook->addChild('name', $namebook);
        $newBook->addChild('price', $price);
        $newBook->addChild('descr', $descr);
        $newBook->addAttribute('id', $lastEl['id']+ 1);

        $xml->saveXML('data.xml');
        echo '<script>
        alert("Новое растение создано")
        </script>';

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">
        <input type="text" name="bookName" placeholder="Название растения">
        <br>
        <br>

        <input type="number" name="price" placeholder="Цена">
        <br>
        <br>
        <input type="text" name="descr" placeholder="Описание">
        <br>
        <br>
        <button type="submit" name='submit'>Отправить</button>
    </form>
    
    <br>
    <a href="index.php">назад</a>
</body>
</html>