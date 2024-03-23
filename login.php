<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>


<body>
    <div class="form">
        <form action="login.php" method="POST">
            <label>Username:</label><input type="text" name="username" class="username"><br>
            <label>Password:</label><input type="password" name="password" class="username"><br>
            <input type="submit" name="submit" value="Submit" class="button">
        </form>
    </div>
    <script>
        const currentUrl = window.location.href;
        var wait = (ms) => {
            const start = Date.now();
            let now = start;
            while (now - start < ms) {
                now = Date.now();
            }
        }
        document.querySelector(".button")
            .addEventListener("click", function () {
                var isLoggedIn = <?php echo isset ($_SESSION["username"]) ? 'true' : 'false'; ?>;
                if (isLoggedIn) {
                    if (currentUrl == "http://localhost/php/login.php") {
                        alert("Incorrect Password or Username!");
                        location.reload();

                    }
                }

            });



    </script>
</body>
<style>
    body {
        background-image: url("src/bg.png");
        color: aliceblue;
        font-family: Tahoma;


    }

    .button {
        background-color: gold;
        border-radius: 12px;
        color: black;
        cursor: pointer;
        font-weight: bold;
        padding: 10px 15px;
        text-align: center;
        transition: 200ms;
        width: 100%;
        box-sizing: border-box;
        border: 0;
        font-size: 16px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button:not(:disabled):hover,
    .button:not(:disabled):focus {
        outline: 0;
        background: gold;
        box-shadow: 0 0 0 2px rgba(0, 0, 0, .2), 0 3px 8px 0 rgba(0, 0, 0, .15);
    }

    .button:disabled {
        filter: saturate(0.2) opacity(0.5);
        -webkit-filter: saturate(0.2) opacity(0.5);
        cursor: not-allowed;
    }

    label {

        float: left;
        clear: left;
        text-align: center;
        background-color: black;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        height: 150%;
    }

    .username {
        width: 100%;
        line-height: 20px;
    }

    @media (pointer:none),(pointer:coarse) {
        min-height: 50%;
        min-width: 50%;
    }


    form {
        display: inline-block;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }




    </html>
    <?php
    session_start();
    $username = @$_POST['username'];
    $password = @$_POST['password'];
    require ("connect.php");

    if (isset ($_POST['submit'])) {
        if (!empty ($username) && $password) {
            $check = "select * from users where username = '$username'";
            $result = $conn->query($check);
            $rows = mysqli_num_rows($result);
            if ($rows != 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $db_username = $row['username'];
                    $db_password = $row['password'];
                }
                if ($username == $db_username && $password == $db_password) {
                    echo "logged in";
                    @$_SESSION["username"] = $username;
                    header("Location: index.php");
                } else {
                    echo "<html><script>alert('Incorrect Password!');</script></html>";

                }
            } else {
                echo "not found";
    if (isset ($_POST['submit'])) {
        if (!empty ($username) && $password) {
            $check = "select * from users where username = '$username'";
            $result = $conn->query($check);
            $rows = mysqli_num_rows($result);
            if ($rows != 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $db_username = $row['username'];
                    $db_password = $row['password'];
                }
                if ($username == $db_username && $password == $db_password) {
                    echo "logged in";
                    @$_SESSION["username"] = $username;
                    header("Location: index.php");
                } else {
                    echo "<html><script>alert('Incorrect Password!');</script></html>";

                }
            } else {
                echo "not found";
            }
        } else {
            echo "pease fill in all the fields";
        }
    }
    ?>
        } else {
            echo "pease fill in all the fields";
        }
    }
    ?>