
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Placement Sport</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/loginStyle.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="//fonts.googleapis.com/css?family=Tenali+Ramakrishna&amp;subset=telugu" rel="stylesheet">
</head>
<body>
<div id="particles-js"></div>
<h1>Job Placement Sport</h1>
<div class="main-agileinfo">
    <div class="contact-w3left">
    <img src="images/1495646438cristiano-ronaldo-2017.png" alt="">  
    </div>
    <div class="videologin">
        <h2 class="sub-head">Signin Admin Here</h2>
        <form action="{{ url('login-admin') }}" method="post">
            <div class="icon1">
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <input type="email" placeholder="email" name="email">
            </div>
            <div class="icon1">
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="clear" style="color: red">
                @if(session('notif'))
                    <p style="font-size: 16pt">{{ session('notif') }}</p>
                @endif
            </div>
            <div class="bottom">
                <input type="submit" value="Signin">
            </div>
        </form> 
    </div>  
    <div class="clear"></div>
</div>
<div class="copyw3-agile">
    <p> © 2017 Job Placement Sport</p>
</div>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
</body>
</html>