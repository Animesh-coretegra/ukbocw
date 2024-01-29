<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
  <ul class="pagination">
    <?php if ($pager->hasPreviousPage()) : ?>
      <li class="prev page-numbers">
        <a href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
          <span><i class="flaticon-left-chevron"></i></span>
        </a>
      </li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link) : ?>
      <li <?= $link['active'] ? 'class="current page-numbers"' : 'class="page-numbers"' ?>>
        <a href="<?= $link['uri'] ?>">
          <?= $link['title'] ?>
        </a>
      </li>
    <?php endforeach ?>

    <?php if ($pager->hasNextPage()) : ?>
      <li class="next page-numbers">
        <a href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
          <span><i class="flaticon-chevron"></i></span>
        </a>
      </li>
    <?php endif ?>
  </ul>
</nav>