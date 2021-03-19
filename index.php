<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Title</title>
</head>

<body>
    <div class="container">
        <h1>Title</h1>
        <h5>Subtext</h5>
        <br>
        <a class="btn btn-primary" href="Verbesserung_4._April 2019.one" download role="button">Download dummy.pdf</a>

        <hr>

        <form method="post" enctype="multipart/form-data">
            <label for="message">Message:</label><br>
            <input type="text" class="form-control" name="message" placeholder="message placeholder">
            </p>

            <button type="submit" class="btn btn-primary">Send</button>

        </form>


        <?php
        $report_errors = false;
        if ($report_errors) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }

        if ($_POST['message'] !== NULL) {
            /*
            the url like
            https://api.telegram.org/bot<token>
            
            example:
            $url = "https://api.telegram.org/bot123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11";
            
            visit https://core.telegram.org/bots/api#making-requests for more information
            */

            $url = "https://api.telegram.org/bot<token>/sendMessage";
            $curl = curl_init($url);
            $curl_data = array(
                /*
                the "-" is used to indicate that this is a group chat
                "chat_id" => "-<chatnumber>",

                example: "chat_id" => "-123456789",
                */
                "chat_id" => "-123456789",
                "text" => $_POST['message']
            );
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);

            $result = curl_exec($curl);
            $result = json_decode($result);

            if ($result->{'ok'}) {
                echo "<br>Message sent.";
            } else {
                echo "Message coudn't be send: <pre>" . $result->{'description'} . "</pre>";
            }
        }

        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>