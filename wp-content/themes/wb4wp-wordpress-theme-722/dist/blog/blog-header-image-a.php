<?php
  use Wb4WpTheme\Managers\Customize\CustomizeSettings;

  $blog_template_part_path = 'dist/blog/blog';
?>

<?php $show_cover_image = CustomizeSettings::get_setting('wb4wp_single_post_section_show_cover_image_setting') ?>
<?php $show_title_in_cover = CustomizeSettings::get_setting('wb4wp_single_post_section_place_title_in_cover_setting') ?>
<?php $show_pub_date = CustomizeSettings::get_setting('wb4wp_single_post_section_show_publication_date_setting') ?>
<?php $show_tags = CustomizeSettings::get_setting('wb4wp_single_post_section_show_tags_setting') ?>

<?php $has_tags = $show_tags ? 'has-tags' : '' ?>
<?php $has_cover_image = $show_cover_image ? 'has-cover' : 'has-no-cover' ?>

<header class="wb4wp-blog-container entry-header wp4wp-header-image-layout-2 wp4wp-header-image <?php echo $has_tags; ?>">

  <?php if($show_pub_date): ?>
    <p class="wb4wp-author-post-date">
      <?= get_the_date('j M, Y',$post) ?>
    </p>
  <?php endif ?>

  <?php if (!$show_title_in_cover): ?>
    <h1 class="wp4wp-page-title page-title entry-title has-huge-font-size">
      <?php single_post_title(); ?>
    </h1>

    <?php if($show_tags) : ?>
      <?php get_template_part($blog_template_part_path, 'tags'); ?>
    <?php endif ?>

    <?php if ($show_cover_image): ?>
      <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
      <img src="<?php echo $url ?>" />
    <?php endif ?>

    <?php else: ?>
      <?php if($show_tags) : ?>
        <?php get_template_part($blog_template_part_path, 'tags'); ?>
      <?php endif ?>

      <div class="wbwp4-cover <?php echo $has_cover_image; ?>">
        <h1 class="wp4wp-page-title page-title entry-title has-huge-font-size">
          <?php single_post_title(); ?>
        </h1>

      <?php if ($show_cover_image): ?>
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
        <img src="<?php echo $url ?>" />
      <?php endif ?>
    </div>
  <?php endif ?>

</header>
