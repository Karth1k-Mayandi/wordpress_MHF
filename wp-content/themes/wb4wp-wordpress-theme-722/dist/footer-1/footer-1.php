<?php

use Wb4WpTheme\Managers\Customize\CustomizeSettings;
use Wb4WpTheme\Managers\WordpressManager;

?>
<footer class="footer-1 wb4wp-footer">
    <div class="wb4wp-container kv-main-container">
        <div class="wb4wp-footer-section wb4wp-footer-header">
            <?php get_template_part( 'dist/brand/brand', '', ['section' => 'footer'] ); ?>

            <nav class="wb4wp-footer-nav">
                <?php
                if ( CustomizeSettings::get_setting( 'wb4wp_footer_section_page_menu_setting' ) ) {
                    wp_nav_menu( [
                        'theme_location' => 'wb4wp',
                        'container' => false,
                        'menu_class' => 'wb4wp-footer-menu-items',
                        'depth' => 2
                    ] );
                }
                ?>

                <?php
                if ( CustomizeSettings::get_setting( 'wb4wp_footer_section_social_buttons_setting' ) ) {
                    get_template_part( 'dist/social-icons/social-icons' );
                }
                ?>
            </nav>
        </div>

        <?php
        $show_address = CustomizeSettings::get_setting( 'wb4wp_footer_section_address_toggle_setting' );

        $has_address =
            !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_street_setting' ) ) ||
            !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_zip_code_setting' ) ) ||
            !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_city_setting' ) ) ||
            !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_state_setting' ) ) ||
            !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_country_setting' ) );

        $has_contact =
            !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_phone_number_setting' ) ) ||
            !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_email_setting' ) );

        $show_description = CustomizeSettings::get_setting( 'wb4wp_footer_section_description_toggle_setting' );
        $description = CustomizeSettings::get_setting( 'wb4wp_footer_section_description_setting' );

        if ( $has_address || $has_contact || !empty( CustomizeSettings::get_setting( 'wb4wp_footer_section_description_setting' ) ) ):
            ?>
            <?php if ( ( $show_address && $has_address ) || ( $show_description && ( !empty( $description ) || $description !== 'Add a description here.' ) ) ): ?>
            <div class="wb4wp-footer-section wb4wp-footer-body">
                <?php if ( $show_address && $has_address ): ?>
                    <div class="wb4wp-info-block">
                        <h3 class="wb4wp-title">
                            Address
                        </h3>
                        <address>
                            <p class="wb4wp-copy">
                                <?= !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_street_setting' ) ) ? CustomizeSettings::get_setting( 'wb4wp_contact_information_section_street_setting' ) : '' ?>
                                , <br>
                                <?= !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_state_setting' ) ) ? CustomizeSettings::get_setting( 'wb4wp_contact_information_section_state_setting' ) : '' ?>
                                <?= !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_zip_code_setting' ) ) ? CustomizeSettings::get_setting( 'wb4wp_contact_information_section_zip_code_setting' ) : '' ?>
                                <br>
                                <?= !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_city_setting' ) ) ? CustomizeSettings::get_setting( 'wb4wp_contact_information_section_city_setting' ) : '' ?>
                                <?= !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_country_setting' ) ) ? CustomizeSettings::get_setting( 'wb4wp_contact_information_section_country_setting' ) : '' ?>
                            </p>
                        </address>

                        <?php if ( !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_phone_number_setting' ) ) ): ?>
                            <a class="wb4wp-copy"
                               href="tel:<?= CustomizeSettings::get_setting( 'wb4wp_contact_information_section_phone_number_setting' ) ?>"><?= CustomizeSettings::get_setting( 'wb4wp_contact_information_section_phone_number_setting' ) ?></a>
                        <?php endif; ?>
                        <?php if ( !empty( CustomizeSettings::get_setting( 'wb4wp_contact_information_section_email_setting' ) ) ): ?>
                            <a class="wb4wp-copy"
                               href="mailto:<?= CustomizeSettings::get_setting( 'wb4wp_contact_information_section_email_setting' ) ?>"><?= CustomizeSettings::get_setting( 'wb4wp_contact_information_section_email_setting' ) ?></a>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>
                <?php if ( $show_description && !empty( $description ) && $description !== 'Add a description here.' ): ?>
                    <div class="wb4wp-info-block">
                        <h3 class="wb4wp-title">
                            About us
                        </h3>
                        <p class="wb4wp-copy">
                            <?= $description ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php endif; ?>

        <div class="wb4wp-footer-section wb4wp-colophon">
            <?php if ( CustomizeSettings::get_setting( 'wb4wp_footer_section_copyright_message_setting' ) ): ?>
                <p class="wb4wp-copyright wb4wp-copy">
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
</footer>