<?php function printErrorArray($errors) {
        if (!empty($errors)) {
            echo '<div class="container">';
            echo '<div class="alert alert-danger" role="alert">';
            echo '<ul>';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            echo '<span aria-hidden="true">&times;</span>';
            echo '</button>';
            foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '</ul>';
            echo '</div>';
            echo '</div>';
        }
    }
    //function to print success massage
    function printSuccessMessage($message) {
        echo '<div class="container">';
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
        echo '<strong>Success!</strong> ' . $message;
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '</div>';
    }
    //to check if id is found in database..if is found retrieve this row
    // parameters (tableName,id)...select one
    function checkID($tableName,$id){
        global $conn;
        $query="select * from $tableName where id=$id";
        $runQuery=mysqli_query($conn,$query);
        if(mysqli_num_rows($runQuery)==1){
            return mysqli_fetch_assoc($runQuery);
        }
        return false;
    }
    //to select all data from table
    function selectAll($tableName){
        global $conn;
        $query="select *from $tableName ";
        $runQuery=mysqli_query($conn,$query);
        if(mysqli_num_rows($runQuery)>0){
            return mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
        }
        return false;
    }
    //to make validation on the string
    //return array of errors in the string..if it found error in the string
    //return string if it correct
   function validateString($str,$title='value'){
    $errors=[];
    $str=htmlspecialchars(trim($str));
    if(empty($str)){
        $errors[]="the $title must be not empty.";
    }
    if(is_numeric($str)){
        $errors[]="the $title must be string.";
    }
    if(!empty($errors))
    return $errors;
    return $str;
   }
   //to make validation at email if is true return email else return false
   function validateEmail($email) {
    // Remove leading and trailing whitespaces
    $email = htmlspecialchars(trim($email));
    // Check if the email is a valid format using a regular expression
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email;
    } else {
        return false;
    }
}
function validLength($str,$min,$max=255){
    if(strlen($str)>=$min&&strlen($str)<=$max)return true;
    return false;
}
//to check number of page  in pagination 
function validPage($page,$numberPage){
    if($page<1||$page>$numberPage){
        header("location:index.php?page=1");
    }
}

?>