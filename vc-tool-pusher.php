<?php
include_once("config.php");

if (isset($_POST['room_id'])) {
    global $pusher;
    $data['event'] = $_POST['event'];
    $data['room_id'] =  $_POST['room_id'];
    $pusher->trigger('vc-tool', 'confetti' . $_POST['room_id'], $data);
    echo 1;
}
