<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login & Signup RMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body>
  @if(session('success') || session('error') || session('warning') || session('info'))
      <div id="flash-message" class="message">
          @include('dashboard.message.message')
      </div>
  @endif
  <div class="main">
    <input type="checkbox" id="chk" aria-hidden="true" />
    <div class="signup">
      <form class="pt-3" action="{{url('/user-login')}}" method="POST">
        @csrf
        <label for="chk" aria-hidden="true">Login</label>
        <input type="email" name="txtEmail" placeholder="User email" required />
        <input type="password" name="txtPassword" placeholder="Password" required />
        <button>Login</button> 
        <div class="social-login">
            <a href="{{url('/login/google')}}"><i class="fab fa-google"></i></a>
            <a href="{{url('/login/facebook')}}"><i class="fab fa-facebook-f"></i></a>
            <a href="{{url('/login/github')}}"><i class="fab fa-github"></i></a>
        </div>
      </form>
    </div>
    <div class="login">
      <form action="{{url('/new-user')}}" method="POST">
        @csrf
        <label for="chk" aria-hidden="true">Sign Up</label>
        <input class="form-control" id="txtName" placeholder="Enter your full name" type="text" name="txtName" required>
        <input class="form-control" id="txtEmail" placeholder="Enter your email" type="email" name="txtEmail" required>
        <input class="form-control" id="txtPassword" placeholder="Enter your password" type="password" name="txtPassword" required>
        <input class="form-control" id="txtConfirmPassword" placeholder="Retype your password" type="password" required>
        <div id="matchMessage" class="form-text"></div>
        <button>Sign Up</button>
        <div class="social-login">
            <a href="{{url('/login/google')}}"><i class="fab fa-google"></i></a>
            <a href="{{url('/login/facebook')}}"><i class="fab fa-facebook-f"></i></a>
            <a href="{{url('/login/github')}}"><i class="fab fa-github"></i></a>
        </div>
      </form>
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const flashMessage = document.getElementById("flash-message");
        if (flashMessage) {
            setTimeout(() => {
                flashMessage.classList.add("hide");
            }, 4000); 
        }
    });

    const password = document.getElementById('txtPassword');
    const confirmPassword = document.getElementById('txtConfirmPassword');
    const matchMessage = document.getElementById('matchMessage');

    function validatePasswordStrength(pw) {
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?#&^_\-]).{7,}$/;
        return regex.test(pw);
    }

    function validate() {
        const pass = password.value;
        const confirm = confirmPassword.value;

        if (!validatePasswordStrength(pass)) {
            matchMessage.innerHTML = "Password must be at least 7 characters and A-Z, a-z, 0-9, !@#$%";
            matchMessage.style.color = "orange";
            return false;
        }

        if (pass !== confirm) {
            matchMessage.innerHTML = "Passwords do not match.";
            matchMessage.style.color = "red";
            return false;
        }

        matchMessage.innerHTML = "Passwords match and are strong!";
        matchMessage.style.color = "green";
        return true;
    }

    password.addEventListener('input', validate);
    confirmPassword.addEventListener('input', validate);
</script>

</body>
</html>
