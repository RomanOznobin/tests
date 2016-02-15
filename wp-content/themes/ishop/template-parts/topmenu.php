<div class="sticky">
  <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
  

  <section class="top-bar-section">
    <!-- Right Nav Section -->
 <!-- Right Nav Section -->
    <ul class="right">
      <?php if (class_exists('woocommerce')) {ishop_wooaccinfo(); } ?>
        
    </ul>
         <!-- Left Nav Section -->
    <ul class="left">
     <?php ishop_display_primary_menu();  ?>
    </ul>
    
  </section>
</nav>
</div>