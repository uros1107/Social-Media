<!DOCTYPE html>
<html lang="en">

<head>
    <title>CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    header {
        /* background-color: #666; */
        padding: 30px;
        text-align: center;
        font-size: 35px;
        color: white;
        border-bottom: 1px solid #464040;
    }

    p {
        line-height: 30px;
        font-size: 18px;
        color: black!important;
    }

    h1 {
        font-size: 30px;
        color: black!important;
    }

    nav {
        float: left;
        width: 30%;
        height: 300px;
        background: #ccc;
        padding: 20px;
    }

    nav ul {
        list-style-type: none;
        padding: 0;
    }

    article {
        float: left;
        padding: 20px;
        width: 100%;
        /* background-color: #f1f1f1; */
        /* height: 300px; */
        max-width: 900px;
    }

    section {
        justify-content: center;
    }

    section::after {
        content: "";
        display: table;
        clear: both;
    }

    footer {
        /* background-color: #777; */
        padding: 10px;
        text-align: center;
        /* color: white; */
        justify-content: center;
    }

    .reset-btn {
        background: #FF335C;
        color: white;
        padding: 12px 20px;
        border-bottom: 0px;
        text-decoration: none;
        font-size: 16px!important;
    }

    @media (max-width: 600px) {

        nav,
        article {
            width: 100%;
            height: auto;
        }
    }
    </style>
</head>

<body>
    <header>
        <img src="{{ asset('assets/images/top-left-img.png') }}"></img>
    </header>

    <section style="border-bottom: 1px solid #464040;justify-content: center;display:flex">
        <h1 style="text-align: center"><u>Confirm your registration</u></h1>
        <article>
            <h1 style="text-align: center">Hello</h1>
            <p>Click below to verify your email and complete your profile:</p>
            <div style="width: 100%;text-align:center;margin: 30px 0px;">
                <a class="reset-btn" href="">Verify email</a>
            </div>
            <p>If the above button does not work, kindly try copying and pasting the below URL to your browser's address: https://millionk.com/idol/login</p>
            <p>And entering your account details which you created in the first step</p>
            <div style="text-align:center">
                <div style="">
                    <img src="{{ asset('assets/images/top-left-img.png') }}" style="margin: 0px 30px"></img>
                    <img src="{{ asset('assets/images/top-left-img.png') }}" style="margin: 0px 30px"></img>
                    <img src="{{ asset('assets/images/top-left-img.png') }}" style="margin: 0px 30px"></img>
                </div>
                <p>This is an automated message. Please do not reply.</p>
            </div>
        </article>
    </section>

    <footer style="display:flex;justify-content:center">
        <div style="max-width: 900px;">
            <p>Copyright © 2021 Lumiworks Pte. Ltd. All rights reserved.</p>
            <div>
                <a href="{{ route('terms') }}" style="margin-right: 20px;font-size: 18px!important">Terms</a>
                <a href="{{ route('privacy') }}" style="margin-left: 20px;font-size: 18px!important">Privacy</a>
            </div>
        </div>
    </footer>

</body>

</html>