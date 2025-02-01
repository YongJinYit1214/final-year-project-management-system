<?php
session_start();
require_once "meetings-fn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'student') {
        echo "Unauthorized access!";
        exit;
    }

    $log_id = $_POST['log_id'];
    $work_done = $_POST['work_done'];
    $future_work = $_POST['future_work'];
    $other = $_POST['other'];

    $update_success = updateMeetingLog($log_id, $work_done, $future_work, $other);

    if ($update_success) {
        header("Location: meeting-log-details.php?meeting_id=" . $_POST['meeting_id']);
        exit;
    } else {
        echo "Error updating log!";
    }
}

function updateMeetingLog($log_id, $work_done, $future_work, $other) {
    require "db.php";
    $sql = "UPDATE meeting_logs SET work_done=?, future_work=?, other=? WHERE meeting_log_id=?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$work_done, $future_work, $other, $log_id]);
}
?>
