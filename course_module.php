<?php
$modules =
    array(
        // beginner
        array(
            array("module 1", 9, "Block based programming, sequences, loops, events.", "4,500", "70"),
            array("module 2", 40, "Module 1+ Algorithms, Debugging, Variables, Conditionals, Extended loop, Functions, Event driven programming, Basics of App development and UI/UX.", "20,000", "275"),
            array("module 3", 100, "Module 2+ Game design, AI and Advanced App Development", "45,000", "625"),
        ),
        // intermediate
        array(
            array("module 1", 9, "Block based programming, sequences, loops, events, algorithms, debugging", "4,500", "70"),
            array("module 2", 40, "Module 1+ Advanced programming concepts, Basics of App devlopment and UI/UX, Basics of game development", "20,000", "275"),
            array("module 3", 100, "Advanced App Development, Interactive Game design, Web Design , AI", "45,000", "625"),
        ),
        // advanced
        array(
            array("module 1", 9, "Block based programming, sequences, algorithm, debugging, loops, events,variables", "4,500", "70"),
            array("module 2", 40, "Module 1+ Advanced programming concepts, Introduction Basics of App devlopment and UI/UX, Basics of game development", "20,000", "275"),
            array("module 3", 100, "Interactive game design, Advanced App development, Advanced web development, Projects on AI", "45,000", "625"),
        ),
    );


function get_module_data($course_id, $module_id, $filed)
{
    global $modules;
    echo $modules[$course_id - 1][$module_id - 1][$filed - 1];
}

// get_module_data(1, 1, 1);
