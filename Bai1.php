<?php
$error = '';
$result = '';
//Kiểm tra đã submit hay chưa
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $specificTime = $_POST['specificTime'];
    $classDetails = $_POST['classDetails'];
    $gender = $_POST['gender'];
    //pass check submit
    if (empty($name)) {
        $error = 'Name không được để trống';
    } elseif (empty($email)) {
        $error = 'Email không được để trống';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Phải có định dạng email';
    } elseif (empty($specificTime)) {
        $error = 'Specific Time không được để trống';
    } elseif (empty($classDetails)) {
        $error = 'Class Details không được để trống';
    } else {
        //pass validate form
        $result .= "Your Given details are as: <br />";
        $result .= "Name: $name<br />";
        $result .= "Email: $email<br />";
        $result .= "Spacific Time: $specificTime<br />";
        $result .= "Class Details: $classDetails<br />";
        $genderText = '';
        switch ($gender) {
            case 1:
                $genderText = 'Nữ';
                break;
            case 2:
                $genderText = 'Nam';
                break;
        }
        $result .= "Gender: $genderText";
    }
}
?>


<form action="" method="post">
    <h2>Tutorials Point Absolute classes registration</h2>
    <h3 style="color: red;">
        <?php echo $error; ?>
    </h3>
    <table>
        <tr>
            <td>Name:</td>
            <td>
                <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>" id="">
            </td>
        </tr>
        <tr>
            <td>E-mail:</td>
            <td>
                <input type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>" id="">
            </td>
        </tr>
        <tr>
            <td>Specific Time:</td>
            <td>
                <input type="text" name="specificTime" value="<?php echo isset($specificTime) ? $specificTime : ''; ?>"
                       id="">
            </td>
        </tr>
        <tr>
            <td>Class details:</td>
            <td>
                <textarea name="classDetails" id="" cols="35"
                          rows="5"><?php echo isset($classDetails) ? $classDetails : ''; ?></textarea>
            </td>
        </tr>
        <tr>
            <?php
            $checkedFemale = 'checked';
            $checkedMale = '';

            if (isset($_POST['gender'])) {
                switch ($_POST['gender']) {
                    case 1:
                        $checkedFemale = 'checked';
                        break;
                    case 2:
                        $checkedMale = 'checked';
                        break;
                }
            }
            ?>
            <td>Gender</td>
            <td>
                <input type="radio" name="gender" value="1" <?php echo $checkedFemale; ?> id=""> Female
                <input type="radio" name="gender" value="2" <?php echo $checkedMale; ?> id=""> Male
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Submit">
            </td>
        </tr>
    </table>
</form>
<h3 style="color: #000">
    <?php echo $result; ?>
</h3>
