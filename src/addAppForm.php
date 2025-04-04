<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $status = isset($_POST['appStatus']) ? $_POST['appStatus'] : null;
    $company = $_POST['company'];
    $title = $_POST['title'];
    $date = date('Y-m-d', strtotime($_POST['date']));

    addApp($company,$title,$date,$status);
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
    <form method='post' action='' id="appForm">
        <div class='field'>
            <label class='label'>Company</label>
            <label class='tag is-danger mb-1' id="companyError">Enter company name (100 character maximum).</label>
            <div class='control'>
                <input name='company' id='company' class='input' type='text' maxlength='100'>
            </div>
        </div>
        <div class='field'>
            <label class='label'>Position Title</label>
            <label class='tag is-danger mb-1' id="titleError">Enter position title (100 character maximum).</label>
            <div class='control'>
                <input name='title' id='title' class='input' type='text' maxlength='100'>
            </div>
        </div>
        <div class='field'>
            <label class='label'>Date Applied</label>
            <label class='tag is-danger mb-1' id="dateError">Enter date in MM/DD/YYYY format.</label>
            <div class='control'>
                <input name='date' id='date' class='input' type='date'>
            </div>
        </div>
        <div class='field'>
            <label class='label'>Application Status</label>
            <label class='tag is-danger mb-1' id="statusError">Must select application status.</label>
            <div class='control radios'>
                <div class='level mx-auto'>
                    <label class='radio'>
                        <input name='appStatus' type='radio' value='submitted'/>
                        Submitted
                    </label>
                    <label class='radio'>
                        <input name='appStatus' type='radio' value='received'/>
                        Received
                    </label>
                    <label class='radio'>
                        <input name='appStatus' type='radio' value='rejected'/>
                        Rejected
                    </label>
                </div>
                <div class='level mx-auto'>
                    <label class='radio'>
                        <input name='appStatus' type='radio' value='interview'/>
                        Interview
                    </label>
                    <label class='radio'>
                        <input name='appStatus' type='radio' value='offer'/>
                        Offer Received
                    </label>
                    <label class='radio'>
                        <input name='appStatus' type='radio' value='accepted'/>
                        Accepted
                    </label>
                </div>
            </div>
        </div>
        <div class='level block' style="width: 100%">
            <div class='field is-grouped'>
                <div class='control level-left'>
                    <button name='submit' class='button is-link' type='submit'>Add</button>
                </div>
                <div class='control level-right'>
                    <a class='button is-danger' href="index.php">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="scripts/addAppForm.js"></script>
</body>
</html>