<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Tooplate">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
  <title>DAERP</title>
  <!-- Archivos adicionales CSS -->
  <link rel="stylesheet" href="publico/css/super.css">

</head>

<body>
  <div class="container">
    <?php require_once "aplicacion/vistas/partes/supertablero_partes/sidebar_supertablero.php"; ?>
  </div>
  <!-- sidebar -->

  <!--Cuerpo-->
  <main class="data">
    <header>
      <h1>Hello, Yehor</h1>
      <div class="header-info">
        <div>Your balance: <span>$1000</span></div>
        <div class="profile">Yehor H.</div>
      </div>
    </header>

    <section class="stats">
      <div class="stat-item">12 <br>Courses completed</div>
      <div class="stat-item">3 <br>Certificates earned</div>
      <div class="stat-item">2 <br>Courses in progress</div>
      <div class="stat-item">1 <br>Career path</div>
      <div class="stat-item start-quiz">Start quiz</div>
    </section>

    <section class="explore">
      <h2>Let's explore</h2>
      <div class="filters">
        <button>Sort by popular</button>
        <button>Courses</button>
        <button>Category: All</button>
        <button>Filters</button>
      </div>
      <div class="course-list">
        <div class="course-card">
          <img src="img1.jpg" alt="Course Image">
          <h3>Cinema 4D Training for beginners</h3>
          <p>24h left</p>
        </div>
        <div class="course-card">
          <img src="img2.jpg" alt="Course Image">
          <h3>Sustainability in Architecture</h3>
          <p>24h left</p>
        </div>
        <div class="course-card">
          <img src="img3.jpg" alt="Course Image">
          <h3>200 Hour Yoga Teacher Training</h3>
          <p>24h left</p>
        </div>
      </div>
    </section>

    <section class="reviews">
      <h2>My reviews</h2>
      <div class="review">
        <p>Anna Holiuk<br><span>200-hour Yoga Teacher Training</span><br><span>⭐⭐⭐⭐⭐</span></p>
      </div>
      <div class="review">
        <p>Alex Chekilov<br><span>Basic Photography Course</span><br><span>⭐⭐⭐⭐</span></p>
      </div>
    </section>

    <section class="quiz-reminder">
      <h3>Haven't yet decided what to study?</h3>
      <button>Start quiz</button>
    </section>
  </main>
  <!--Additional Scripts -->
  <?php include_once "aplicacion/vistas/partes/javascript.php"; ?>

</body>

</html>