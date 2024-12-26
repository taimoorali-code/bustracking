<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Flex Invest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/aos@next/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
   @extends('components.navbar')

   <section class="reward-section" data-aos="fade-up">
    <div class="section-title text-center my-5 pt-5">
      <p>It’s your Buss Tracking, Track it</p>
      <h3 class="mb-3">So, how do I Track Point?</h3>
      <h6>Join <span>500K+ </span>other students <br>
        Stuends who want to reach<span>on Time</span> in University</h6>
    </div>
    <div class="container">
        <div class="ellips left blue"></div>
        <div class="row align-items-center">
          <div class="col-md-6" data-aos="zoom-in-right">
            <div class="ellips-image-wrap">
              <img src="assets/images/image 6.png" alt="">
            </div>
          </div>
          <div class="col-md-5 offset-md-1" data-aos="fade-right">
            <div class="section-title reward-content">
              <h3>Enhance Travel Efficiency with <span>Bus Tracking</span></h3>
              <h6>Real-time tracking to optimize routes, minimize waiting times, and improve the travel experience for passengers.</h6>
            </div>
            <div class="rd-detail mt-5">
              <div class="rd-left me-5">
                <h3>24/7</h3>
                <p>Real-Time Tracking Availability</p>
              </div>
              <div class="rd-right">
                <h3>98%</h3>
                <p>Accuracy in Location Updates</p>
              </div>
            </div>
          </div>
        </div>
      </div>
  
  </section>
  <section class="reward-section" data-aos="fade-up">
    <div class="container">
      <div class="ellips right yellow"></div>
      <div class="row align-items-center flex-mob-col-rev">
        <div class="col-md-6 rd-bg" data-aos="fade-left">
          <div class="section-title reward-content">
            <h3>Benefits of Bus Tracking System</h3>
            <h6>Witness the advantages of real-time updates, improved scheduling, and enhanced passenger safety.</h6>
          </div>
          <div class="rd-detail mt-5">
            <div class="rd-left me-5">
              <h3>500+</h3>
              <p>Routes Optimized <br> for Efficiency</p>
            </div>
            <div class="rd-right">
              <h3>85%</h3>
              <p>Reduction in <br> Waiting Times</p>
            </div>
          </div>
        </div>
        <div class="col-md-6" data-aos="zoom-in-left">
          <div class="ellips-image-wrap text-center">
            <img src="assets/images/image 6 (2).png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src=" https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
  </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
  integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script src="assets/js/script.js"></script>
</body>

</html>
