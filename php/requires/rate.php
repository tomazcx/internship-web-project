<div class="row mt-3">
    <p class="col text-center d-flex align-items-center justify-content-center">Avaliação  
        <?php
      echo $rating_id;
      ?></p>
    <p class="col text-center d-flex align-items-center justify-content-center"> 
        <?php
    echo $rating['register_date'];
    ?></p>
    <p class="col text-center d-flex align-items-center justify-content-center">
        <?php
    echo $rating['final_grade'];
    ?></p>
    <p class="col text-center d-flex align-items-center justify-content-center text-primary">
        <?php
        echo $adm;
        ?></p>
    <a class="col text-decoration-none bg-primary rounded text-light px-4 py-2 text-center" href="RatingView.php?id_rating=
      <?php
      echo $rating['id_rating'];
      ?>">Visualizar</a>
</div>