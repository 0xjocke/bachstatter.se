<html>
<head>
	<meta charset="UTF-8">
	<title>Mailform</title>
    <style>
        body {
            background: #d2d0bf;
        }
        h1{
            margin-top: 200px;
            color: #212230;
            font-size: 100px;
            text-align: center;
            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 

        }

    </style>
</head>
<body>
	     <?php
                        if(isset($_POST['submit'])) {
                     
                        $to      = 'joachim.bachstatter@gmail.com';
                        $subject = 'bachstatter.se from '. $_POST['name'];
                        $message = $_POST['text'];
                        $headers = $_POST['email'];
                           mail($to, $subject, $message, $headers);
                        }
                    ?>

                    <h1>Tack för mailet!</h1>
                    <script type="text/javascript">
						setTimeout("window.location = 'index.html'", 2000);
					</script>
</body>
</html>

