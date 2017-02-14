<?php
/*
[Icon name="facebook"]
[Icon name="linkedin"]
[Icon name="rss"]
[Icon name="beaker"]
[Icon name="blank"]
[Icon name="cash"]
[Icon name="certificate"]
[Icon name="checklist"]
[Icon name="classroom"]
[Icon name="construction"]
[Icon name="cross"]
[Icon name="dollarsign"]
[Icon name="forrent"]
[Icon name="group"]
[Icon name="hammer"]
[Icon name="handshake"]
[Icon name="heart"]
[Icon name="house"]
[Icon name="housecouple"]
[Icon name="housekey"]
[Icon name="houseleaf"]
[Icon name="info"]
[Icon name="manquestion"]
[Icon name="pipes"]
[Icon name="recycle"]
[Icon name="speechbubble"]
[Icon name="warning"]
[Icon name="waterdrop"]
[Icon name="waterglass"]
[Icon name="waterhand"]

*/


function she_sc_icons( $atts, $content = null ) {

        $a = shortcode_atts( array(
            'name' => 'blank',
        ), $atts );

        ob_start();
    ?>
        <span class="she-icons__<?php echo $a['name']; ?>"></span>    
    <?php
    $return_string = ob_get_contents();
    ob_end_clean();
    return $return_string;
}
add_shortcode( 'Icon', 'she_sc_icons' );
?>