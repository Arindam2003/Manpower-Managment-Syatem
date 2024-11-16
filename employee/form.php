<?php
include("connection.php");
?>
<?php
if (isset($_POST['search'])) {
    $search = $_POST['search_id'];

    $query = "SELECT * from form where ID = '$search' ";

    $data = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($data);

    // $name = $result['emp_name'];
    // echo $name;


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManPower Managment System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="center">
        <form action="#" method="POST">
            <h1>ManPower Managment System</h1>
            <div class="form">
                <input type="text" class="textfield" placeholder="Search ID" name="search_id" value="<?php if (isset($_POST['search'])) {
                                                                                                            echo $result['ID'];
                                                                                                        } ?>">
                <input type="text" class="textfield" placeholder="Employee Name" name="name" value="<?php if (isset($_POST['search'])) {
                                                                                                        echo $result['emp_name'];
                                                                                                    } ?>">
                <select class="textfield" name="gender">
                    <option value="Not Selected">Select Gender</option>
                    <option value="Male"
                        <?php
                        if ($result['emp_gender'] == 'Male') {
                            echo "selected";
                        }
                        ?>>Male</option>
                    <option value="Female"
                        <?php
                        if ($result['emp_gender'] == 'Female') {
                            echo "selected";
                        }
                        ?>>Female</option>
                    <option value="Other"
                        <?php
                        if ($result['emp_gender'] == 'Other') {
                            echo "selected";
                        }
                        ?>>Others</option>
                </select>
                <input type="email" name="email" class="textfield" id="" placeholder="Email Adress" value="<?php if (isset($_POST['search'])) {
                                                                                                                echo $result['emp_email'];
                                                                                                            } ?>">
                <select class="textfield" name="department">

                    <option value="Not Selected">Select Department</option>

                    <option value="IT"
                        <?php
                        if ($result['emp_department'] == 'IT') {
                            echo "selected";
                        }
                        ?>>IT</option>

                    <option value="Accounts"
                        <?php
                        if ($result['emp_department'] == 'IT') {
                            echo "selected";
                        }
                        ?>>Accounts</option>

                    <option value="Sales"
                        <?php
                        if ($result['emp_department'] == 'Sales') {
                            echo "selected";
                        }
                        ?>>Sales</option>

                    <option value="HR"
                        <?php
                        if ($result['emp_department'] == 'HR') {
                            echo "selected";
                        }
                        ?>>HR</option>

                    <option value="Business Development"
                        <?php
                        if ($result['emp_department'] == 'Business Development') {
                            echo "selected";
                        }
                        ?>>Business Development</option>

                    <option value="Markting"
                        <?php
                        if ($result['emp_department'] == 'Markting') {
                            echo "selected";
                        }
                        ?>>Markting</option>

                </select>
                <textarea placeholder="Address" name="address"><?php if (isset($_POST['search'])) {
                                                                    echo $result['emp_feedback'];
                                                                } ?></textarea>

                <input type="submit" value="Search" name="search" class="btn" style="background-color:grey">
                <input type="submit" value="Save" name="save" class="btn" style="background-color:green">
                <input type="submit" value="Modified" name="modified" class="btn" style="background-color:orange">
                <input type="submit" value="Delete" name="delete" class="btn" style="background-color:red" onclick="return checkdelete()">
                <input type="reset" value="Clear" name="clear " class="btn" style="background-color:blue">
            </div>
        </form>
    </div>
</body>

</html>


<script>
    function checkdelete()
    {
        return confirm('Are You Sure to Delete This Record?');
    }
</script>



<?php
if (isset($_POST['save'])) {
    $name    = $_POST['name'];
    $gender  = $_POST['gender'];
    $email   = $_POST['email'];
    $department  = $_POST['department'];
    $address   = $_POST['address'];

    $query = "INSERT INTO form (emp_name,emp_gender,emp_email,emp_department,emp_feedback) VALUES ('$name','$gender','$email','$department','$address')";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script> alert('Data Saved Into DataBase') </script>";
    } else {
        echo "<script> alert('Failed to Insert Data') </script>";
    }
}
?>




<?php
if (isset($_POST['delete'])) {
    $id = $_POST['search_id'];
    
    $query ="DELETE FROM form WHERE ID = '$id' ";

    $data =mysqli_query($conn, $query);
    if($data)
    {
        echo "<script> alert('Record Deleted') </script>";
    }
    else{
        echo "<script> alert('Record Not Deleted') </script>";
    }
}
?>


<?php
if (isset($_POST['modified'])) {
    $id          = $_POST['search_id'];
    $name        = $_POST['name'];
    $gender      = $_POST['gender'];
    $email       = $_POST['email'];
    $department  = $_POST['department'];
    $address     = $_POST['address'];

    $query = "UPDATE form SET emp_name ='$name',emp_gender='$gender',emp_email= '$email',emp_department='$department',emp_feedback='$address' WHERE ID = '$id' ";

    $data = mysqli_query($conn, $query);

    if ($data) 
    {
        echo "<script> alert('Record Modified') </script>";
    } else 
    {
        echo "<script> alert('Failed to Modified') </script>";
    }
}
?>