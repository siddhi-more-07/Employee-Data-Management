<?php
    include("connection.php");
?>

<?php
if(isset($_POST["search"]))
{
    $search_element = $_POST["search_emp"];
    $query = "SELECT * FROM form WHERE emp_id='$search_element' ";

    $query_execute = mysqli_query($conn, $query);

    if ($query_execute) 
    {
        $result = mysqli_fetch_assoc($query_execute);
        if ($result !== null) 
        {
            $name = $result['emp_name'];
            //echo $name;
        } 
        else 
        {
            echo "No matching record found";
        }
    } 
    else 
    {
    echo "Query execution failed: " . mysqli_error($conn); 
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>
            Simple Software in PHP
        </title>
    </head>
<body>
    <form action="#" method="POST">

    <div class="form">

        <h1>Employee Data Entry Automation Software</h1>

        <input type="text" name="search_emp" class="textfield" placeholder="Search ID" />
        
        <input type="text" name="emp_name" class="textfield" placeholder="Employee Name" value="<?php if(isset($_POST["search"])){echo $name;}?>" />

        <select name="gender" class="gender">
            <option value="not selected">Select gender</option>
            <option value="Male" 
            <?php
            if($result['emp_gender'] == 'Male')
            {
            echo "selected";
            }
            ?>
            >Male</option>
            
            <option value="Female"
            <?php
            if($result['emp_gender'] == 'Female')
            {
                echo "selected";
            }
            ?>
            >Female</option>
            <option value="other"
            <?php
            if($result['emp_gender'] == 'other')
            {
                echo "selected";
            }
            ?>
            >other</option>
        </select>

        <input type="text" name="email" class="textfield" placeholder="Email Address" value="<?php if(isset($_POST["search"])){ echo $result['emp_email']; } ?>" />

        <select name="department" class="department">
            <option value="not selected">Select department</option>
            <option value="Computer"
            <?php
            if($result['emp_dept'] == 'Computer')
            {
                echo "selected";
            }
            ?>
            >Computer Science</option>
            <option value="IT"
            <?php
            if($result['emp_dept'] == 'IT')
            {
                echo "selected";
            }
            ?>
            >Information Technology</option>
            <option value="E&TC"
            <?php
            if($result['emp_dept'] == 'E&TC')
            {
                echo "selected";
            }
            ?>
            > E & TC</option>
            <option value="Civil"
            <?php
            if($result['emp_dept'] == 'Civil')
            {
                echo "selected";
            }
            ?>
            >Civil</option>
            <option value="mechanical"
            <?php
            if($result['emp_dept'] == 'mechanical')
            {
                echo "selected";
            }
            ?>
            >Mechanical</option>
            <option value="automation"
            <?php
            if($result['emp_dept'] == 'Automation')
            {
                echo "selected";
            }
            ?>
            >Automation</option>
            <option value="robotics"
            <?php
            if($result['emp_dept'] == 'robotics')
            {
                echo "selected";
            }
            ?>
            >Robotics</option>
            <option value="AI"
            <?php
            if($result['emp_dept'] == 'AI')
            {
                echo "selected";
            }
            ?>
            >Artificial Intelligence</option>
            <option value="ML"
            <?php
            if($result['emp_dept'] == 'ML')
            {
                echo "selected";
            }
            ?>
            >Machine Learning</option>
        </select>

        <textarea name="address" cols="30" rows="6" class="textarea" placeholder="Address"> <?php if(isset($_POST["search"])){ echo $result['emp_address']; } ?>
        </textarea>

        <input type="submit" value="Search" class="btn" name="search" />

        <input type="submit" value="Save" class="btn" name="save" />

        <input type="submit" value="Modify" class="btn" name="modify" />

        <input type="submit" value="Delete" class="btn" name="delete" onclick="return confirm_delete()" />

        <input type="reset" value="Clear" class="btn" name="clear" />

    </div>

    </form>
</body>
</html>

<script>
    function confirm_delete()
    {
        return confirm("wann delete record?");
    }
</script>

<?php
if(isset($_POST["save"]))
{
    $name       = $_POST["emp_name"];
    $gender     = $_POST["gender"];
    $email      = $_POST["email"];
    $department = $_POST["department"];
    $address    = $_POST["address"];

    $query = "INSERT INTO form (emp_name, emp_gender, emp_email, emp_dept, emp_address) VALUES ('$name', '$gender', '$email', '$department', '$address')";
    $query_execute = mysqli_query($conn, $query);

    if($query_execute)
    {
        echo "<script> alert('Saved successfully!'); </script>";
    }
    else
    {
        echo "<script> alert('Insertion Failed!'); </script>";
    }
}
?>


<?php
if(isset($_POST["delete"]))
{
    $id=$_POST['search_emp'];
    
    $query = "DELETE FROM form WHERE emp_id='$id' ";
    $query_execute = mysqli_query($conn, $query);

    if($query_execute)
    {
        echo "<script> alert('Record Deleted successfully!'); </script>";
    }
    else
    {
        echo "<script> alert('Failed!'); </script>";
    }
}
?>

<?php
if(isset($_POST["modify"]))
{
    $id         = $_POST["search_emp"];
    $name       = $_POST["emp_name"];
    $gender     = $_POST["gender"];
    $email      = $_POST["email"];
    $department = $_POST["department"];
    $address    = $_POST["address"];

    $query = "UPDATE form SET emp_name = '$name', emp_gender = '$gender', emp_email = '$email', emp_dept = '$department', emp_address = '$address' WHERE emp_id = '$id' ";
    $query_execute = mysqli_query($conn, $query);

    if($query_execute)
    {
        echo "<script> alert('Record updated!'); </script>";
    }
    else
    {
        echo "<script> alert('updated failed!'); </script>";
    }

}
?>

