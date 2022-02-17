<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.blade.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="icon" href="img/cruzroja.png" type="image/png" height="100"/>
</head>
<body style="font-family: 'Assistant';">
<section class="vh-90">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{url('img/hospital.png')}}" width="400" height="400" class="img-fluid"
          alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form>
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
          <img src="{{url('img/projectebroggi.png')}}" width="350" class="img-fluid"
          alt="Sample image">
          </div>

          <br>

          <!-- Email Login -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Correo electrónico</label>
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Introduce tu correo electrónico" />
          </div>

          <!-- Contraseña Login -->
          <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Contraseña</label>
            <input type="contraseña" id="form3Example4" class="form-control form-control-lg"
              placeholder="Introduce tu contraseña" />
          </div>

          <!-- Boton Login -->
          <button type="button" class="btn btn-danger" style="background-color: #104069; float: right;">Iniciar Sesión</button>
        </form>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/668120ee8a.js" crossorigin="anonymous"></script>
</script>
</html>