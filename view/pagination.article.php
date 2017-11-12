<nav aria-label="Page navigation" class="pagination_site">
  <ul class="pagination justify-content-center">
    <?php
      if($current != 1) { ?>

        <li class="page-item visible">
          <a class="page-link" href="?pg=<?= $current - 1; ?>" tabindex="-1">Précédent</a>
        </li>

      <?php } else { ?>
        <li class="page-item disabled invisible">
          <a class="page-link" href="#" tabindex="-1">Précédent</a>
        </li>
      <?php }
     ?>

    <?php
      for($i=1; $i<=$nbPage; $i++) {
        if($i == $current){ ?>
          <li class="page-item active"><a class="page-link" href="?pg=<?= $i; ?>"><?= $i; ?></a></li>
      <?php  } else { ?>
        <li class="page-item"><a class="page-link" href="?pg=<?= $i; ?>"><?= $i; ?></a></li>
    <?php }
      }
    ?>

    <?php
      if($current >= $nbPage) { ?>

        <li class="page-item disabled invisible">
          <a class="page-link" href="#" tabindex="-1">Suivant</a>
        </li>

      <?php } else { ?>
        <li class="page-item visible">
          <a class="page-link" href="?pg=<?= $current + 1; ?>" tabindex="-1">Suivant</a>
        </li>
      <?php }
     ?>

  </ul>
</nav>
