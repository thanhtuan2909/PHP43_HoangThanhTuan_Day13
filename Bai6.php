<?php
$error = '';
$result = '';

if (isset($_POST['sum']) || isset($_POST['sub']) || isset($_POST['mul']) || isset($_POST['div'])){
    $a = $_POST['a'];
    $b = $_POST['b'];

    if (empty($a) || empty($b)) {
        $error = 'Không được để trống số a hoặc số b';
    } elseif (!is_numeric($a) || !is_numeric($b)){
        $error = 'Chi cho phép nhập số';
    } else {
        isset($_POST['sum']) ? $result = 'a + b = ' . ($a + $b) : '';
        isset($_POST['sub']) ? $result = 'a - b = ' . ($a - $b) : '';
        isset($_POST['mul']) ? $result = 'a * b = ' . ($a * $b) : '';
        isset($_POST['div']) ? $result = 'a / b = ' . ($a / $b) : '';
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 6</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/jquery-3.4.1.min.js">
    <style type="text/css">
        .content-form {
            width: 50%;
            margin: 0 auto;
            padding-bottom: 10px;
        }

        .title {
            text-align: center;
            color: #282529;
        }

        .form-title {
            background: #feffed;
            padding: 25px 0;
            border-bottom: 1px solid #000;
        }

        .main-form {
            padding: 20px 20px;
        }

        .content-form {
            border: 1px solid #000;
        }

        #result {
            color: blue;
        }

        #error {
            color: red;
            padding-top: 20px;
        }

        a {
            margin: 10px 10px 10px 0;
        }
    </style>
</head>
<body>
<div class="container fs">
    <form action="#" method="post" class="content-form">
        <div class="form-title">
            <h3 class="title">
                Thực hành toán tử số học
            </h3>
        </div>
        <div class="main-form">
            <div class="item-input">
                <div class="form-group">
                    <label>Nhập vào số a: </label>
                    <input type="text" name="a" value="<?php echo isset($a) ? $a : ''; ?>" placeholder="" class="form-control">
                </div>
            </div>
            <div class="item-input">
                <div class="form-group">
                    <label>Nhập vào số b: </label>
                    <input type="text" name="b" value="<?php echo isset($b) ? $b : ''; ?>" placeholder="" class="form-control">
                </div>
            </div>
            <div class="submit-form">
                <input type="submit" name="sum" class="btn btn-success" value="a + b">
                <input type="submit" name="sub" class="btn btn-info" value="a - b">
                <input type="submit" name="mul" class="btn btn-danger" value="a * b">
                <input type="submit" name="div" class="btn btn-warning" value="a / b">
            </div>
            <div id="error">
                <?php echo $error; ?>
            </div>
            <div id="result">
                <?php echo $result; ?>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>