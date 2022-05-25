<div class="row mt-3">
    <div class="col d-flex flex-column align-items-center">
        <a href="EmpProfile.php?idEmp=
      <?php
        echo $employee['id_emp'];
        ?>" Z class="text-decoration-none text-dark">
            <img src="img/icon2.png" alt="" class="iconMain">
            <p>
                <?php
                echo $complete_name;
                ?></p>
        </a>

    </div>

    <p class="col text-center d-flex align-items-center justify-content-center">
        <?php
        echo $employee['occupation'];
        ?></p>
    <p class="col text-center d-flex align-items-center justify-content-center">
        <?php
        echo $employee['sector'];
        ?></p>
    <p class="col text-center d-flex align-items-center justify-content-center">
        <?php
        echo $employee['feedback_num'];
        ?></p>
    <p class="col text-center d-flex align-items-center justify-content-center">
        <?php
        echo $employee['grade'];
        ?></p>
</div>