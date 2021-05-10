<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
date_default_timezone_set('Asia/Kolkata');
$disabledButton = "";


$file_path = getenv("CONTENT_PATH");


// $dbCon = new PDO(
//     'mysql:host=localhost;dbname=cg_2a_beta;charset=utf8mb4',
//     'root',
//     'kdyUDK63782^',
//     array(
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//         PDO::ATTR_PERSISTENT => false
//     )
// );



function teacher_avalibity_data($teacher_id, $time)
{
    global $dbCon;
    $handle = $dbCon->prepare("SELECT * FROM `teacher_availability` WHERE teacher_id='$teacher_id' and date='$time'");
    $handle->execute();
    $getTeacherAvailabilitySlot = array();
    if ($handle->rowCount() > 0) {
        $result = $handle->fetchAll(\PDO::FETCH_OBJ);
        foreach ($result as $data) {
            array_push($getTeacherAvailabilitySlot, $data->slot_1, $data->slot_2, $data->slot_3, $data->slot_4, $data->slot_5, $data->slot_6, $data->slot_7, $data->slot_8);
        }
    } else {
        array_push($getTeacherAvailabilitySlot, "", "", "", "", "", "", "", "");
    }
    /*
    echo '<form method="POST" class="Slot">';
    echo '<input type="date" class="form-control d-none" name="date" value=' . $time . ' >';
    for ($i = 0; $i < 6; $i++) {
        $temp_slot_book = 0;
        if (strlen($getTeacherAvailabilitySlot[$i])) {
            $slot =  date("H", strtotime($getTeacherAvailabilitySlot[$i]));
            $available_slot_time = $getTeacherAvailabilitySlot[$i];
        } else {
            $slot = -1;
            $available_slot_time = $getTeacherAvailabilitySlot[$i];
        }
        $count = $i + 1;
        // echo "<div class='p-1'></div>";
        echo '<small ><b>Slot ' . $count . '</b></small>';
        if (strtotime(date('Y-m-d', time())) > strtotime(date('Y-m-d', strtotime($time)))) {
            $disabledDay = "disabled";
        } else {
            $disabledDay = "";
        }

        if ($disabledDay == "disabled") {
            echo '<select name="slot_' . $i . '" select class="form-control"' . $disabledDay . '>
                <option selected value="" >Expire</option>
                ';
        } else {
            for ($x = 0; $x <= 24; $x++) {
                $create = date_create($time);
                date_time_set($create, $x, 00);
                $tempDate =  date_format($create, "Y-m-d H:i:s");

                $slot_book = slot_booking($teacher_id, date('Y-m-d H:i:s', strtotime($available_slot_time)));
                // console_log($available_slot_time);


                if ($slot_book == 1) {
                    // if (strtotime(date('Y-m-d H:i:s', time())) >= strtotime($tempDate)) {

                    $temp_slot_book = 1;
                    // console_log("brake");
                    break;
                }
            }

            if ($temp_slot_book == 1) {
                echo '<select name="slot_' . $i . '" select class="form-control text-white bg-danger disabled" disabled>
                <option selected value="" >Booked</option>
                ';
                $temp_slot_book = 0;
            } else {
                if ($available_slot_time == "") {
                    echo '<select name="slot_' . $i . '" select class="form-control bg-secondary text-white " >
                <option selected value="" >Empty</option>
                ';
                } else {
                    if (strtotime(date('Y-m-d H:i:s', time())) <= strtotime($available_slot_time)) {
                        echo '<select name="slot_' . $i . '" select class="form-control  bg-warning">
                <option selected value="" >Empty</option>
                ';
                    } else {
                        echo '<select name="slot_' . $i . '" select class="form-control  disabled" disabled>
                <option selected value="' . date('H', strtotime($available_slot_time)) . '" >Expire</option>
                ';
                    }
                }
            }
        }


        // echo strtotime(date('Y-m-d', time()));

        for ($x = 0; $x < 24; $x++) {

            if ($disabledDay == "disabled") {
                break;
            }
            $create = date_create($time);

            date_time_set($create, $x, 00);
            $tempDate =  date_format($create, "Y-m-d H:i:s");
            // echo $tempDate;
            if (strtotime(date('Y-m-d H:i:s', time())) <= strtotime($tempDate)) {
                if ($slot == $x) {
                    if ($x <= 9) {
                        echo ' <option  value=' . "$x" . ' selected >0' . $x  . '.00  </option>';
                    } else {
                        echo ' <option value=' . "$x" . ' selected >' . $x . '.00</option>';
                    }
                } else {
                    if ($x <= 9) {
                        echo ' <option value=' . "$x" . '>0' . $x . '.00</option>';
                    } else {
                        echo ' <option value=' . "$x" . '>' . $x . '.00</option>';
                    }
                }
            }
        }
        echo '<select>';
    }
    echo '<div class="mt-2 text-center"><button type="submit" class="btn btn-success"' . $disabledDay . '>
  Confirm Availability</button></div>';
    echo '</form>';

    */
}


?>

<!-- hiiiiii -->


<?php

for ($i = 0; $i < 10; $i++) {
?>
    hiiiiii<br>

<?php
}
?>
