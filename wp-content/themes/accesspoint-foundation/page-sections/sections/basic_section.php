<?php 
  $title = get_sub_field('title');
  $content = get_sub_field('content');
?>

<section class="basic-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="basic-section__inner">
          <?php echo $content ?>
        </div>
      </div>
    </div>
  </div>
</section>