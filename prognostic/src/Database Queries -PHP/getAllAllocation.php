<?php  
 //fetch.php  
 session_start();
 include_once 'connect/dbh.inc.php'; // connect to database  

      $output = [];  
      $query = "select a.Id, a.personId personId ,p.Name personName , a.projectId projectId, pr.Name projectName,a.Percentage,a.StartDate,a.EndDate from allocation a join person p on a.personId = p.Id join project pr on pr.Id= a.ProjectId ";  
      $result = mysqli_query($connect, $query);
      //check if there are rows  
      if ($result->num_rows > 0) {
                //push all the rows in array
                while($row = mysqli_fetch_array($result))  
                {  
                    array_push($output, array(
                   'Id' => $row['Id'],
                   'personId' => $row['personId'],
                   'personName' => $row['personName'],
                   'projectId' => $row['projectId'],
                   'projectName' => $row['projectName'],
                   'Percentage' => $row['Percentage'],
                   'StartDate' => $row['StartDate'],
                   'EndDate' => $row['EndDate'] ));
                  
                }  
                // set the array into json form
                echo json_encode($output);  
              }
              else{
                echo "0 results";
              }
             
        
 
 ?>
