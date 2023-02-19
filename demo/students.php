<?php 
include 'database.php';

$conn = OpenCon();




// while($row=mysqli_fetch_array($result))
// {
//          echo $row['first_name'].' '.$row['last_name'].'<br/>';
//  }


function get_students($conn){
    $readStudentsTable = "SELECT * FROM students";

    
    // echo "returning students information \n\n\n";
    $result=  mysqli_query($conn, $readStudentsTable);
    while($row= mysqli_fetch_array($result)){
        printf("\n \n %s  %s %s %s",$row["studentID"], $row["student_name"],$row["student_number"], $row["student_age"]);

    };
    
    
}

function get_student($ID, $conn){
    //printf( "line 22 inside get_student %s", $ID);
    $readSqlTable = "SELECT * FROM students WHERE studentID = '$ID'";
    $result=  mysqli_query($conn, $readSqlTable);
    $row = mysqli_fetch_array($result);
  
    printf("\n \n   %s  %s  %s  %s",$row["studentID"], $row["student_name"],$row["student_number"], $row["student_age"]);

}


function insert_student($conn, $ID, $student_name, $student_age, $student_number){
    
    $sql = "INSERT INTO students (studentID, student_name, student_number, student_age) VALUES ('$ID', '$student_name', '$student_age', '$student_number')";

    
    if(mysqli_query($conn, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'GET') {
        if(isset($_GET["ID"])){
        //printf("This is the DI line 51 %s", htmlspecialchars($_GET["ID"]));
            get_student(htmlspecialchars($_GET["ID"]),$conn);
        }else{
            get_students($conn);
        }

      //  echo "THIS IS A GET REQUEST";
    }
    if ($method == 'POST') {
       // echo "THIS IS A POST REQUEST";
       

        $data = json_decode(file_get_contents("php://input"));
        $ID = $data->ID;
        $student_name = $data->student_name;
        $student_age = $data->student_age;
        $student_number = $data->student_number;


        insert_student($conn, $ID, $student_name, $student_age, $student_number);
    }
    if ($method == 'PUT') {
        echo "THIS IS A PUT REQUEST";
    }
    if ($method == 'DELETE') {
        echo "THIS IS A DELETE REQUEST";
    }
   



//echo "connected successfully \n";


?>