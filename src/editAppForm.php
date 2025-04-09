<?php
include 'db.php';

$id = $_GET['id'];
$row = getApp($id);
$company = $row['company'];
$title = $row['title'];
$date = $row['appDate'];
$status = $row['status'];

if (isset($_POST['submit'])) {
    $newStatus = $_POST['appStatus'];
    $newCompany = $_POST['company'];
    $newTitle = $_POST['title'];
    $newDate = date('Y-m-d', strtotime($_POST['date']));

    editApp($id,$newCompany,$newTitle,$newDate,$newStatus);
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Application Tracker</title>
    <link rel='stylesheet' href='css/bulma.css'>
    <link rel='stylesheet' href='css/style.css'>
</head>
<body class='theme-dark'>
<div class='block addForm mx-auto mt-3'>
    <label class="is-size-3 has-text-weight-bold">Edit Application</label>
    <form method='post' action='' id="appForm">
        <div class='field'>
            <label class='label'>Company</label>
            <label class='tag is-danger mb-1' id="companyError">Enter company name (100 character maximum).</label>
            <div class='control'>
                <input name='company' id='company' value='<?=$company?>' class='input' type='text' maxlength='100'>
            </div>
        </div>
        <div class='field'>
            <label class='label'>Position Title</label>
            <label class='tag is-danger mb-1' id="titleError">Enter position title (100 character maximum).</label>
            <div class='control'>
                <input name='title' id='title' value='<?=$title?>' class='input' type='text' maxlength='100'>
            </div>
        </div>
        <div class='field'>
            <label class='label'>Date Applied</label>
            <label class='tag is-danger mb-1' id="dateError">Enter date in MM/DD/YYYY format.</label>
            <div class='control'>
                <input name='date' id='date' value='<?=$date?>' class='input' type='date'>
            </div>
        </div>
        <div class='field'>
            <label class='label'>Application Status</label>
            <label class='tag is-danger mb-1' id="statusError">Must select application status.</label>
            <div class='control radios'>
                <div class='level mx-auto'>
                    <label class='radio'>
                        <input name='appStatus' type='radio' value='submitted' <?=$status === 'submitted' ? 'checked' : ''?>/>
                        Submitted
                    </label>
                    <label class='radio'>
                        <input name='appStatus' type='radio' value='received' <?=$status === 'received' ? 'checked' : ''?>/>
                        Received
                    </label>
                    <label class='radio'>
                        <input name='appStatus' type='radio' value='rejected' <?=$status === 'rejected' ? 'checked' : ''?>/>
                        Rejected
                    </label>
                </div>
                <div class='level mx-auto'>
                    <label class='radio'>
                        <input name='appStatus' type='radio' value='interview' <?=$status === 'interview' ? 'checked' : ''?>/>
                        Interview
                    </label>
                    <label class='radio'>
                        <input name='appStatus' type='radio' value='offer' <?=$status === 'offer' ? 'checked' : ''?>/>
                        Offer Received
                    </label>
                    <label class='radio'>
                        <input name='appStatus' type='radio' value='accepted' <?=$status === 'accepted' ? 'checked' : ''?>/>
                        Accepted
                    </label>
                </div>
            </div>
        </div>
        <div class='level block' style="width: 100%">
            <div class='field is-grouped'>
                <div class='control level-left'>
                    <button name='submit' class='button is-link' type='submit'>Save</button>
                </div>
                <div class='control level-right'>
                    <a class='button is-danger' href="index.php">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="scripts/appForm.js"></script>
</body>
</html>