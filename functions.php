<?php

function child_theme_enqueue_styles() {
    // Styl rodzica
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css'
    );

    // Pobierz wersję motywu potomnego (z nagłówka style.css)
    $child_theme = wp_get_theme();
    $child_version = $child_theme->get('Version');

    // Styl dziecka
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style'),
        $child_version // ← kluczowy element
    );
}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );



// Dodaj pasek promo na górze strony w WordPressie
add_action('wp_head', 'swiateczny_pasek_promo');

function swiateczny_pasek_promo() {
    ?>
    <!-- Pasek promo Świąteczny -->
    <div style="background-color: #E11D48; color: white; padding: 8px 0; overflow: hidden; white-space: nowrap; text-align: center; font-weight: 600; font-size: 0.875rem;">
        <div style="display: inline-block; animation: marquee 18s linear infinite;">
            🎁 Darmowa dostawa od 149 PLN • ✨ 30 dni zwrotu • 🎅 Wysyłka w 24h • 🎄 Limitowana edycja
        </div>
    </div>

    <!-- Animacja marquee -->
    <style>
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    </style>
    <?php
}



// Polityka prywatnosci wordpress
// add_filter(
// 	'woocommerce_get_privacy_policy_text', 
// 	'custom_checkout_privacy_text', 10, 2);
// function custom_checkout_privacy_text( $text, $page_id ) {
//     $policy_url = site_url('/polityka-prywatnosci/'); // Twój slug
//     return 'Twoje dane osobowe będą użyte do przetworzenia zamówienia, ułatwienia korzystania ze strony internetowej oraz innych celów opisanych w naszej <a href="' . esc_url($policy_url) . '">polityce prywatności</a>.';
// }

