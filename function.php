<?php

function cards_posts_columns($columns)
{
    unset($columns['date']);
    $post_new_columns = array(
        'card_number'           => '#WEL',
        'piattaforma'           => 'PIATTAFORMA',
        'tipologia_di_vendita'  => 'TIPOLOGIA DI VENDITA',
        'prezzo'                => 'PREZZO',
        'operatore_adv'        => 'OPERATORE ADV ',
    );
    return array_merge($columns, $post_new_columns);
}

add_filter('manage_cards_posts_columns', 'cards_posts_columns');

function cards_posts_custom_column($columns, $post_id)
{
    if ('card_number' == $columns) {
        echo get_post_meta($post_id, 'aci_card_number', true);
    }

    if ('piattaforma' == $columns) {
        echo get_post_meta($post_id, 'acipia_piattaforma', true);
    }

    if ('tipologia_di_vendita' == $columns) {
        echo get_post_meta($post_id, 'acind_nome_dipendente', true);
    }

    if ('prezzo' == $columns) {
        echo get_post_meta($post_id, 'crd_price', true);
    }

    if ('operatore_adv' == $columns) {
        echo get_post_meta($post_id, 'acioa_operatore_adv', true);
    }
}
add_action('manage_cards_posts_custom_column', 'cards_posts_custom_column', 10, 2);
