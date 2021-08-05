<?php
  use Wb4WpTheme\Managers\Customize\CustomizeSettings;
?>

<?php if (!empty(CustomizeSettings::get_setting('wb4wp_contact_information_section_phone_number_setting'))): ?>
  <a href="tel:<?= CustomizeSettings::get_setting('wb4wp_contact_information_section_phone_number_setting') ?>" class="wb4wp-navbar-button wb4wp-call-button" aria-label="Call Company">Call</a>
<?php endif; ?>