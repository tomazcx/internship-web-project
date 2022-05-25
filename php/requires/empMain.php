<div class="row mt-3">
    <div class="col d-flex flex-column align-items-center">
        <a class="text-decoration-none text-dark" href="EmpProfile.php?idEmp=
      <?php
        echo $employee['id_emp'];
        ?>">
            <img src="img/icon2.png" alt="" class="iconMain">
            <p><?php
                echo $complete_name;
                ?></p>
        </a>

    </div>

    <p class="col text-center d-flex align-items-center justify-content-center">
        <?php
        echo $employee['last_rating'];
        ?></p>
    <p class="col text-center d-flex align-items-center justify-content-center">
        <?php
        if ($date_diff < 0) {
            echo '0 dias';
        } else {
            echo $date_diff . ' dias';
        }
        ?></p>
    <div class="col d-flex align-items-center justify-content-center">
        <a class="text-center bg-primary text-decoration-none text-light px-3 py-1 rounded" href="Rating.php?id_emp=
        <?php
        echo $employee['id_emp'];
        ?>">Cadastrar Avaliação</a>
    </div>
</div>