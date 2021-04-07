{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>{{$title}} </h1>
    <hr>

    <p>
        Hello {{$name}}.
        <br>
      {{$body}}
    </p>


</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href=" {{ asset('assets/css/font-awesome.min.css') }} ">


  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href=" {{ asset('assets/css/style.css') }} " />


  <title>Document</title>

  <style type="text/css">
    body {
      width: 650px;
      font-family: work-Sans, sans-serif;
      background-color: #f6f7fb;
      display: block;
    }

    a {
      text-decoration: none;
    }

    span {
      font-size: 14px;
    }

    p {
      font-size: 13px;
      line-height: 1.7;
      letter-spacing: 0.7px;
      margin-top: 0;
    }

    .text-center {
      text-align: center
    }

    h6 {
      font-size: 16px;
      margin: 0 0 18px 0;
    }

  </style>

</head>

<body style="margin: 30px auto;">
  <table style="width: 100%">
    <tbody>
      <tr>
        <td>
          <table style="background-color: #f6f7fb; width: 100%">
            <tbody>
              <tr>
                <td>
                  <table style="width: 650px; margin: 0 auto; margin-bottom: 30px">
                    <tbody>
                      <tr>
                        {{-- <td><img src="{{url('/assets/images/logo.png')}}" alt="برينت"></td> --}}
                        <td style="text-align: right; color:#999"><span>تطبيق ديزاين</span></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
          <table style="width: 650px; margin: 0 auto; background-color: #fff; text-align: right; border-radius: 8px">
            <tbody>
              <tr>
                <td style="padding: 30px; float: right;">
                  <h6 style="font-weight: 600"></h6>

                  <p>Hello {{ $data['name'] }}</p>
                  <p>{{ $data['subject'] }}</p>
                  <p>{{ $data['message'] }}</p>
                  <p style="margin-bottom: 0; float: right;">
                    شكرا,<br>تطبيق ديزاين</p>
                </td>
              </tr>
            </tbody>
          </table>
          <table style="width: 650px; margin: 0 auto; margin-top: 30px; text-align: center">
          <tbody>
          <tr>
          <td><a href="email-header.html#" style="font-size:13px">Want to change how you receive these emails?</a></td>
          </tr>

        </td>
      </tr>
    </tbody>
  </table>
</body>

</html>
