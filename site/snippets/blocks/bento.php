<?php if ($block->images()->isNotEmpty()): ?>
  <div class="bento-grid">
    <?php 
    $images = $block->images()->toFiles();
    $count = 0;
    $imagesPerRow = 3;
    
    foreach ($images as $image): 
      $rowClass = floor($count / $imagesPerRow);
    ?>
      
      <?php if ($count % $imagesPerRow === 0): ?>
        <div class="bento-row bento-row-<?= $rowClass ?>"> <!-- Classe unique pour chaque ligne -->
      <?php endif; ?>
      
      <div class="bento-item">
        <img src="<?= $image->url() ?>" alt="<?= $image->alt()->esc() ?>" class="image-hover">
      </div>
      
      <?php 
      $count++;
      if ($count % $imagesPerRow === 0 || $count === $images->count()): ?>
        </div> <!-- Fermeture de la ligne -->
      <?php endif; ?>
      
    <?php endforeach; ?>
  </div>
<?php endif; ?>
