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
        #left_pannel{
            position: relative;
            max-width: 200px;
            min-height: 600px;
            background-color:#404b56;
            flex:1;
        }
        #left_pannel:hover {
            max-width: 500px;
        }
        #profile_img {
            width: 150px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 3px;
            border-radius: 50%;
            border: 2px solid;
            border-color: black;
        }
        #left_pannel ul li{   
            float: left;
            width: 100%;
            font-size: 18px;
            color: white;
            font-weight: 700;
            padding: 3px;
            word-wrap: break-word;
        }
        #left_pannel label {   
            height: 30px;
            display: block;
            text-align: center;
            font-size: 18px; 
            color: white;
            background-color: #404b56;
            border-bottom: solid thin gray;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        #option {
            position: absolute;
            bottom: 0px;
            width: 100%;
        }
        
        #left_pannel label img {
            float: left;
            width: 20px;
            padding: 5px;
        }
        #left_pannel label:hover {
            
            color: black;
            background-color:aqua;
            opacity: 0.8;
            transform: scaleY(1.1);
            -moz-transform: scaleY(1.1);
            -webkit-transform: scaleY(1.1);
            -o-transform: scaleY(1.1);
            -ms-transform: scaleY(1.1);
        }
        #right_pannel {
            min-height: 600px;
            background-color:darkgrey;
            flex:4;
        }
        #header {
            background-color:#778593;
            height: 50px;
            text-align: center;
            font-size: 42px;
            font-family: fantasy;
            animation: name 4s infinite;
        }
        @keyframes name {
            0% {
                color: white;
            }
            70% {
                color:darkslategray;
            }
            100% {
                color: black;
            }
        }
        #container {
            display: flex;
        }
        #inner_left_pannel {
            flex: 1;
            background-color:dimgray;
            min-height: 500px;
        }
        #inner_right_pannel {
            flex: 3;
            background-color: white;
            min-height: 500px;
            transition: all 0.6s ease;
        }
        #radio_chat:checked ~ #inner_right_pannel {
            flex: 0;
            
        }
        #radio_contacts:checked ~ #inner_right_pannel {
            flex: 0;
            
        }
        #radio_settings:checked ~ #inner_right_pannel {
            flex: 0;
            
        }
    </style>

    <body>
        <div id="wrapper">
            <div id="left_pannel">
                <img id="profile_img" src="ui/images/user3.jpg">

                <div>
                    <ul id="info">
                        <li>Name</li>
                        <li>nguyensinhhien31082001@gmail.com</li>
                        <li>01234567</li>
                    </ul>
                </div>

                <br><br>
                <div id="option">
                    <label id="label_chat" for="radio_chat"><img src="ui/icons/Chats-icon.png">Chat</label>
                    <label id="label_contact" for="radio_contacts"><img src="ui/icons/contact-icon.png">Contacts</label>
                    <label id="label_settings" for="radio_settings"><img src="ui/icons/settings.png">Setting</label>
                    <label id="label_logout" for=""><img src="ui/icons/logout.png">Log out</label>
                </div>
                
            </div>
            <div id="right_pannel">
                <div id="header"> LIVE CHAT</div>
                <div id="container">
                     <div id="inner_left_pannel">
                        
                    </div>

                    <input type="radio" id="radio_chat" name="myradio" style="display:none;">
                    <input type="radio" id="radio_contacts" name="myradio" style="display:none;">
                    <input type="radio" id="radio_settings" name="myradio" style="display:none;">

                   

                    <div id="inner_right_pannel"></div>
                </div>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
    function _(element) {
        return document.getElementById(element);
    }


    var label = _("label_chat");
    label.addEventListener("click", function() {
         var inner_pannel = _("inner_left_pannel");
         var ajax = new XMLHttpRequest();

         ajax.onload = function(){
             if(ajax.status == 200 || ajax.readyState == 4) {
                 inner_pannel.innerHTML = ajax.responseText;
             }
         }
         
         ajax.open("POST", "file.php", true);
         ajax.send("data = some text");
    });
    
</script>