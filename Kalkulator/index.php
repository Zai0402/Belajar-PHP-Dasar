<?php
$result = "";
if (isset($_POST["submit"])){
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];

// ngecek apakah number
    if(is_numeric($num1) && is_numeric($num2)){
        switch($operator){
            case "add":
                $result = $num1 + $num2;
                break;
            case "subtract":
                $result = $num1 - $num2;
                break;    
            case "multiply":
                $result = $num1 * $num2;
                break;    
            case "divide":
                $num2 != 0 ? $result = $num1 / $num2 : $result = "harus angka";
                break;    
        }
    }
    else{
        $result = "bukan number";
    }

}



?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Kalkulator</title>
</head>
<body>
    <div class="calculator-container">
        <h1>Kalkulator sederhana</h1>
        <form class="form-container" method="post" action="index.php">
            <input type="text" name="num1" id="num1" value="<?= isset($_POST["num1"]) ? $_POST["num1"] : '' ?>">
            <input type="text" name="num2" id="num2" value="<?= isset($_POST["num2"]) ? $_POST["num2"] : '' ?>">
            <select name="operator" class="operator">
                <option value="add" <?= (isset($_POST["operator"]) && $_POST["operator"] == "add") ? "selected" : "" ?>>Tambah</option>
                <option value="subtract" <?= (isset($_POST["operator"]) && $_POST["operator"] == "subtract") ? "selected" : "" ?>>Kurang</option>
                <option value="multiply" <?= (isset($_POST["operator"]) && $_POST["operator"] == "multiply") ? "selected" : "" ?>>Kali</option>
                <option  value="divide" <?= (isset($_POST["operator"]) && $_POST["operator"] == "divide") ? "selected" : "" ?>>Bagi</option>
            </select>
        <button type="submit" name="submit" class="button-calc">Hitung</button>
        </form>
        <div class="result">Result : <?php echo $result ?></div>
    </div>
</body>
</html>