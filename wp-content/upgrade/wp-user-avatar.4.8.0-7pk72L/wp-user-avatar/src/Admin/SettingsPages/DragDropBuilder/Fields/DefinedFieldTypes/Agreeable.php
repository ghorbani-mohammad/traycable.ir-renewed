<?php

namespace ProfilePress\Core\Admin\SettingsPages\DragDropBuilder\Fields\DefinedFieldTypes;


use ProfilePress\Core\Admin\SettingsPages\DragDropBuilder\FieldBase;

class Agreeable extends FieldBase
{
    public function field_type()
    {
        return $this->tag_name . '-cpf-agreeable';
    }

    /**
     * Interface contract fulfillment
     *
     * Dynamically implemented by DragDropBuilder::defined_custom_fields()
     */
    public static function field_icon()
    {

    }

    /**
     * Interface contract fulfillment
     *
     * Dynamically implemented by DragDropBuilder::defined_custom_fields()
     */
    public function field_title()
    {

    }

    /**
     * Interface contract fulfillment
     *
     * Dynamically implemented by DragDropBuilder::defined_custom_fields()
     */
    public function category()
    {

    }

    public function field_settings()
    {
        return apply_filters('ppress_form_builder_textbox_field_settings', [
            parent::GENERAL_TAB  => [
                'checked_state' => [
                    'label'   => esc_html__('Checked by Default', 'wp-user-avatar'),
                    'options' => [
                        'false' => esc_html__('False', 'wp-user-avatar'),
                        'true'  => esc_html__('True', 'wp-user-avatar'),
                    ],
                    'field'   => self::SELECT_FIELD
                ]
            ],
            parent::SETTINGS_TAB => [
                'required' => [
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Required', 'wp-user-avatar'),
                    'description' => esc_html__('Force users to fill out this field, otherwise it will be optional.', 'wp-user-avatar'),
                    'field'       => self::INPUT_FIELD,
                ]
            ],
            parent::STYLE_TAB    => [
                'class' => [
                    'label'       => esc_html__('CSS Classes', 'wp-user-avatar'),
                    'field'       => self::INPUT_FIELD,
                    'description' => esc_html__('Enter the CSS class names you would like to add to this field.', 'wp-user-avatar')
                ]
            ],
        ], $this);
    }
}