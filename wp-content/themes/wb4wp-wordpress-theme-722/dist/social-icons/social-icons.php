<?php
  use Wb4WpTheme\Managers\Customize\CustomizeSettings;

  // Defaults
  $template_args = [
    'show_name' => false,
    'wrapper_class' => 'wb4wp-social'
  ];

  if(!empty($args)) {
    $template_args = array_merge( $template_args, $args );
  }

  $social_accounts = [
    'facebook' => [
      'name'=> 'Facebook',
      'setting_name' => 'wb4wp_social_accounts_section_facebook_setting',
      'icon_class_name' => 'fa-facebook-official',
    ],
    'twitter' => [
      'name'=> 'Twitter',
      'setting_name' => 'wb4wp_social_accounts_section_twitter_setting',
      'icon_class_name' => 'fa-twitter',
    ],
    'instagram' => [
      'name'=> 'Instagram',
      'setting_name' => 'wb4wp_social_accounts_section_instagram_setting',
      'icon_class_name' => 'fa-instagram',
    ],
    'linkedin' => [
      'name'=> 'LinkedIn',
      'setting_name' => 'wb4wp_social_accounts_section_linkedin_setting',
      'icon_class_name' => 'fa-linkedin-square',
    ],
    'pinterest' => [
      'name'=> 'Pinterest',
      'setting_name' => 'wb4wp_social_accounts_section_pinterest_setting',
      'icon_class_name' => 'fa-pinterest',
    ],
    'youtube' => [
      'name'=> 'Youtube',
      'setting_name' => 'wb4wp_social_accounts_section_youtube_setting',
      'icon_class_name' => 'fa-youtube-play',
    ],
    'opentable' => [
      'name'=> 'Open Table',
      'setting_name' => 'wb4wp_social_accounts_section_opentable_setting',
      'icon_class_name' => 'fa-opentable',
    ],
  ];
?>

<div class="<?= $template_args['wrapper_class']?>">
  <?php 
    foreach ($social_accounts as $account => $account_props):
    $account_url = CustomizeSettings::get_setting($account_props['setting_name']);
      
    if( !empty($account_url) ):
  ?>
    <a
      href="<?= $account_url ?>"
      class="wb4wp-social-link"
      aria-label="Go to our <?= $account_props['name'] ?> page"
    >
      <i class="wb4wp-social-icon fa <?= $account_props['icon_class_name'] ?>">
        <?php if($account == 'opentable'):?>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 535 512" fill="currentColor"><circle cx="48.6" cy="256" r="48.6"/><path d="M340 61a195 195 0 100 390 195 195 0 000-390zm0 244a49 49 0 1149-49 49 49 0 01-49 49z"/></svg>
        <?php endif; ?>
      </i>
      <?php if( $template_args['show_name'] ): ?>
        <span><?= $account_props['name'] ?></span>
      <?php endif; ?>
    </a>
  <?php 
    endif;
    endforeach; 
  ?>
</div>