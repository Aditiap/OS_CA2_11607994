<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
include_once 'db.php';

$sql="SELECT * FROM jobs";
$result = mysqli_query($conn,$sql);

echo "<table class='table table-hover table-bordered'>
<thead class='bg-primary'>
    <tr>
    <th>Company</th>
    <th>Skill</th>
    <th>Job Description</th>
    <th>Salary</th>
    </tr>
</thead>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['company'] . "</td>";
    echo "<td>" . $row['skill'] . "</td>";
    echo "<td>" . $row['job_description'] . "</td>";
    echo "<td>" . $row['salary'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>
</body>
</html>