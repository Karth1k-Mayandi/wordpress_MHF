<?php
  use Wb4WpTheme\Managers\Customize\CustomizeSettings;
?>

<?php $show_tags = CustomizeSettings::get_setting('wb4wp_single_post_section_show_tags_setting') ?>

<?php if($show_tags): ?>
  <?php $tags = get_tags(); ?>

  <div class="tags">
    <?php foreach ( $tags as $tag ) { ?>
      <a href="<?php echo get_tag_link( $tag->term_id ); ?> " rel="tag"><?php echo $tag->name; ?></a>
    <?php } ?>
  </div>
<?php endif ?>