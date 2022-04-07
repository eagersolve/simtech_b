<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Contact Us</title>
</head>

<body>



  <div class="container">
    <div class="col-lg-5 m-auto">
      <div class="card mt-5">
        <h1 class="text-center py-2">Contact Us</h1>
        <div class="card-body">

          <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger"> Заполните все поля </div>

          <?php }
          if (isset($_GET['error_email'])) { ?> <div class="alert alert-danger"> Такой e-mail уже существует. Придумайте другой. </div>
          <?php }

          if (isset($_GET['error_size'])) { ?> <div class="alert alert-danger"> Размер файла превышен. </div>
          <?php } ?>

          <?php if (isset($_GET['success'])) { ?> <div class="alert alert-success"> Форма отправлена </div>
          <?php } ?>

          <form action="process.php" method="post" enctype="multipart/form-data">

            <input type="text" class="form-control mb-3" name="user_name" placeholder="Имя*">
            <input type="email" class="form-control mb-3" name="email" placeholder="E-mail*" required>
            <input type="text" class="form-control mb-3" name="subject" placeholder="Тема..*">
            <textarea class="form-control mb-3" name="message" rows="6" cols="30" placeholder="Ваше сообщение...*"></textarea>

            <h6 class="text-center"><u> Выберите ваш пол: </u></h6>
            <div class="d-flex justify-content-around mb-3">
              <div>
                <input type="radio" class="btn-check" id="gender_m" name="gender" value="m" checked>
                <label class="btn btn-secondary" for="gender_m"> Мужской </label>
              </div>
              <div>
                <input class="btn-check" id="gender_w" type="radio" name="gender" value="w">
                <label class="btn btn-secondary" for="gender_w"> Женский </label>
              </div>
            </div>

            <p class="mb-3">С какого устройства обращаетесь:
              <select name="device">
                <option value="desktop" default>desktop</option>
                <option value="mobile">mobile</option>
                <option value="other">other</option>
              </select>
            </p>

            <div class="mb-3">
              <label for="formFileSm" class="form-label"> <small class="opacity-80"> <u>Можете добавить изображение:</small><small class="opacity-50"> (.jpg, .jpeg, .png, max_size 5 MB) </u></small></label>
              <input type="file" class="form-control form-control-sm" id="formFileSm" name="filename" accept=".png, .jpg, .jpeg">
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
              <label class="form-check-label" for="flexCheckDefault">
                <p><b><i>Я согласен на обработку персональных данных.</i></b> </p>
              </label>
            </div>

            <a href="create_db.php" class="btn btn-dark">Создание БД</a>
            <button type="reset" class="btn btn-secondary">Сбросить</button>
            <a href="print_result.php" class="btn btn-warning">Таблица</a>
            <button type="submit " class="btn btn-primary" name="submit">Отправить</button>


          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>