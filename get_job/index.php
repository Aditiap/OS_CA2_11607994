<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Jobs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
    <script>
    function showJob(str) {
        if (str == "") {
            document.getElementById("job_table").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("job_table").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","get.php?query="+str,true);
            xmlhttp.send();
        }
    }

    function showAllJobs() {
        if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
        } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("job_table").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","get_all.php",true);
        xmlhttp.send();
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header text-center">
                        <h2>Search Jobs</h2>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="email-input" class=" form-control-label"> Skills</label>
                        </div>
                        <div class="col-md-6">
                            <form>
                                <select name="skills" onchange="showJob(this.value)" class="form-control-label" >
                                <option value="">Select</option>
                                <?php
                                include_once 'db.php';
                                $list = mysqli_query($conn,"SELECT DISTINCT skill FROM jobs");
                                while ($row_ah = mysqli_fetch_array($list)) {
                                ?>
                                <option value=<?php echo $row_ah['skill']; ?>><?php echo $row_ah['skill']; ?></option>
                                <?php } ?>
                                </select>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <button style="background-color: #002bff; color: white;" class="btn btn-sm" onclick="showAllJobs()">Show all jobs</button>
                        </div>
                        <div id="job_table" style="padding-top: 50px;"></div>
                    </div>
                    
                </div>
            </div>        
        </div>
    </div>
</body>
</html>