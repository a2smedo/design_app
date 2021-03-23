<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>

  <section>

    <h2>Hello!</h2>

    <p>You are receiving this email because we received a password reset request for your account. </p>

    <div>
      <a href="http://localhost:3000/reset-password/{{ $token }}">Reset Password</a>.
    </div>

    <p>
      This password reset link will expire in 60 minutes.
    </p>

    <p>
      If you did not request a password reset, no further action is required.

    </p>

    <p>Regards,</p>

    <hr>
    <p>
      If you’re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:
      <a href="http://localhost:3000/reset-password/{{ $token }}">
        http://localhost:3000/reset-password/{{ $token }}
      </a>.
    </p>

  </section>



</body>

</html>
