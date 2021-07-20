<!DOCTYPE html>
<html>
    <head>
        <title>Hien'live chat</title>

    </head>

    <style type="text/css">
        body{
            background-color:#778593;
        }
        #wrapper {
            
            max-width: 1000px;
            min-height: 600px;
            display: flex;
            margin: auto;
        }
        #header{
            background-color:aquamarine;
            max-width: 1000px;
            height: 100px;
            margin: auto;
            border-radius: 20%;
            text-align: center;
            font-weight: bold;
            font-size: 60px;
            font-family:cursive;
            animation: title 4s infinite;
        }
        @keyframes title {
            0% {
               
                color: white;
            }
            50% {
               
                color:darkgrey;
            }
            100% {
               
                color: black;
            }
        }
        /* #error {
            text-align: center;
            color: white;
            font-weight: bold;
            padding: 20px;
            margin: auto;
            font-size: 14px;
            background-color: orange;
            max-width: 500px;
            opacity: 0.8;
            display: none;
        } */
        form {
            margin: auto;
            padding: 30px;
            width: 100%;
            background-color:darkgrey;
            max-width: 500px;
            border-radius: 10px;
        }
        input[type=text],[type=password],[type=email]{
            padding: 10px;
            margin: 10px;
            width: 90%;
            border-radius: 10px;
            border: solid 1px grey;
        }
        input[type=button]{
            width: 100%;
            height: 40px;
            cursor: pointer;
            border-radius: 10px;
            background-color:lightblue;
            font-size: 20px;
        }
        input[type="radio"]{
            transform: scale(1.7,1.7);
        }
    </style>

    <body>
        <div id="wrapper">
            <div id="header">
                SIGN UP
            </div>
            <form id="myform">
                <input type="text" name="username" placeholder="Username...">
                <br><br>
                <input type="email" name="email" placeholder="Email...">
                <br><br>
                Gender:
                <input type="radio" value="Male" name="gender"> Male
                <input type="radio" value="Female" name="gender"> Female
                <br>
                <input type="password" name="password" placeholder="Password...">
                <br><br>
                <input type="password" name="password2" placeholder=" Retype password...">
                <br><br>
                <input type="button" value="Sign up" id="signup_button">
                <br><br>
                <!-- <footer><div id="error">some text</div></footer> -->
                     
                
            </form>
        </div>
        
    </body>
</html>

<script type="text/javascript">
    function _(element){
        return document.getElementById(element);
    }

    var signup_button = _("signup_button" );
    signup_button.addEventListener("click", collect_data);

    function collect_data(){
         
        signup_button.disabled = true;
        signup_button.value = "Loading...Please wait"
        var myform = _("myform");
        var inputs = myform.getElementsByTagName("INPUT");

        var data = {};
        for (var i = inputs.length-1; i >=0 ; i--) {
            var key = inputs[i].name;
            
            switch(key){
                case "username":
                    data.username = inputs[i].value;
                    break;
                case "email":
                    data.email = inputs[i].value;
                    break;
                case "gender":
                    if(inputs[i].checked){
                    data.gender = inputs[i].value;
                    }
                    break;
                case "password":
                    data.password = inputs[i].value;
                    break;
                case "password2":
                    data.password2 = inputs[i].value;
                    break;
            }
        }
        
        send_data(data, "signup");
       
    }
    
    function send_data(data, type) {
        var xml = new XMLHttpRequest();
        xml.onload = function(){

            if(xml.readyState == 4 || xml.status == 200) {
                handle_result(xml.responseText);
                signup_button.disabled = false;
                signup_button.value = "Sign up"
            }
        }    
            data.data_type = type;
            var data_string = JSON.stringify(data);
            xml.open("POST", "api.php", true);
            xml.send(data_string);
        
    }
    
    function handle_result(result){

        var data = JSON.parse(result);
        if(data.data_type == "info"){
            window.location = "index.php";
        }
        else{
            // var error = _("error").
            // error.getElementById("error").innerHTML = data.message;
            // error.style.display = "block";
            alert(data.message);
        }
    }
    
</script>