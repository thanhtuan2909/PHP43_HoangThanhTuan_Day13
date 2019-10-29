<?php
$error = '';
$result = '';

if (isset($_POST['save'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];

    if (empty($fname)) {
        $error = 'Firstname không được để trống';
    } elseif (empty($lname)) {
        $error = 'Lastname không được để trống';
    } else {
        $result = '<span class="re">Đăng ký thành công!</span><br>';
        $result .= '<span class="re">Thông tin của bạn:</span><br>';
        $result .= "Firstname: $fname<br>";
        $result .= "Lastname: $lname<br>";
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
        $stateText = '';
        switch ($state) {
            case 1:
                $stateText = 'Johor';
                break;
            case 2:
                $stateText = 'Las Vegas';
                break;
            case 3:
                $stateText = 'New York';
                break;
            case 4:
                $stateText = 'New Mexico';
                break;
            case 5:
                $stateText = 'Toronto';
                break;
        }
        $result .= "State: $stateText";
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
    <title>Bài 4</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/jquery-3.4.1.min.js">
    <style type="text/css">
        .btn-primary {
            background: #4590e1;
        }

        .main-form {
            border: 1px solid #c0c0c0;
            padding: 9px;
        }

        .form-title {
            border: 1px solid #c0c0c0;
            border-bottom: none;
            background: #00000017;
        }

        .form-title div {
            padding: 20px;
            color: #4590e1;
            font-weight: bold;
            font-size: 25px;
        }

        .title {
            border: 1px solid #c0c0c0;
            border-bottom: none;
            background: #00000017;
        }

        .title div {
            padding: 20px;
            color: #4590e1;
            font-weight: bold;
            font-size: 25px;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .main-list {
            border: 1px solid #c0c0c0;
            padding: 5px;
        }

        .main-pad {
            padding: 5px;
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
    <div class="row">
        <div class="col-md-9 col-12">
            <form action="" method="post">
                <div class="form-title">
                    <div>
                        Registration FORM
                    </div>
                </div>
                <div class="main-form">
                    <div class="form-group">
                        Firstname <input type="text" name="fname" value="<?php echo isset($fname) ? $fname : ''; ?>"
                                         id="" class="form-control">
                    </div>
                    <div class="form-group">
                        Lastname <input type="text" name="lname" value="<?php echo isset($lname) ? $lname : ''; ?>"
                                        id="" class="form-control">
                    </div>
                    <div class="form-group">
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
                        Gender
                        <input type="radio" name="gender" value="1" <?php echo $checkedMale ?> id=""> Male
                        <input type="radio" name="gender" value="2" <?php echo $checkedFemale ?> id=""> Female
                    </div>
                    <div class="form-group">
                        <?php
                        $selected1 = 'selected';
                        $selected2 = '';
                        $selected3 = '';
                        $selected4 = '';
                        $selected5 = '';

                        if (isset($_POST['state'])) {
                            switch ($_POST['state']) {
                                case 1:
                                    $selected1 = 'selected';
                                    break;
                                case 2:
                                    $selected2 = 'selected';
                                    break;
                                case 3:
                                    $selected3 = 'selected';
                                    break;
                                case 4:
                                    $selected4 = 'selected';
                                    break;
                                case 5:
                                    $selected5 = 'selected';
                                    break;
                            }
                        }
                        ?>
                        State
                        <select name="state" class="form-control" id="">
                            <option value="1" <?php echo $selected1; ?>>Johor</option>
                            <option value="2" <?php echo $selected2; ?>>Las Vegas</option>
                            <option value="3" <?php echo $selected3; ?>>New York</option>
                            <option value="4" <?php echo $selected4; ?>>New Mexico</option>
                            <option value="5" <?php echo $selected5; ?>>Toronto</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="save" value="Save Record" class="btn btn-success">
                        <input type="reset" value="Reset" class="btn btn-secondary">
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
        <div class="col-md-3 col-12">
            <div class="content-right">
                <div class="title">
                    <div>
                        Exercise List
                    </div>
                </div>
                <div class="main-list">
                    <div class="main-pad"><a href="#" class="btn btn-primary form-control">Home Directory</a></div>
                    <div class="main-pad"><a href="#" class="btn btn-primary form-control">FORM</a></div>
                    <div class="main-pad"><a href="#" class="btn btn-primary form-control">operator</a></div>
                    <div class="main-pad"><a href="#" class="btn btn-primary form-control">array</a></div>
                    <div class="main-pad"><a href="#" class="btn btn-primary form-control">if - else</a></div>
                    <div class="main-pad"><a href="#" class="btn btn-primary form-control">Repetition</a></div>
                    <div class="main-pad"><a href="#" class="btn btn-primary form-control">String</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
