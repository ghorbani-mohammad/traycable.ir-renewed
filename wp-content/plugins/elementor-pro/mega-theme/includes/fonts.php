<?php
defined('ABSPATH') || exit ("no access");
/**
 * Add Font Group
 */
add_filter( 'elementor/fonts/groups', function( $font_groups ) {
    return ['MEGATHEME'=>'فونت های فارسی']+$font_groups;
} );

/**
 * Add Group Fonts
 */
add_filter( 'elementor/fonts/additional_fonts', function( $additional_fonts ) {
    $font_list=__DIR__.'/fonts/font_list.php';
    if (!file_exists($font_list)) megatheme_font_importer();
    $font_list=maybe_unserialize(file_get_contents($font_list));
    foreach (array_keys($font_list) as $font){
        $additional_fonts[$font]= 'MEGATHEME';
    }
    return $additional_fonts;
} );

function megatheme_font_importer(){
    $font_list=__DIR__.'/fonts/font_list.php';

        $files = array();
        foreach (glob(__DIR__."/fonts/*/*.css") as $file) {
            $files[] = $file;
        }
        $fonts=[];
        $style='';
        if (count($files)){
            foreach ($files as $file){
                $file_content=file_get_contents($file);
                preg_match('/font-family ?:(.*)?;/',$file_content,$find_fonts);
                if (!isset($find_fonts[1])) continue;
                $url=str_replace(['\\','//'],'/',str_replace(__DIR__,ELEMENTOR_PRO_URL . 'mega-theme/includes',$file));
                $fonts[trim($find_fonts[1],' "\'')]=trim($url,' ');
                $dir=trim(str_replace(dirname(dirname($file)),'',dirname($file)),' \/') ;
                $file_content=preg_replace('/(url ?\( ?.)/',"$1".$dir.'/',$file_content);
                $style.=$file_content;
            }
        }
        $fonts=array_unique($fonts);
        file_put_contents($font_list,serialize($fonts));
        file_put_contents(__DIR__.'/fonts/font.css',$style);

}
add_action('elementor/frontend/after_enqueue_styles', function() {
    wp_enqueue_style( 'megatheme-font', ELEMENTOR_PRO_URL . 'mega-theme/includes/fonts.css' );
});
