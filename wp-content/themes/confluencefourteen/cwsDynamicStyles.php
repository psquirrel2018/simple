<?php header("Content-type: text/css");
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';


$body_bg_color = cws_theme_get_option( 'cws_theme_bg_color' );
$font_color = cws_theme_get_option( 'cws_theme_font_color' );
$link_color = cws_theme_get_option( 'cws_theme_link_color' );
$button_color = cws_theme_get_option( 'cws_theme_button_color' );
$cta_color = cws_theme_get_option( 'cws_theme_cta_color' );


$font_selected = cws_theme_get_option( 'cws_theme_font' );
// If (Option Lato True)
/*
if ( $font_selected === 'Lato' ) {
    wp_enqueue_style('Lato','https://fonts.googleapis.com/css?family=Lato:400,700,900');
} elseif ( $font_selected === 'Montserrat' ){
    wp_enqueue_style('montserrat','https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,900');
} else {$font_selected = 'Roboto';}*/



switch ($font_selected) {
    case "Lato":
        wp_enqueue_style('Lato','https://fonts.googleapis.com/css?family=Lato:400,700,900');
        $menu_font = $font_selected;
        break;
    case "Montserrat":
        wp_enqueue_style('Montserrat','https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,900');
        $menu_font = $font_selected;
        break;
    case "Roboto":
        wp_enqueue_style('Roboto','https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900');
        $menu_font = $font_selected;
        break;
    case "Roboto Slab":
        wp_enqueue_style('rRboto-slab','https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700');
        $menu_font = $font_selected;
        break;
    case "Karla":
        wp_enqueue_style('Karla','https://fonts.googleapis.com/css?family=Karla:400,700');
        $menu_font = $font_selected;
        break;
    case "Poppins":
        wp_enqueue_style('Karla','https://fonts.googleapis.com/css?family=Poppins:300,400,700,900');
        $menu_font = $font_selected;
        break;
    default:
        $menu_font = 'Helvetica';
}

?>

<style type="text/css">

    .navbar-dark .navbar-nav .nav-link {
        color: rgba(255,255,255,1.0);
        font-family: "<?= $font_selected; ?>",Helvetica,Arial,sans-serif;
    }

    h1,h2,h3,h4,h5,h6 {font-family: "<?= $font_selected; ?>",Helvetica,Arial,sans-serif;}

    body {
        background: none #<?php echo $body_bg_color;?>;
        color:#<?php echo $font_color;?>;
    }

    h1 {color:<?php echo $font_color;?>;margin-bottom: 25px;line-height: 170%}
    h2 {color:<?php echo $font_color;?>; margin-top: -8px;margin-bottom: 25px;line-height: 170%}
    h3 {color:<?php echo $font_color;?>;margin-bottom:15px;}
    a {font-style:normal;color: <?php echo $link_color;?>;text-decoration: none;padding: 1px 0}
    a:hover, a:active {color: <?php echo $font_color;?>}
    a:focus {outline: none}

    a {
        font-family: "<?= $font_selected; ?>",Helvetica,Arial,sans-serif;
    }

</style>