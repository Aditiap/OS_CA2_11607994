<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
    $company = $_POST['company'];
    $skill = $_POST['skill'];
    $jd = $_POST['job_description'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO jobs (id, company, skill, job_description, salary)
    VALUES (NULL, '$company','$skill','$jd', '$salary')";

    if (mysqli_query($conn, $sql)) {
        echo "New job has been posted successfully !";
        echo "<a href='/post_job'>Post Another Job?</a>";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>