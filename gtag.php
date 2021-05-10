<?php
function gtag()
{
    $url = $_SERVER['HTTP_HOST'];
    debug_to_console($url);
    if ($url == "code-gurukul.com") {
?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-178925756-1"></script>
        <script src="javascript/gtag.js"></script>
<?php
    }
}

function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


?>