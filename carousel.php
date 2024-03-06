<?php
include "./partials/header.php";
?>

<div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php
            $images = ['./assets/images/italie/rome/rome1.jpg', './assets/images/italie/rome/rome2.jpg', './assets/images/italie/rome/rome3.jpg', './assets/images/italie/rome/rome4.jpg'];
            foreach ($images as $key => $image) {
                $active = ($key === 0) ? 'active' : '';
                echo '<li data-target="#carouselExampleCaptions" data-slide-to="' . $key . '" class="' . $active . '"></li>';
            }
            ?>
          </ol>
          <div class="carousel-inner">
            <?php
            foreach ($images as $key => $image) {
                $active = ($key === 0) ? 'active' : '';
                echo '<div class="container"';
                echo '<div class="carousel-item ' . $active . '">';
                echo '<img src="' . $image . '" class="d-block w-100" alt="...">';
                echo '<div class="carousel-caption d-none d-md-block">';
                echo '<h5>Slide ' . ($key + 1) . ' label</h5>';
                echo '<a href="" class="btn btn-danger" type=""> En savoir plus</a>';
                echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

<?php 
include "./partials/footer.php";