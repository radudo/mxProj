<?php 

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Db Connect
$db = mysqli_connect(
    "localhost", 
    "root", 
    "root", 
    "mxTask"
) or die 
(
    "Error Establishing connection with the database !"
);

//var 
$username = "";
$email = "";
$note = "";
$errors = array();

//register  
if(isset($_POST['register'])) {
    $username = mysqli_real_escape_string( $db, $_POST['username']);
    $email = mysqli_real_escape_string( $db, $_POST['email']);
    $password = mysqli_real_escape_string( $db, $_POST['password']);
    $passwordValidation = mysqli_real_escape_string( $db, $_POST['passwordValidation']);

    // Validation errors
    if (empty($username)){
        array_push($errors,"Please insert your username");
    }
    if (empty($email)){
        array_push($errors,"Please insert your email");
    }
    if (empty($password)){
        array_push($errors,"Please insert your password");
    }
    if($password != $passwordValidation){
        array_push($errors,"The passwords are not similar");
    }
        //Duplicate Prevention 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $duplicate_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' ";
    $result = mysqli_query($db, $duplicate_query);
    $user = mysqli_fetch_assoc($result);

    if ($user){
        if($user['username'] === $username){
            array_push($errors,"Username already exists");
        }
        if($user['email'] === $email){
            array_push($errors,"Email already exists in our database and it's connected with an username");
        }
    }

    //registration validation
    if(count($errors) == 0){
        $encpass = md5($password);
        $reg_query = "INSERT INTO user( username, password, email ) VALUES ('$username', '$encpass','$email')";

        mysqli_query($db,$reg_query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header("location: index.php");
    }
}



//login
if(isset($_POST['login_btn'])){

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // error validation
    if(empty($username)){
        array_push($errors,"Username is requierd");
    }
    if(empty($password)){
        array_push($errors,"Please enter your password");
    }
    
    if(count($errors) == 0){
        $encpass = md5($password);
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$encpass' ";
        
        $results = mysqli_query($db, $query);
        $row=mysqli_fetch_assoc( $results );
        $userid=$row['id'];

        if(mysqli_num_rows($results) == 1){
            $_SESSION['username'] = $username;
            $_SESSION['user_id']= $userid;
            $_SESSION['succes'] = "Succesfully Loged in";
            header("location: index.php");
        } else{
            array_push($errors,"Incorrect username or password");
        }
    }
}

?>

