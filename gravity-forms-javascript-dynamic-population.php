<?php
/*
Plugin Name: Gravity Forms JavaScript Dynamic Population
Plugin URI: https://github.com/mmirus/gravity-forms-javascript-dynamic-population
Description: Dynamically populate Gravity Forms fields from query parameters using JavaScript.
Author: Matt Mirus
Author URI: https://github.com/mmirus
Version: 1.0.3
GitHub Plugin URI: https://github.com/mmirus/gravity-forms-javascript-dynamic-population
 */

// add data-prefill attribute to fields
add_filter('gform_field_content', function ($field_content, $field, $value, $entry_id, $form_id) {
    if (!$field->allowsPrepopulate) return $field_content;
    return str_replace('name=', "data-prefill='{$field->inputName}' name=", $field_content);
}, 10, 5);

// fill values from query params for fields where dynamic population is enabled
add_action('gform_register_init_scripts', function ($form) {
    $script = "
    const getUrlParameter = function(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    };
    const fields = [].slice.call(document.querySelectorAll('[data-prefill]'));
    fields.forEach(function(field) {
        const value = getUrlParameter(field.dataset.prefill);
        if (value === '') return;

        const fieldType = (field.tagName === 'INPUT') ? field.type : field.tagName.toLowerCase();
        switch (fieldType) {
            case 'checkbox':
            case 'radio':
                field.checked = (value.split(',').indexOf(field.value) !== -1);
                break;
            case 'select':
                jQuery(field).val(value.split(','));
                break;
            default:
                field.value = value;
        }
    });
    ";

    GFFormDisplay::add_init_script($form['id'], 'populate_fields', GFFormDisplay::ON_PAGE_RENDER, $script);
}, 10, 2);
