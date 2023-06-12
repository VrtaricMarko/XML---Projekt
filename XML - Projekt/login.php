<?php
    $username = "";
    $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        provjera($username, $password);
    }

    function provjera($username, $password) {

        $xml = simplexml_load_file("users.xml");

        foreach ($xml->user as $usr) {
            $usrn = $usr->username;
            $usrp = $usr->password;
            $usrime = $usr->ime;
            $usrprezime = $usr->prezime;
            if ($usrn == $username) {
                if ($usrp == $password) {
                    header('Location: movies.php');
                    exit;
                } else {
                    echo "Netocna lozinka";
                    return;
                }
            }
        }

        echo "Korisnik ne postoji.";
        return;
    }
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>XLM Projekt</title>
    </head>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        *{
            margin: 0;
            padding: 0;
            font-family: 'poppins',sans-serif;
        }
        section{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            background: url('BMW.jpg')no-repeat;
            background-position: center;
            background-size: cover;
        }
        .form-box{
            position: relative;
            width: 400px;
            height: 450px;
            background: transparent;
            border: 2px solid rgba(255,255,255,0.5);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            display: flex;
            justify-content: center;
            align-items: center;

        }
        h2{
            font-size: 2em;
            color: #fff;
            text-align: center;
        }
        .inputbox{
            position: relative;
            margin: 30px 0;
            width: 310px;
            border-bottom: 2px solid #fff;
        }
        .inputbox label{
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: #fff;
            font-size: 1em;
            pointer-events: none;
            transition: .5s;
        }
        input:focus ~ label,
        input:valid ~ label{
        top: -5px;
        }
        .inputbox input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            padding:0 35px 0 5px;
            color: #fff;
        }
        .inputbox ion-icon{
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            top: 20px;
        }
        button{
            width: 100%;
            height: 40px;
            border-radius: 15px;
            background: #fff;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
            margin-top: 20px;
        }
        .register{
            font-size: .9em;
            color: #fff;
            text-align: center;
            margin: 25px 0 10px;
        }
        .register p a{
            text-decoration: none;
            color: #fff;
            font-weight: 600;
        }
        .register p a:hover{
            text-decoration: underline;
        }
    </style>

    <body>
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form method="POST" action="">
                        <h2>Login</h2>
                        <div class="inputbox">
                            <input id="name" name="username" type="text" required>
                            <label for="">Username</label>
                        </div>
                        <div class="inputbox">
                            <input id="password" name="password" type="password" required>
                            <label for="">Password</label>
                        </div>
                        <button type="submit">Log in</button>
                        <div class="register">
                            <p>Don't have an account? <a href="#" style="margin-left: 5px;">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>
