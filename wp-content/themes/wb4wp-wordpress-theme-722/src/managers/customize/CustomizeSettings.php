<?php


namespace Wb4WpTheme\Managers\Customize;


use Wb4WpTheme\Helpers\FontHelper;
use Wb4WpTheme\Helpers\ObjectHelper;

final class CustomizeSettings
{

    private static $settings;

    private static function get_settings()
    {
        if ( empty( self::$settings ) ) {
            self::$settings = [
                'header' => [
                    'layout' => [
                        'label' => __( 'Layout', 'wb4wp_theme' ),
                        'description' => __( 'The layout to use', 'wb4wp_theme' ),
                        'type' => 'select',
                        'default' => 'navigation-1',
                        'choices' => [
                            'navigation-1' => 'Navigation 1',
                            'navigation-2' => 'Navigation 2',
                            'navigation-3' => 'Navigation 3',
                            'navigation-4' => 'Navigation 4',
                            'navigation-5' => 'Navigation 5'
                            // 'navigation-6' => 'Navigation 6',  disable this menu item
                        ],
                    ],
                    'social_buttons' => self::get_social_buttons_setting( 'true' ),
                    'site_title' => self::get_site_title_setting( 'true' ),
                    'fixed_navigation_bar' => [
                        'label' => __( 'Fixed navigation bar', 'wb4wp_theme' ),
                        'description' => __( 'Keep navigation bar fixed to the top of the screen when scrolling', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true',
                    ],
                ],
                'footer' => [
                    'layout' => [
                        'label' => __( 'Layout', 'wb4wp_theme' ),
                        'description' => __( 'The layout to use', 'wb4wp_theme' ),
                        'type' => 'select',
                        'default' => 'footer-1',
                        'choices' => [
                            'footer-1' => 'Footer 1',
                            'footer-2' => 'Footer 2',
                            'footer-3' => 'Footer 3',
                            'footer-4' => 'Footer 4',
                            'footer-5' => 'Footer 5',
                        ]
                    ],
                    'social_buttons' => self::get_social_buttons_setting( 'true' ),
                    'site_title' => self::get_site_title_setting( 'true' ),
                    'description' => [
                        'label' => __( 'Site description', 'wb4wp_theme' ),
                        'description' => __( 'add a site description here', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => 'Add a description here'
                    ],
                    'description_toggle' => [
                        'label' => __( 'Description', 'wb4wp_theme' ),
                        'description' => __( 'Show your site description', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true',
                    ],
                    'address_toggle' => [
                        'label' => __( 'Address', 'wb4wp_theme' ),
                        'description' => __( 'Show your address of your company', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true'
                    ],
                    'copyright_message' => [
                        'label' => __( 'Copyright message', 'wb4wp_theme' ),
                        'description' => __( 'Display the copyright message', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'false'
                    ],
                    'link_to_sitemap' => [
                        'label' => __( 'Sitemap', 'wb4wp_theme' ),
                        'description' => __( 'Display the link to the sitemap', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true'
                    ],
                    'page_menu' => [
                        'label' => __( 'Page menu', 'wb4wp_theme' ),
                        'description' => __( 'Display the page menu', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true'
                    ],
                ],
                'social_accounts' => [
                    'facebook' => [
                        'label' => __( 'Facebook', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => ''
                    ],
                    'twitter' => [
                        'label' => __( 'Twitter', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => ''
                    ],
                    'instagram' => [
                        'label' => __( 'Instagram', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => ''
                    ],
                    'linkedin' => [
                        'label' => __( 'LinkedIn', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => ''
                    ],
                    'pinterest' => [
                        'label' => __( 'Pinterest', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => ''
                    ],
                    'youtube' => [
                        'label' => __( 'YouTube', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => ''
                    ],
                    'opentable' => [
                        'label' => __( 'OpenTable', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => ''
                    ],
                ],
                'contact_information' => [
                    'phone_number' => [
                        'label' => __( 'Phone number', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => '0123456789'
                    ],
                    'email' => [
                        'label' => __( 'Email address', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => 'info@example.com'
                    ],
                    'street' => [
                        'label' => __( 'Address', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => '10 Corporate Drive'
                    ],
                    'city' => [
                        'label' => __( 'City', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => 'Burlington'
                    ],
                    'zip_code' => [
                        'label' => __( 'Zipcode', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => '01803'
                    ],
                    'state' => [
                        'label' => __( 'State', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => 'MA'
                    ],
                    'country' => [
                        'label' => __( 'Country', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => 'United States'
                    ],
                ],
                'color' => [
                    'accent1' => [
                        'label' => __( 'Accent 1', 'wb4wp_theme' ),
                        'description' => __( 'The primary color', 'wb4wp_theme' ),
                        'type' => 'color',
                        'default' => '#4f8a8b'
                    ],
                    'accent2' => [
                        'label' => __( 'Accent 2', 'wb4wp_theme' ),
                        'description' => __( 'An accent color', 'wb4wp_theme' ),
                        'type' => 'color',
                        'default' => '#fbd46d'
                    ],
                    'background' => [
                        'label' => __( 'Background', 'wb4wp_theme' ),
                        'description' => __( 'A background color', 'wb4wp_theme' ),
                        'type' => 'color',
                        'default' => '#eeeeee'
                    ],
                    'text' => [
                        'label' => __( 'Text', 'wb4wp_theme' ),
                        'description' => __( 'The text color', 'wb4wp_theme' ),
                        'type' => 'color',
                        'default' => '#222831'
                    ],
                ],
                'fonts' => [
                    'heading' => array_merge_recursive(
                        self::parse_font_settings( FontHelper::instance()->get_heading_fonts() ),
                        [
                            'label' => __( 'Title font', 'wb4wp_theme' ),
                            'description' => __( 'The title font used in the header and footer', 'wb4wp_theme' ),
                        ]
                    ),
                    'body' => array_merge_recursive(
                        self::parse_font_settings( FontHelper::instance()->get_body_fonts() ),
                        [
                            'label' => __( 'Paragraph font', 'wb4wp_theme' ),
                            'description' => __( 'The paragraph google font used in the header and footer', 'wb4wp_theme' ),
                        ]
                    ),
                    'font_size' => [
                        'label' => __( 'Font size', 'wb4wp_theme' ),
                        'description' => __( 'Set the font size for your website', 'wb4wp_theme' ),
                        'type' => 'select',
                        'default' => '1',
                        'choices' => [
                            '0.875' => 'Small',
                            '1' => 'Medium',
                            '1.125' => 'Large'
                        ]
                    ]
                ],
                'logo' => [
                    'url' => [
                        'label' => __( 'Logo URL', 'wb4wp_theme' ),
                        'description' => __( 'Enter the URL to your logo here', 'wb4wp_theme' ),
                        'type' => 'text',
                        'default' => ''
                    ],
                    'size' => [
                        'label' => __( 'Logo size', 'wb4wp_theme' ),
                        'description' => __( 'Adjust the logo size', 'wb4wp_theme' ),
                        'type' => 'select',
                        'default' => 'medium',
                        'choices' => [
                            'small' => 'Small',
                            'medium' => 'Medium',
                            'large' => 'Large',
                            'extra-large' => 'Extra Large'
                        ]
                    ],
                    'show_in_header' => [
                        'label' => __( 'Show in the header', 'wb4wp_theme' ),
                        'description' => __( 'Has no effect when the logo URL has not been configured', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'false'
                    ],
                    'show_in_footer' => [
                        'label' => __( 'Show in the footer', 'wb4wp_theme' ),
                        'description' => __( 'Has no effect when the logo URL has not been configured', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'false'
                    ]
                ],
                'single_post' => [
                    'layout' => [
                        'label' => __( 'Layout style', 'wb4wp_theme' ),
                        'type' => 'select',
                        'default' => 'single-post-1',
                        'choices' => [
                            'single-post-1' => 'Single Post 1',
                            'single-post-2' => 'Single Post 2'
                        ]
                    ],
                    'show_cover_image' => [
                        'label' => __( 'Cover image', 'wb4wp_theme' ),
                        'description' => __( 'Use featured images as cover.', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true'
                    ],
                    'place_title_in_cover' => [
                        'label' => __( 'Place title in cover', 'wb4wp_theme' ),
                        'description' => __( 'Add blog post to the cover.', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true'
                    ],
                    'show_author' => [
                        'label' => __( 'Author', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true'
                    ],
                    'show_author_image' => [
                        'label' => __( 'Author image', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'false'
                    ],
                    'show_publication_date' => [
                        'label' => __( 'Publication date', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true'
                    ],
                    'show_social_sharing' => [
                        'label' => __( 'Social sharing', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true'
                    ],
                    'show_tags' => [
                        'label' => __( 'Tags', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'false'
                    ],
                ],
                'blog_overview' => [
                    'layout' => [
                        'label' => __( 'Layout', 'wb4wp_theme' ),
                        'type' => 'select',
                        'default' => 'blog-overview-1',
                        'choices' => [
                            'blog-overview-1' => 'Blog Overview 1',
                            'blog-overview-2' => 'Blog Overview 2',
                            'blog-overview-3' => 'Blog Overview 3',
                        ]
                    ],
                    'show_title' => [
                        'label' => __( 'Title', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true'
                    ],
                    'show_featured_image' => [
                        'label' => __( 'Featured image', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true'
                    ],
                    'show_author' => [
                        'label' => __( 'Author', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'false'
                    ],
                    'show_author_image' => [
                        'label' => __( 'Author image', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'false'
                    ],
                    'show_publication_date' => [
                        'label' => __( 'Publication date', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'false'
                    ],
                ],
                'woocommerce_shop' => [
                    'show_sorting_filter_toggle' => [
                        'label' => __( 'Sorting filter', 'wb4wp_theme' ),
                        'description' => __( 'Show sorting filter for filtering products', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true',
                    ],
                ],
                'woocommerce_single_product' => [
                    'show_breadcrumbs_toggle' => [
                        'label' => __( 'Breadcrumbs', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true',
                    ],
                    'show_meta_data_toggle' => [
                        'label' => __( 'Meta', 'wb4wp_theme' ),
                        'description' => __( 'Show meta data, like tags and categories', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true',
                    ],
                    'show_description_tab_toggle' => [
                        'label' => __( 'Description tab', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true',
                    ],
                    'show_additional_information_tab_toggle' => [
                        'label' => __( 'Additional info tab', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true',
                    ],
                    'show_reviews_tab_toggle' => [
                        'label' => __( 'Reviews tab', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true',
                    ],
                    
                ],
                'woocommerce_shopping_cart' => [
                    'show_product_image_toggle' => [
                        'label' => __( 'Product images', 'wb4wp_theme' ),
                        'description' => __( 'Show product images in the cart table', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true',
                    ],
                    'show_coupon_field_toggle' => [
                        'label' => __( 'Coupon field', 'wb4wp_theme' ),
                        'description' => __( 'Show coupon field left under in the cart', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true',
                    ],
                ],
                'woocommerce_checkout' => [
                    'show_order_notes_toggle' => [
                        'label' => __( 'Order notes field', 'wb4wp_theme' ),
                        'description' => __( 'Show order notes field in the checkout', 'wb4wp_theme' ),
                        'type' => 'toggle',
                        'default' => 'true',
                    ],
                    // TODO: Add in next version
                    // 'show_coupon_code_message_toggle' => [
                    //     'label' => __( 'Show coupon code message', 'wb4wp_theme' ),
                    //     'description' => __( 'Is shown when an user is in the checkout', 'wb4wp_theme' ),
                    //     'type' => 'toggle',
                    //     'default' => 'true',
                    // ],
                ]
            ];
        }

        return self::$settings;
    }

    private static function parse_font_settings( $fonts )
    {
        if ( empty( $fonts ) ) {
            return [];
        }

        $font_settings = [];

        foreach ( $fonts as $font ) {
            $font_settings["{$font['name']}:{$font['weight']}"] = $font['name'];
        }

        $default = null;
        foreach ( $font_settings as $font_key => $font_name ) {
            $default = $font_key;
            break;
        }

        return [
            'type' => 'select',
            'default' => $default,
            'choices' => $font_settings,
        ];
    }

    private static function get_social_buttons_setting( $default )
    {
        $social_accounts_url = get_site_url(
            null,
            '/wp-admin/customize.php?autofocus[section]=wb4wp_social_accounts_section'
        );
        return [
            'label' => __( 'Social buttons', 'wb4wp_theme' ),
            'description' => sprintf(
                __( 'Set up your links in <a href="%s">Social Accounts</a>', 'wb4wp_theme' ),
                $social_accounts_url
            ),
            'type' => 'toggle',
            'default' => $default,
        ];
    }

    private static function get_site_title_setting( $default )
    {
        return [
            'label' => __( 'Site title', 'wb4wp_theme' ),
            'description' => __( 'Display the site title', 'wb4wp_theme' ),
            'type' => 'toggle',
            'default' => $default,
        ];
    }

    /**
     * Retrieve a list of all the settings for the given page type. If no page type, or an unknown page type is given,
     * a list of all settings is returned instead.
     *
     * @param string|null $page_type
     *
     * @return array
     */
    public static function get_setting_list( $page_type = null )
    {
        switch ( $page_type ) {
            case 'wp_blog_detail':
                return self::get_blog_detail_setting_list();

            case 'wp_blog_overview':
                return self::get_blog_overview_setting_list();

            case 'wp_woocommerce_shop':
                return self::get_woocommerce_shop_setting_list();

            case 'wp_woocommerce_single_product':
                return self::get_woocommerce_store_single_product_setting_list();

            case 'wp_woocommerce_shopping_cart':
                return self::get_woocommerce_shopping_cart_setting_list();

            case 'wp_woocommerce_checkout':
                return self::get_woocommerce_checkout_setting_list();
            
            // // TODO: Add settings support for account settings page
            // case 'wp_woocommerce_account_settings':    
            //     return null;

            default:
                return self::get_settings();
        }
    }

    private static function get_blog_detail_setting_list()
    {
        return ObjectHelper::get_recursive( self::get_settings(), [
            'header' => ['layout'],
            'single_post'
        ] );
    }

    private static function get_blog_overview_setting_list()
    {
        return ObjectHelper::get_recursive( self::get_settings(), [
            'header' => ['layout'],
            'blog_overview'
        ] );
    }

    private static function get_woocommerce_checkout_setting_list()
    {
        return ObjectHelper::get_recursive( self::get_settings(), [
            'header' => ['layout'],
            'woocommerce_checkout'
        ] );
    }

    private static function get_woocommerce_shopping_cart_setting_list()
    {
        return ObjectHelper::get_recursive( self::get_settings(), [
            'header' => ['layout'],
            'woocommerce_shopping_cart'
        ] );
    }

    private static function get_woocommerce_store_single_product_setting_list()
    {
        return ObjectHelper::get_recursive( self::get_settings(), [
            'header' => ['layout'],
            'woocommerce_single_product'
        ] );
    }

    private static function get_woocommerce_shop_setting_list()
    {
        return ObjectHelper::get_recursive( self::get_settings(), [
            'header' => ['layout'],
            'woocommerce_shop'
        ] );
    }

    /**
     * Retrieves a single setting's value, if set, returns default value otherwise, or null if no default value has been
     * defined.
     *
     * @param $full_setting_name string
     *
     * @return mixed | null
     */
    public static function get_setting( $full_setting_name )
    {
        $setting_default = self::get_setting_default( $full_setting_name );
        $setting = get_option( $full_setting_name, $setting_default );

        switch ( $setting ) {
            case 'true':
                return true;
            case 'false':
                return false;
            default:
                return $setting;
        }
    }

    private static function get_setting_default( $setting_name )
    {
        preg_match( "/wb4wp_(.*)_section_(.*)_setting/", $setting_name, $matches ); // NOSONAR

        if ( empty( $matches ) || count( $matches ) < 3 ) {
            return null;
        }

        $section = $matches[1];
        $setting = $matches[2];

        return ObjectHelper::get( self::get_settings(), [$section, $setting, 'default'] );
    }

}