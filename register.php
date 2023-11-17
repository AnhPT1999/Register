<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dky</title>
</head>

<body>
    <div class="main">
        <h1>Registration</h1>

        <div class="segment">
            <form action="registercontroller.php" method="post">
                <table style="padding-left: 60px; padding-top: 25px">
                    <tr>
                        <td>E-mail:</td>
                        <td><input name="email" class="in" id="email" type="text" required="" placeholder="Enter Email" onkeyup="checkMail(this.value)"></td>
                        <td><span id="txtMail"></span></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" class="in" name="password" id="password" required="" placeholder="Enter Password" onkeyup="checkPw(this.value)"></td>
                        <td><span id="txtPw"></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button id="button">Register</button></td>
                    </tr>
                </table>
            </form>

        </div>

    </div>
</body>

</html>
<script>
    function checkMail(str) {
        if (str.length == 0) {
            document.getElementById("txtMail").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtMail").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "/validation/getHintMail.php?mail=" + str, true);
            xmlhttp.send();
        }
    }

    function checkPw(str) {
        if (str.length == 0) {
            document.getElementById("txtPw").innerHTML = "";
            return;
        } else {
            var xmlhttp1 = new XMLHttpRequest();
            xmlhttp1.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtPw").innerHTML = this.responseText;
                }
            };
            xmlhttp1.open("GET", "/validation/getHintPw.php?pw=" + str, true);
            xmlhttp1.send();
        }
    }

    // function disable(){
    //     const m1 = document.getElementById("txtMail");
    //     const m2 = document.getElementById("txtPw");
    //     const button = document.getElementById("button");

    //     if(!m1.value.length>0 && !m2.value.length>0){
    //         button.disable = false;
    //     }else{
    //         button.disable = true;
    //     }
    // }
    
</script>

<!-- https://www.altcademy.com/blog/how-to-disable-a-button-in-javascript/ -->