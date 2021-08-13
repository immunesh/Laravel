<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rentobro-Referral</title>
  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" >
  <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/css/responsive.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row mt-30 mb-30">
      <div class="col-sm-12 col-md-3">
        <div class="share-boxes">
          <img src="https://i.ibb.co/PtYrLNy/img1.png" alt="img1" border="0">
          <p>Share with your friends</p>
        </div>
      </div>
      <div class="col"></div>
      <div class="col-sm-12 col-md-3">
        <div class="share-boxes">
          <img src="https://i.ibb.co/P5TdfkT/img2.png" alt="img2" border="0">
          <p>Give her to $5 Discount</p>
          <img src="https://i.ibb.co/Sr5F70S/dotted-arrow1.png" alt="dotted-arrow1" class="dotted-line">
          <img src="https://i.ibb.co/Fqs2KxB/dotted-arrow2.png" alt="dotted-arrow2" class="dotted-line2">
        </div>
      </div>
      <div class="col"></div>
      <div class="col-sm-12 col-md-3">
        <div class="share-boxes">
          <img src="https://i.ibb.co/StC3RWk/img3.png" alt="img3" border="0">
          <p>Get $1 for every $5</p>
        </div>
      </div>
    </div>
    <div class="row refer-form-sec">
      <div class="col">
        <div class="refer-image">
          <img src="https://i.ibb.co/72ngXX8/big-image.jpg" alt="big-image" border="0" />
        </div>
      </div>
      <div class="col">
        <div class="refer-form">
          <ul>
            <li class="facebook-color"><a href="#">Facebook</a></li>
            <li class="youtube-color"><a href="#">you tube</a></li>
            <li class="twitter-color"><a href="#">twitter</a></li>
          </ul>
        </div>
        <div class="refer-form-content">
          <h2>Friends To Friends</h2>
          <p>Talking about friends helps to normalize it. You can start <a href="#">NOW!</a></p>
          <form action="#" method="post">
            <input type="text" name="Your Name" placeholder="Your Friend Name">
            <input type="email" name="Your Email" placeholder="Your Friend Email">
            <p>
              <label class="container-checkbox">i have read and accept the T & C and privacy policy
                <input type="checkbox">
                <span class="checkmark"></span>
              </label></p>
            <button>REFER & EARN</button>
          </form>
        </div>
      </div>
    </div>
    <div class="row mt-30 mb-30">
      <div class="col">
        <div class="referal-progress">
          <h2>YOUR REFERAL PROGRESS</h2>
          <table class="table table-hover">
            <tbody>
              <tr>
                <td>No. of friends who have purchased</td>
                <td><strong>USD : 10.00</strong></td>
              </tr>
              <tr>
                <td>No. of friends who have purchased</td>
                <td><strong>USD : 10.00</strong></td>
              </tr>
              <tr>
                <td>No. of friends who have purchased</td>
                <td><strong>USD : 10.00</strong></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
</body>

</html>