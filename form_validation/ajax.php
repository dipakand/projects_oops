<?php
error_reporting(0);
$data = [
    'success' => true,
    'data' => $save,
    'msg' => "Thanks for contact us. We get back to you"
];

echo json_encode($data);
?>