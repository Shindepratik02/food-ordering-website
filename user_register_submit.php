


<?php
function redirect($link){
	?>
	<script>
	window.location.href='<?php echo $link?>';
	</script>
	<?php
	die();
}

    $db_hostname='127.0.0.1';
    $db_username='root';
    $db_password='';
    $db_name='food-order';

    $conn = mysqli_connect ($db_hostname,$db_username,$db_password,$db_name);

    if(!$conn){
        echo "connection error".mysqli_connect_error();
        exit;
    }

    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql= "INSERT INTO USERS (full_name,email,password) VALUES ('$name','$email','$password')";
    

    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo 'error'.mysqli_error($conn);
        exit;
    }
    
    redirect('login.php');
    
    mysqli_close($conn);

?>
