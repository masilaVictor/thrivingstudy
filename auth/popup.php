<!DOCTYPE html>
<html>
<head>
<title>How to display PHP contact form popup using jQuery</title>
<script src="./vendor/jquery/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="style.css" />
</head>
<body>
    <div id="contact-icon">
        <img src="./icon/icon-contact.png" alt="contact" height="50"
            width="50">
    </div>
    <!--Contact Form-->
    <div id="contact-popup">
        <form class="contact-form" action="" id="contact-form"
            method="post" enctype="multipart/form-data">
            <h1>Contact Us</h1>
            <div>
                <div>
                    <label>Name: </label><span id="userName-info"
                        class="info"></span>
                </div>
                <div>
                    <input type="text" id="userName" name="userName"
                        class="inputBox" />
                </div>
            </div>
            <div>
                <div>
                    <label>Email: </label><span id="userEmail-info"
                        class="info"></span>
                </div>
                <div>
                    <input type="text" id="userEmail" name="userEmail"
                        class="inputBox" />
                </div>
            </div>
            <div>
                <div>
                    <label>Subject: </label><span id="subject-info"
                        class="info"></span>
                </div>
                <div>
                    <input type="text" id="subject" name="subject"
                        class="inputBox" />
                </div>
            </div>
            <div>
                <div>
                    <label>Message: </label><span id="userMessage-info"
                        class="info"></span>
                </div>
                <div>
                    <textarea id="message" name="message"
                        class="inputBox"></textarea>
                </div>
            </div>
            <div>
                <input type="submit" id="send" name="send" value="Send" />
            </div>
        </form>
    </div>
</body>
</html>