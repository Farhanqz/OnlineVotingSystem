<html>
    <head>
        <title>online voting system</title>
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="header section">
        <h1> online voting system</h1>
    </div>
    <hr>
    <div id="body section">
        <form action="api/login.php" method="post">
            <h2>login</h2>
            <input type="number" name="mobile" placeholder="enter mobile"><br><br>
            <input type="password" name="password" placeholder="enter password"><br><br>
            <select id="dropbox" name="role">
                <option value="1">Voter</option>
                <option value="2">Group</option>
            </select><br><br>
            <button type="submit" id="loginbtn" name="loginbtn">login</button><br><br>
            new user?<a href="routes/register.html">register here</a>
        </form>
    </div>
       </body>
</html>