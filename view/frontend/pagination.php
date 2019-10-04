<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "blog";

    $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $limit = 3;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM post ORDER BY id ASC LIMIT $start_from, $limit";
$rs_result = mysqli_query($conn, $sql);
 
while ($row = mysqli_fetch_assoc($rs_result)) {  
?>         
	<li class="chapterList" value="<?= $row['id'] ?>" onclick="getChapter(<?= $row['id'] ?>)"> <a href="#"><?= $row['title'] ?> </a></li>
<?php  
};  

