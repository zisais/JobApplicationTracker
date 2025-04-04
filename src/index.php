<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Application Tracker</title>
    <link rel='stylesheet' href='css/bulma.css'>
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>
    <section class='section'>
        <div class='container'>
            <!-- Status Key -->
            <div class='box mx-auto'>
                <p class='title is-4'>Status Key</p>
                <ul class='content'>
                    <li class='yellow'>Submitted</li>
                    <li class='orange'>Received/In-Review</li>
                    <li class='red'>Rejected</li>
                    <li class='purple'>Interview</li>
                    <li class='blue'>Offer Received</li>
                    <li class='green'>Accepted</li>
                </ul>
            </div>

            <div class='level mx-auto'>
                <div class='level-right level-item'>
                    <a id="addButton" class='button is-link' href="addAppForm.php">Add Application</a>
                </div>
            </div>

            <!-- Application Table -->
            <div class='block mx-auto'>
                <table class='table has-text-centered is-fullwidth'>
                    <thead>
                    <tr>
                        <th class="has-text-centered">Company</th>
                        <th class="has-text-centered">Title</th>
                        <th class="has-text-centered">Date Applied</th>
                    </tr>
                    </thead>
                    <tbody id='tableBody'>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src='scripts/index.js'></script>
</body>
</html>