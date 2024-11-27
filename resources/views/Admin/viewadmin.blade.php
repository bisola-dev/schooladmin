<?php
 
require_once("cann.php");

$ada=($_GET['id']);




$resultt = mysqli_query($conn, "SELECT * FROM adminlogin WHERE id = $ada");
                
      while($get_info = mysqli_fetch_assoc($resultt)){ // Start looping table row 
                                         $schname = $get_info['schname'];
                                         $admail=$get_info['admail'];
                                         $schid = $get_info['id'];
                                         $logoz=$get_info['logo'];   
                                          $schaddy=$get_info['addy'];
                                          $adminfulln=$get_info['fulln'];
                                          $fony=$get_info['fon'];
     
   //
          $adminfulln=$_SESSION['fulln'] = $adminfulln;
           $admail=$_SESSION['admail'] = $admail;
        
                                      


         
   if ($adminfulln != "" || $admail != "")header("Location:dashboardapp.php");





   //$linkq='viewadmin.php?id='.$superid.'&fulln='.$adminfulln2;



   }





   
                                        
                                    




?>