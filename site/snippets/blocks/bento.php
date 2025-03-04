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

<!-- Modal -->
<div id="imageModal" class="modal">
  <span class="close-btn" id="closeModal">&times;</span>
  <img class="modal-content" id="modalImage">
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
  const bentoItems = document.querySelectorAll('.bento-item');
  const modal = document.getElementById('imageModal');
  const modalImage = document.getElementById('modalImage');
  const closeModal = document.getElementById('closeModal');

  // Survol de l'image
  bentoItems.forEach(item => {
    const image = item.querySelector('img');
    
    item.addEventListener('mouseenter', function () {
      image.classList.add('enlarged');
    });
    
    item.addEventListener('mouseleave', function () {
      image.classList.remove('enlarged');
    });
    
    // Clic sur l'image pour l'ouvrir en grand
    item.addEventListener('click', function () {
      modal.style.display = "flex"; // Affiche le modal
      modalImage.src = image.src; // Associe l'image du modal à celle cliquée
    });
  });

  // Fermer le modal lorsque l'on clique sur la croix
  closeModal.addEventListener('click', function () {
    modal.style.display = "none"; // Cacher le modal
  });

  // Fermer le modal lorsque l'on clique en dehors de l'image
  window.addEventListener('click', function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
});

</script>