<?php
     ini_set("error_reporting", E_ALL);
  ini_set("display_errors", true);
  include_once("db.php");
  $lesson = getLesson($_GET['lesson_id']);
//   print_r($lesson);
?>

<?php
 foreach($lesson as $l)
?>
<iframe src='https://docs.google.com/viewerng/viewer?url=http://cg-dev.code-gurukul.com/project_descriptions/<?=$l->project_desc?>&embedded=true' height="100%" width="100%" frameborder='0'></iframe>

<?php

?>