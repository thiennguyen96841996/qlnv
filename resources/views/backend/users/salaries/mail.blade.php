<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>HapoSoft</title>
   <link rel="shortcut icon" href="https://uphinhnhanh.com/images/2018/03/15/hapoERP.png" type="image/png" />
   <style type="text/css">
       body{margin: 0px;padding: 0px;font-family: Verdana;font-size: 13px;}
       .wrapper{width: 650px;margin: auto; border: 1px solid #DDDDDD; color:white; background-image: url('https://uphinhnhanh.com/images/2018/03/15/our_customers.jpg'); padding-left: 15px;}
       .header .left{ float: left; width: 280px; }
       .header .left p{ text-align: center; }
       .logo{ padding-top: 15px; margin-left: 150px; width: 200px; }
       .title{text-align: center; font-size: 30px;}
       .vacation{ padding-top: 30px; }
       .vacation p{ padding-left: 15px;}
       .sign{ width: 300px; padding-left: 350px; padding-top: 50px; padding-bottom: 50px;}
       .sign p{text-align: center;}   
   </style>
</head>
<body>
<div class="wrapper">
   <div class="header">
       <div class="left">
           <strong><p>Cộng hòa xã hội chủ nghĩa Việt Nam</p>
           <p>Độc lập - Tự do - Hạnh Phúc</p></strong>
       </div>
       <div class="right">
           <img src="https://uphinhnhanh.com/images/2018/03/15/hapoERP.png" class="logo">
       </div>
   </div>
   <div class="vacation">
       <p class="title">Lương</p>
       <p>Gửi: {{ $data['name'] }}</p>
       <p><u>Tháng này bạn nhận được:</u> <strong>{{ $data['total'] }}</strong> dollar</p>
       <p><u>Bao gồm</u>{{ $data['overtime'] }} tiếng làm thêm và {{ $data['working'] }} ngày đi làm</p>
   </div>
   <div class="sign">
       <p>Hà nội ngày: <?php echo date('d-m-Y : H:i:s') ?></p>
       <p>Ký tên:</p>
       <p>Manager</p>
   </div>
</div>
</body>
</html>
