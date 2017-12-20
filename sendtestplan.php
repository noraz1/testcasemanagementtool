
<script>

if (confirm('Are you sure you want to submit this Test Plan to lecturer?')) {
             <?php
             // delete old data in tpl
            mysqli_query($con, "DELETE FROM tp_lecturer WHERE tpl_id=$id");
            
           // insert new data
         //  $query = " INSERT INTO tp_lecturer (tpl_id, projectid, tpl_name, tpl_introduction, tpl_test_item, tpl_features_to_be_tested, tpl_features_not_to_be_tested, tpl_approach,
          // tpl_item_passfail_criteria, tpl_testing_task, tpl_test_deliverable, tpl_environmental_need,
         //  tpl_responsibilities, tpl_schedule, tpl_risk, tpl_approval, groupclass ) 
          // VALUES ('$tp_id ','$projectid ','$tp_name','$tp_introduction','$tp_test_item','$tp_features_to_be_tested','$tp_features_not_to_be_tested', '$tp_approach','$tp_item_passfail_criteria',$tp_testing_task','$tp_test_deliverable',
          // '$tp_environmental_need', '$tp_responsibilities','$tp_schedule','$tp_risk', '$tp_approval','$groupclass') WHERE tp_id=$id";
         $query9= " INSERT INTO tp_lecturer (tpl_id, projectid, tpl_name, tpl_introduction, tpl_test_item, tpl_features_to_be_tested, tpl_features_not_to_be_tested, tpl_approach,
          tpl_item_passfail_criteria, tpl_testing_task, tpl_test_deliverable, tpl_environmental_need,
          tpl_responsibilities, tpl_schedule, tpl_risk, tpl_approval) SELECT tp_id, projectid, tp_name, tp_introduction, tp_test_item, tp_features_to_be_tested, tp_features_not_to_be_tested, tp_approach,
           tp_item_passfail_criteria, tp_testing_task, tp_test_deliverable, tp_environmental_need,
          tp_responsibilities, tp_schedule, tp_risk, tp_approval FROM testplan WHERE tp_id=$id";
            $result9= mysqli_query($con,$query9);
           mysqli_query($con, "UPDATE tp_lecturer SET classgroup='$classgroup' WHERE tpl_id=$id");
           mysqli_query($con, "UPDATE tp_lecturer SET matricnum='$matricnum' WHERE tpl_id=$id");
           mysqli_query($con, "UPDATE tp_lecturer SET projectdesc='$projectdesc' WHERE tpl_id=$id");
       //    mysqli_query($con, "INSERT INTO tp_lecturer SET projectdesc='$projectdesc' WHERE tpl_id=$id");
          
           
if($result9){
            
            ?>
           alert ('you are successfully submit this test plan to lecturer!');
            
         <?php }?>   
   
} else {
    alert ('Failed to submit this test plan to lecturer! Please try again.');
}
</script>