<?php

namespace Wb4WpTheme\Managers\Customize\Controls;

final class ToggleControl extends CustomControl
{
    /**
     * The type of control being rendered
     */
    public $type = 'toggle_switch';

    /**
     * Enqueue our scripts and styles
     */
    public function enqueue()
    {
        wp_enqueue_style(
            'wb4wp-custom-toggle-control-css',
            $this->get_stylesheet_uri( 'toggle-control' ),
            [],
            '1.0',
            'all'
        );
    }

    /**
     * Render the control in the customizer
     */
    public function render_content()
    {
        ?>
        <div class="toggle-switch-control">
            <div class="toggle-switch">
                <input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>"
                       name="<?php echo esc_attr( $this->id ); ?>" class="toggle-switch-checkbox"
                       value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link();
                checked( $this->value() ); ?>>
                <label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
                    <span class="toggle-switch-inner"></span>
                    <span class="toggle-switch-switch"></span>
                </label>
            </div>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php if ( !empty( $this->description ) ) { ?>
                <span class="customize-control-description"><?php echo $this->description; ?></span>
            <?php } ?>
        </div>
        <?php
    }
}