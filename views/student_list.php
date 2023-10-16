<h2><?php echo $title ?> </h2>
<ul>
<?php foreach($studentlist as $student):?>
<?php //echo "<li > ".$student['student_id'].": ".$student['lastname']." ".
//$student['firstname'].", ".$student['email']."</li >";?>
<?php echo "<li> ".$student['student_id'].": ".$student['lastname']." ".
$student['firstname'].", ".$student['email']." - "
.anchor('internships/delete/'.$student["student_id"],'[del]');?>
</li>
<?php endforeach ?>
</ul>