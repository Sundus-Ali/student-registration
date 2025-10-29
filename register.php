<?php
include 'data.php'; 

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = strtoupper($_POST['student_id']); 
    $name = $_POST['student_name'];
    $course = $_POST['student_course'];
    
    if (!array_key_exists($id, $student_data)) {
        
        $new_student = [
            "name" => $name,
            "course" => $course
        ];
        
        $student_data[$id] = $new_student;

        //Update of data.php 
        $data_content = "<?php\n\$student_data = " . var_export($student_data, true) . ";\n?>";
        file_put_contents('data.php', $data_content);
        
        $message = "<div class='success-msg'>Success! Student $name has been registered.</div>";
        
    } else {
        $message = "<div class='error-msg'>Error! Student ID ($id) already exists.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Student Registration Form</h2>
        
        <?php echo $message; ?> 
        <form method="post" action="register.php">
            <label for="id">Student ID:</label>
            <input type="text" id="id" name="student_id" required>
            
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="student_name" required>
            
            <label for="course">Course:</label>
            <input type="text" id="course" name="student_course" required>
            
            <input type="submit" value="Register Student">
        </form>
        
        <hr>
        <p><a href="display.php">View Registered Students</a></p>
    </div>
</body>
</html>
