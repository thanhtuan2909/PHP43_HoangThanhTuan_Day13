<?php
$error = '';
$result = '';

if (isset($_POST['submit'])) {
    $yourName = $_POST['yourName'];
    $yourEmail = $_POST['yourEmail'];
    $yourPhone = $_POST['yourPhone'];
    $yourWebsite = $_POST['yourWebsite'];
    $yourMessage = $_POST['yourMessage'];

    if (empty($yourName) || empty($yourEmail) || empty($yourPhone) || empty($yourWebsite) || empty($yourMessage)) {
        $error = 'Không được để trống các trường';
    } elseif (!filter_var($yourEmail, FILTER_VALIDATE_EMAIL)) {
        $error = 'Trường email phải có định dạng email';
    } elseif (!is_numeric($yourPhone)) {
        $error = 'Trường phone number chỉ cho phép nhập số';
    } elseif (!filter_var($yourWebsite, FILTER_VALIDATE_URL)) {
        $error = 'Trường website cần phải có định dạng URL';
    } else {
        $result = '<span>Send contact thành công!</span><br>';
        $result .= "Your name: $yourName<br>";
        $result .= "Your email: $yourEmail<br>";
        $result .= "Your phone number: $yourPhone<br>";
        $result .= "Your website: $yourWebsite<br>";
        $result .= "Your message: $yourMessage<br>";
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
    <title>Bài 7</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/jquery-3.4.1.min.js">
    <style type="text/css">
        form {
            width: 50%;
            margin: 0 auto;
            background: #d0d0d0;
        }

        .main-form {
            padding: 25px 25px;
        }

        .error {
            color: red;
        }

        .result {
            color: #000;
            font-weight: bold;
        }

        span {
            color: #5497c3;
            font-weight: 600;
        }

        .form-control:focus {
            box-shadow: none;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="" method="post">
        <div class="main-form">
            <div class="form-group">
                <input type="text" name="yourName" placeholder="Your name"
                       value="<?php echo isset($yourName) ? $yourName : ''; ?>" id="" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="yourEmail" placeholder="Your Email Address"
                       value="<?php echo isset($yourEmail) ? $yourEmail : ''; ?>" id=""
                       class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="yourPhone" placeholder="Your Phone Number"
                       value="<?php echo isset($yourPhone) ? $yourPhone : ''; ?>" id="" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="yourWebsite" placeholder="Your Web Site starts with http://"
                       value="<?php echo isset($yourWebsite) ? $yourWebsite : ''; ?>" id=""
                       class="form-control">
            </div>
            <div class="form-group">
                <textarea name="yourMessage" id="" placeholder="Type your Message here..." cols="30" rows="5"
                          class="form-control"><?php echo isset($yourMessage) ? $yourMessage : ''; ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="SUBMIT" name="submit" class="btn btn-danger form-control">
            </div>
            <div class="error">
                <?php echo $error; ?>
            </div>
            <div class="result">
                <?php echo $result; ?>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>