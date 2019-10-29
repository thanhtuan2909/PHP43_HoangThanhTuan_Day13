<?php
$error = '';
$result = '';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $academicLevel = $_POST['academicLevel'];
    $courses = isset($_POST['courses']) ? $_POST['courses'] : [];
    $concentrations = $_POST['concentrations'];
    $comment = $_POST['comment'];

    if (empty($email)) {
        $error = 'Username không được để trống';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Phải nhập đúng định dạng email';
    } elseif (empty($password)) {
        $error = 'Password không được để trống';
    } elseif (strlen($password) < 8) {
        $error = 'Password phải có độ dài tối thiểu 8 ký tự';
    } else {
        $result = '<span>Đăng ký thành công!</span><br>';
        $result .= '<span>Thông tin của bạn:</span><br>';
        $result .= "Email: $email<br>";
        $academicLevelText = '';
        switch ($academicLevel) {
            case 1:
                $academicLevelText = 'Freshman';
                break;
            case 2:
                $academicLevelText = 'Sophomore';
                break;
        }
        $result .= "Select Academy: $academicLevelText<br>";
        if (in_array(1, $courses)) {
            $result .= "Token: CSCI 1710<br>";
        }
        if (in_array(2, $courses)) {
            $result .= "Token: CSCI 1800<br>";
        }
        if (in_array(3, $courses)) {
            $result .= "Token: CSCI 2800<br>";
        }
        if (in_array(4, $courses)) {
            $result .= "Token: CSCI 2150<br>";
        }
        if (in_array(5, $courses)) {
            $result .= "Token: CSCI 2910<br>";
        }
        $concentrationText = '';
        switch ($concentrations) {
            case 1:
                $concentrationText = 'Computer Science (CS)';
                break;
            case 2:
                $concentrationText = 'Information Science (IS)';
                break;
            case 3:
                $concentrationText = 'Information Technology (IT)';
                break;
        }
        $result .= "Concentration: $concentrationText<br>";
        $result .= "Message: $comment";
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
    <title>Bài 3</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/jquery-3.4.1.min.js">
    <style type="text/css">
        table {
            margin: 0 auto;
            background: #cfedd7;
        }

        .fr {
            text-align: right;
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
    </style>
</head>
<body>
<div class="container">
    <form action="" method="post">
        <table cellpadding="10">
            <tr>
                <td class="fr">Enter e-mail address:</td>
                <td>
                    <input type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>" id="">
                </td>
            </tr>
            <tr>
                <td class="fr">Enter password:</td>
                <td>
                    <input type="password" name="password" id="">
                </td>
            </tr>
            <tr>
                <?php
                $selectedF = 'selected';
                $selectedS = '';
                if (isset($_POST['academicLevel'])) {
                    switch ($_POST['academicLevel']) {
                        case 1:
                            $selectedF = 'selected';
                            break;
                        case 2:
                            $selectedS = 'selected';
                            break;
                    }
                }
                ?>
                <td class="fr">Select academic level</td>
                <td>
                    <select name="academicLevel" id="">
                        <option value="1" <?php echo $selectedF ?>>Freshman</option>
                        <option value="2" <?php echo $selectedS ?>>Sophomore</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="fr">Identify courses taken:</td>
                <td>
                    <input type="checkbox" name="courses[]" <?php echo isset($_POST['courses']) ? 'checked' : ''; ?> value="1" id=""> CSCI 1710 <br>
                    <input type="checkbox" name="courses[]" <?php echo isset($_POST['courses']) ? 'checked' : ''; ?> value="2" id=""> CSCI 1800 <br>
                    <input type="checkbox" name="courses[]" <?php echo isset($_POST['courses']) ? 'checked' : ''; ?> value="3" id=""> CSCI 2800 <br>
                    <input type="checkbox" name="courses[]" <?php echo isset($_POST['courses']) ? 'checked' : ''; ?> value="4" id=""> CSCI 2150 <br>
                    <input type="checkbox" name="courses[]" <?php echo isset($_POST['courses']) ? 'checked' : ''; ?> value="5" id=""> CSCI 2910 <br>
                </td>
            </tr>
            <tr>
                <?php
                $checkedCS = 'checked';
                $checkedIS = '';
                $checkedIT = '';

                if (isset($_POST['concentrations'])) {
                    switch ($_POST['concentrations']) {
                        case 1:
                            $checkedCS = 'checked';
                            break;
                        case 2:
                            $checkedIS = 'checked';
                            break;
                        case 3:
                            $checkedIT = 'checked';
                            break;
                    }
                }
                ?>
                <td class="fr">Select concentration:</td>
                <td>
                    <input type="radio" name="concentrations" <?php echo $checkedCS; ?> value="1" id=""> Computer
                    Science (CS)<br>
                    <input type="radio" name="concentrations" <?php echo $checkedIS; ?> value="2" id=""> Information
                    Science (IS)<br>
                    <input type="radio" name="concentrations" <?php echo $checkedIT; ?> value="3" id=""> Information
                    Technology (IT)<br>
                </td>
            </tr>
            <tr
            ">
            <td colspan="2">
                <textarea name="comment" id="" cols="40"
                          rows="5"><?php echo isset($comment) ? $comment : 'Enter any comments you have here.'; ?></textarea>
            </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="submit text-center">
                        <input type="submit" name="submit" value="Submit data">
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

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
