<?php

if (isset($_GET['formsubmit'])) echo "<script>alert('Неверный код');</script>";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <link href="style.css" rel="stylesheet" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/favicon.ico">

  <title>Подтверждение</title>
</head>

<body>
  <header>
    <img src="files/LetterA.png" class="A_picture" width="50" height="50">
  </header>
  <div class="container">
    <legend>Подтверждение</legend>
    <div class="GreyText">
      <p>Мы отправили вам код подтверждения на электоронную почту.</p>
    </div>
    <div class="row">

      <div class="col-sm-4">
        <form action="ok.php" method="POST">
          <div class="form-group">

            <label for="">Проверочный код из email</label>

            <input type="text" class="form-control" id="" name="user_code" placeholder="Введите код">
          </div>

          <div class="btn_btn-primary" width="440" height="69">
            <button type="submit" class="btn" width="440" height="400" name="next">Далее </button>
          </div>
        </form>
      </div>
    </div>

  </div>
</body>

</html>