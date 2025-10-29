<?php
include 'data.php'; 

$count = count($student_data); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registered Students List</h2>
        
        <h3>Total Registered: <?php echo $count; ?> Students.</h3>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row_num = 1;
                foreach ($student_data as $id => $details) {
                    
                    $name = $details['name'];
                    $course = $details['course'];
                    echo "<tr>";
                    echo "<td>" . $row_num . "</td>";
                    echo "<td>" . $id . "</td>";
                    echo "<td>" . $name . "</td>";
                    echo "<td>" . $course . "</td>";
                    echo "</tr>";
                    $row_num++;
                }
                ?>
            </tbody>
        </table>

        <hr>
        <p><a href="register.php">Back to Registration</a></p>
    </div>
</body>
</html>
