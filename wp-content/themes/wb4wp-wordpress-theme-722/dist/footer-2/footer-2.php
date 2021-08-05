<?php

use Wb4WpTheme\Managers\Customize\CustomizeSettings;
use Wb4WpTheme\Managers\WordpressManager;

?>
<footer class="footer-2 wb4wp-footer">
    <div class="wb4wp-container-fluid wb4wp-footer-container">
        <div class="wb4wp-footer-body">
            <div class="wb4wp-content">
                <div class="wb4wp-footer-header">

                    <?php get_template_part( 'dist/brand/brand', '', ['section' => 'footer'] ); ?>

                    <?php if ( CustomizeSettings::get_setting( 'wb4wp_footer_section_page_menu_setting' ) ): ?>
                        <nav class="wb4wp-footer-nav">
                            <?php
                            wp_nav_menu( [
                                'theme_location' => 'wb4wp',
                                'container' => false,
                                'menu_class' => 'wb4wp-footer-menu-items',
                                'depth' => 2
                            ] );
                            ?>
                        </nav>
                    <?php endif; ?>
                </div>

                <?php if ( CustomizeSettings::get_setting( 'wb4wp_footer_section_social_buttons_setting' ) ): ?>
                    <div class="wb4wp-footer-social">
                        <h3 class="wb4wp-title">
                            Follow us
                        </h3>
                        <?php get_template_part( 'dist/social-icons/social-icons' ); ?>
                    </div>
                <?php endif; ?>

                <div class="wb4wp-colophon">
                    <?php if ( CustomizeSettings::get_setting( 'wb4wp_footer_section_copyright_message_setting' ) ): ?>
                        <p class="wb4wp-copyright">
                            &copy; <?= date( "Y" ) ?> <?php bloginfo( 'name' ); ?>
                        </p>
                    <?php endif; ?>
                    <?php if ( WordpressManager::has_sitemap() && CustomizeSettings::get_setting( 'wb4wp_footer_section_link_to_sitemap_setting' ) ): ?>
                        <nav class="wb4wp-footer-nav">
                            <ul class="wb4wp-footer-menu-items">
                                <li class="menu-item">
                                    <a href="<?= WordpressManager::get_sitemap_url() ?>">sitemap</a>
                                </li>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="wb4wp-footer-section-empty"></div>
    </div>
</footer>