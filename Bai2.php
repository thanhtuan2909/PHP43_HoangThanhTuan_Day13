<?php
$error = '';
$result = '';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    $displayName = $_POST['displayName'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $agree = isset($_POST['agree']) ? $_POST['agree'] : [];

    if (empty($username)) {
        $error = 'Username không được để trống';
    } elseif (empty($password)) {
        $error = 'Password không được để trống';
    } elseif ($userType == 0) {
        $error = 'User Type không được để trống';
    }
    elseif (empty($displayName)) {
        $error = 'Display Name không được để trống';
    } elseif (empty($address)) {
        $error = 'Address không được để trống';
    } elseif (empty($email)) {
        $error = 'Email không được để trống';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Trường email phải có định dạng email';
    } elseif (empty($gender)) {
        $error = 'Gender không được để trống';
    } elseif (empty($agree)) {
        $error = 'Chưa xác nhận các điều khoản';
    } elseif (strlen($displayName) > 24) {
        $error = 'Trường display name không được vượt quá 24 ký tự';
    } else {
        $result = "Username: $username<br>";
        $result .= "Password: $password<br>";
        $userTypeText = '';
        switch ($userType) {
            case 1:
                $userTypeText = 'Diamond';
                break;
            case 2:
                $userTypeText = 'Platinum';
                break;
            case 3:
                $userTypeText = 'Gold';
                break;
            case 4:
                $userTypeText = 'Sliver';
                break;
        }
        $result .= "User Type: $userTypeText<br>";
        $result .= "Display Name: $displayName<br>";
        $result .= "Address: $address<br>";
        $result .= "Email: $email<br>";
        $genderText = '';
        switch ($gender) {
            case 1:
                $genderText = 'Male';
                break;
            case 2:
                $genderText = 'Female';
                break;
        }
        $result .= "Gender: $genderText<br>";
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
    <title>Bài 2</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style type="text/css">
        body {
            background: #686868;
        }
        .fright {
            text-align: right;
        }

        form {
            color: #ffffff;
            font-size: 18px;
        }

        table {
            background: #acd6ee;
            margin: 0 auto;
        }

        th {
            text-align: center;
            font-size: 20px;
        }

        .bg-hf {
            background: #8ab0e0;
        }

        .error {
            color: red;
        }

        .result {
            color: #000;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="" method="post">
        <table border="2" style="border-color: #ffffff;" cellspacing="0" cellpadding="10">
            <tr class="bg-hf">
                <th colspan="2">Registration Form</th>
            </tr>
            <tr>
                <td class="fright">Username</td>
                <td>
                    <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>" id="">
                </td>
            </tr>
            <tr>
                <td class="fright">Password</td>
                <td>
                    <input type="password" name="password" id="">
                </td>
            </tr>
            <tr>
                <td class="fright">User Type</td>
                <td>
                    <select name="userType" id="">
                        <option value="0">---Selected---</option>
                        <option value="1">Diamond</option>
                        <option value="2">Platinum</option>
                        <option value="3">Gold</option>
                        <option value="4">Sliver</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="fright">Display Name</td>
                <td>
                    <input type="text" name="displayName" value="<?php echo isset($displayName) ? $displayName : ''; ?>"
                           id="">
                </td>
            </tr>
            <tr>
                <td class="fright">Address</td>
                <td>
                    <textarea name="address" id="" cols="30"
                              rows="5"><?php echo isset($address) ? $address : ''; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="fright">Email</td>
                <td>
                    <input type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>" id="">
                </td>
            </tr>
            <tr>
                <?php
                $checkedMale = 'checked';
                $checkedFemale = '';
                if (isset($_POST['gender'])) {
                    switch ($_POST['gender']) {
                        case 1:
                            $checkedMale = 'checked';
                            break;
                        case 2:
                            $checkedFemale = 'checked';
                            break;
                    }
                }
                ?>
                <td class="fright">Gender</td>
                <td>
                    <input type="radio" value="1" name="gender" <?php echo $checkedMale; ?> id=""> Male
                    <input type="radio" value="2" name="gender" <?php echo $checkedFemale; ?> id=""> Female
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="checkbox" name="agree[]" value="1" id=""> I accept Terms and Conditions
                </td>
            </tr>
            <tr class="bg-hf">
                <td colspan="2">
                    <div class="text-center">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                    <div class="error">
                        <?php echo $error; ?>
                    </div>
                    <div class="result">
                        <?php echo $result; ?>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>