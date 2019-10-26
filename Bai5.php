<?php
$error = [];
$result = '';

if (isset($_POST['save'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rePassword = $_POST['rePassword'];

    if (empty($lastName)){
        $error['lastName'] = 'Please enter your lastname';
    }
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'Email isn\'t an email format';
    }
    if (empty($password) && empty($rePassword)){
        $error['password'] = 'Please provide a password';
    }
    if (!strcmp($password, $rePassword) == 0){
        $error['rePassword'] = 'The password not same';
    }
    if (!$error){
        $result = '<span class="re">Đăng ký thành công!</span><br>';
        $result .= '<span class="re">Thông tin của bạn:</span><br>';
        $result .= "Firstname: $firstName<br>";
        $result .= "Lastname: $lastName<br>";
        $result .= "Username: $userName<br>";
        $result .= "Email: $email<br>";
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
    <title>Bài 5</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/jquery-3.4.1.min.js">
    <style type="text/css">
        .form-register {
            margin: 0 auto;
        }

        form, table {
            width: 500px;
        }

        .pr {
            text-align: right;
            font-weight: bold;
        }

        .title {
            border-bottom: 1px solid #c0c0c0;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .error {
            color: red;
            font-style: italic;
            font-weight: bold;
        }

        .result {
            color: #000;
            font-weight: bold;
        }

        span {
            color: #5497c3;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-register">
        <form action="" method="post">
            <div class="form-title">
                <div class="title">
                    <h3>Register</h3>
                </div>
            </div>
            <table cellpadding="10">
                <tr>
                    <td class="pr">Firstname</td>
                    <td>
                        <input type="text" name="firstName" value="<?php echo isset($firstName) ? $firstName : 'Janobe'; ?>" class="form-control" id="">
                    </td>
                </tr>
                <tr>
                    <td class="pr">Lastname</td>
                    <td>
                        <input type="text" name="lastName" placeholder="Lastname" class="form-control" value="<?php echo isset($lastName) ? $lastName : '';?>" id="">
                        <div class="error">
                            <?php echo isset($error['lastName']) ? $error['lastName'] : ''; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="pr">Username</td>
                    <td>
                        <input type="text" name="userName" value="<?php echo isset($userName) ? $userName : 'janobe'; ?>" class="form-control" id="">
                    </td>
                </tr>
                <tr>
                    <td class="pr">Email Address</td>
                    <td>
                        <input type="text" name="email" value="<?php echo isset($email) ? $email : 'janobe@gmail.com'; ?>" class="form-control" id="">
                        <div class="error">
                            <?php echo isset($error['email']) ? $error['email'] : ''; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="pr">Password</td>
                    <td>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="">
                        <div class="error">
                            <?php echo isset($error['password']) ? $error['password'] : ''; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="pr">Confirm Password</td>
                    <td>
                        <input type="password" class="form-control" placeholder="Password" name="rePassword" id="">
                        <div class="error">
                            <?php echo isset($error['password']) ? $error['password'] : ''; ?>
                            <?php echo isset($error['rePassword']) ? $error['rePassword'] : ''; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <input type="submit" name="save" value="Save" class="btn btn-primary">
                    </td>
                </tr>
            </table>
            <div class="result">
                <?php echo $result; ?>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>