@extends('welcome')
@section('title','about us')
@section('content')
{{-- resources/views/vr.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>

  {{-- Google Fonts --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  {{-- Font Awesome --}}
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    /* Hero Section */
    .hero {
      position: relative;
      width: 100%;
      height: 350px;
      overflow: hidden;
    }

    .hero img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: brightness(80%);
    }

    .hero-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: white;
    }

    .hero-text h1 {
      font-size: 2rem;
      font-weight: 700;
      letter-spacing: 2px;
    }

    /* About Section */
    .about-text {
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .about-text h2 {
      font-size: 1.5rem;
      color: #333;
      margin-bottom: 15px;
    }

    .about-text p {
      font-size: 0.95rem;
      color: #555;
      line-height: 1.7;
    }

    /* How It Works */
  .how-it-works {
    background: #fff8f1;
    text-align: center;
    padding: 70px 20px;
  }

  .how-it-works h2 {
    font-size: 1.6rem;
    font-weight: 700;
    color: #000;
    margin-bottom: 40px;
    letter-spacing: 1px;
  }

  .steps {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 50px;
  }

  .step {
    text-align: center;
    width: 160px;
  }

  .icon-circle {
    background-color: #ff9900;
    border-radius: 50%;
    width: 120px;
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  }

  .icon-circle img {
    width: 55px;
    height: 55px;
    object-fit: contain;
    filter: brightness(0) invert(1); /* ensures white icons */
  }

  .step p {
    font-size: 1rem;
    font-weight: 500;
    color: #333;
  }

  @media (max-width: 768px) {
    .steps {
      flex-direction: column;
      gap: 30px;
    }
  }
    /* What Sets Us Apart */
.what-sets-us-apart {
  text-align: center;
  font-family: 'Inter', sans-serif;
  padding: 80px 20px;
  background-color: #ffffff;
}

.what-sets-us-apart h2 {
  font-size: 22px;
  font-weight: 700;
  color: #000;
  margin-bottom: 60px;
  letter-spacing: 0.5px;
}

.wrapper {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  gap: 60px;
  flex-wrap: wrap;
  position: relative;
}

.column {
  background-color: #f8f8f8;
  padding: 40px 50px;
  border-radius: 12px;
  box-shadow: 0 0 0 rgba(0, 0, 0, 0);
  width: 320px;
}

.column h3 {
  font-size: 16px;
  font-weight: 700;
  color: #ff9a00;
  margin-bottom: 25px;
  text-transform: uppercase;
}

.box {
  background-color: #fff;
  border-radius: 6px;
  padding: 14px 10px;
  font-size: 14px;
  font-weight: 500;
  color: #000;
  margin-bottom: 14px;
  box-shadow: 0 0 0 rgba(0, 0, 0, 0);
  border: 1px solid transparent;
}

.box.blue-border {
  border: 2px solid #007bff;
}

.cta {
  display: inline-block;
  margin-top: 25px;
  background-color: #ff9a00;
  color: #fff;
  border: none;
  padding: 12px 26px;
  border-radius: 6px;
  font-weight: 700;
  font-size: 13px;
  cursor: pointer;
  letter-spacing: 0.5px;
  transition: background-color 0.3s ease;
}

.cta:hover {
  background-color: #e68a00;
}

.divider {
  width: 1px;
  height: 250px;
  background-image: linear-gradient(to bottom, #007bff 50%, rgba(0,0,0,0) 0%);
  background-position: right;
  background-size: 1px 10px;
  background-repeat: repeat-y;
}

@media (max-width: 768px) {
  .wrapper {
    flex-direction: column;
    gap: 40px;
  }

  .divider {
    display: none;
  }
}
  </style>
</head>

<body>

  {{-- Hero Section --}}
  <section class="hero">
    <img src="{{ asset('ev_photos/about banner.jpg') }}" alt="Banner">
    <div class="hero-text">
      <h1>ABOUT US</h1>
    </div>
  </section>

  {{-- About Text --}}
  <section class="about-text">
    <h2>Lorem Ipsum</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, sunt aperiam. Porro, consequatur perferendis. Quo, a earum similique, officia, tempora nemo minima non rerum itaque numquam culpa deleniti! Obcaecati, omnis molestias fugit sed similique voluptates consequatur voluptatem officiis? Totam, optio nesciunt! Dolore ut pariatur modi deleniti consequatur non quas reprehenderit unde aliquid quis hic numquam sunt autem maxime esse veniam saepe, necessitatibus consequuntur vel neque ab dolores. Deleniti fugiat, suscipit alias maxime ratione obcaecati, recusandae ullam doloribus qui sequi, dolores similique nesciunt architecto voluptate. Ipsa voluptatem aperiam at rerum quam eveniet maiores tempora neque non doloribus iste quidem aliquid, est aliquam quasi exercitationem inventore autem, ratione expedita similique mollitia placeat adipisci ex doloremque. Temporibus pariatur reiciendis voluptates enim aliquam neque consequatur ut fugit, iste illum commodi quibusdam distinctio? Consequatur tempore temporibus nulla! Vero, architecto veniam quae minus illum id inventore cumque aspernatur suscipit quod ab quibusdam itaque explicabo! Voluptate, odio nesciunt repellat autem quod harum ullam recusandae dolores eum ad enim totam atque amet hic esse deleniti ratione ipsa mollitia vero soluta laudantium sit. Voluptatem sunt cupiditate delectus eveniet corrupti. Provident molestias esse impedit quos omnis culpa a dolores, fugit sed officia eligendi, nisi ratione quo voluptates quibusdam beatae quaerat.</p>
  </section>

  {{-- How It Works --}}
  <section class="how-it-works">
  <h2>HOW IT WORKS</h2>
  <div class="steps">
    <div class="step">
      <div class="icon-wrapper">
        <img src="{{ asset('ev_photos/about1.jpg') }}" alt="Discover Venues">
      </div>
      <p>Discover Venues</p>
    </div>

    <div class="step">
      <div class="icon-wrapper">
        <img src="{{ asset('ev_photos/about2.jpg') }}" alt="Visit Venues">
      </div>
      <p>Visit Venues</p>
    </div>

    <div class="step">
      <div class="icon-wrapper">
        <img src="{{ asset('ev_photos/about3.jpg') }}" alt="Book Venue">
      </div>
      <p>Book Venue</p>
    </div>

    <div class="step">
      <div class="icon-wrapper">
        <img src="{{ asset('ev_photos/about4.jpg') }}" alt="Book Vendors">
      </div>
      <p>Book Vendors</p>
    </div>
  </div>
</section>


  {{-- What Sets Us Apart --}}
  <section class="what-sets-us-apart">
  <h2 style="text-align: center; padding-top: 30px;">WHAT SETS US APART</h2>
  <div class="wrapper">
    <!-- Left Column -->
    <div class="column">
      <h3>FOR COUPLES</h3>
      <div class="box">PERSONALIZED WEDDING</div>
      <div class="box">SMART VENDOR MATCHING</div>
      <div class="box">TRUSTED SERVICES</div>
      <button class="cta orange">START PLANNING</button>
    </div>

    <!-- Divider -->
    <!-- <div class="divider"></div> -->

    <!-- Right Column -->
    <div class="column">
      <h3>FOR VENDOR PARTNERS</h3>
      <div class="box">YEAR-ROUND LEADS</div>
      <div class="box">SMART CRM TOOLS</div>
      <div class="box">FOCUS ON CREATIVITY</div>
      <button class="cta orange">REGISTER AS VENDOR</button>
    </div>
  </div>
</section>

</body>
</html>

@endsection
