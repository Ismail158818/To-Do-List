<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="sl.css">
</head>
<body>
<div class="main">
    <div class="navbar">
        <div class="icon">
            <h2 class="logo">Darrebni</h2>
        </div>
    
    </div>
    <div class="content">
        <h1>Task Page & <br><span>Darrebni</span></h1>
        <div class="form">
            <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}" novalidate >
                @csrf
                <h2>Login</h2>
                <input type="email" name="email" placeholder=" Email ">
                <input type="password" name="password" placeholder=" Password ">
                <button class="btnn">Login</button>
                <p class="link">Don't have an account<br>
                    <a href="{{route('register')}}">Sign up </a> here</p>
                <p class="liw">Log in with</p>
                <div class="icons">
                    <a href="https://ar-ar.facebook.com/login/?next=https%3A%2F%2Far-ar.facebook.com%2F"target="_blank"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="https://www.instagram.com/accounts/emailsignup/"target="_blank"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="https://x.com/?logout=1717397979902&mx=2" target="_blank"><ion-icon name="logo-twitter"></ion-icon></a>
                    <a href="https://www.bing.com/ck/a?!&&p=29ff4a7139822b14JmltdHM9MTcxNzM3MjgwMCZpZ3VpZD0wMGVkYTAzZS1iOWM2LTY5NjItMmRjOS1iNDcxYjhkYzY4ODcmaW5zaWQ9NTIwMQ&ptn=3&ver=2&hsh=3&fclid=00eda03e-b9c6-6962-2dc9-b471b8dc6887&psq=%d8%ba%d9%88%d8%ba%d9%84+%d8%aa%d8%b3%d8%ac%d9%8a%d9%84+%d8%a7%d9%84%d8%af%d8%ae%d8%b2%d9%84&u=a1aHR0cHM6Ly9hY2NvdW50cy5nb29nbGUuY29tL2xvZ2luP2hsPWFy&ntb=1"><ion-icon name="logo-google" target="_blank"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-skype" target="_blank"target="_blank"></ion-icon></a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script src="j.js"></script>
</body>
</html>
