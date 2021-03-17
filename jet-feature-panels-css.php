<?php
header("Content-type:text/css");
define('WP_USE_THEMES', false);
require ('../../../wp-load.php');
//$background_color = get_field('background_color', 'option');
//$text_color = get_field('text_color', 'option');

$background_color = get_option( 'jetFeaturePanels_settings' )["jetFeaturePanels_BackgroundColor"];
$text_color = get_option( 'jetFeaturePanels_settings' )["jetFeaturePanels_TextColor"];
$popup_bg_color = get_option( 'jetFeaturePanels_settings' )["jetFeaturePanels_PopupBgColor"];

?>

.jet-feature-panel-popup {
    background-color:<?=$popup_bg_color?>;
    opacity:1.00;
    color:white;
    border:2px solid white;
    position:fixed;
    top:10px;
    left:10px;
    right:10px;
    z-index:100000;
    padding:20px;
	max-height:85%;
	overflow-y:auto;
}

.jet-feature-panel-popup a:hover {
	text-decoration:underline;
}

.jet-feature-panel-controls-top {
    display:block;
    text-align:left;
    padding:5px 10px;
}
.jet-feature-panel-controls-top a
, .jet-feature-panel-controls-top a:link
, .jet-feature-panel-controls-top a:hover
, .jet-feature-panel-controls-top a:visited
, .jet-feature-panel-controls-top a:active {
    color:white;
}

.jet-feature-panel {
    overflow-y:none;
    margin:2%;
    width:28%;
    display:inline-block;
    vertical-align:top;
    position:relative;
    box-shadow: 2px 2px 10px 0 rgba(0, 0, 0, 0.5);
}

.jet-feature-panel:hover {
    box-shadow: 5px 5px 10px 0 rgba(50, 100, 150, 0.7), 5px 5px 5px 0 rgba(50, 100, 150, 0.7);
}

.jet-feature-panel img {
    width:100%;
    float:left;
}

.jet-feature-panel a {
    color:<?=$text_color?> !important;
}
.jet-feature-panel a:hover {
    color:<?=$text_color?> !important;
}
.jet-feature-panel a:hover {
    /*
    background-color:lightblue;
    color:black;
    */
}

.jet-feature-panel .content {
    position:absolute;
    top:10%;
    bottom:10%;
    width:100%;
    color:<?=$text_color?>;
    text-align:center;
    vertical-align:middle;
}

.jet-feature-panel .content.top {
    top:10%;
    bottom:auto;
}
.jet-feature-panel .content.bottom {
    top:auto;
    bottom:10%;
}


.jet-feature-panel .content-bg {
    width:100%;
    position:absolute;
    top:0%;
    bottom:0%;
/*    background-color:#1869A0;  */
    background-color:<?=$background_color?>;
    opacity:.7
}

.jet-feature-panel .title {
    position:relative;
    vertical-align:middle;
    font-size:1.6em;
    line-height:1.6em;
    margin:0 5px;
}
.jet-feature-panel .text {
    line-height:1.6em;
    position:relative;
    vertical-align:middle;
    margin:0 5px;
}

.jet-feature-panel.full {
    width:99%;
}



/*
@media only screen and (max-width: 1000px) {
.jet-feature-panel {
     width:30%;
    }
}
*/

@media only screen and (max-width: 1000px) {
.jet-feature-panel {
     width:45%;
    }
}

@media only screen and (max-width: 700px) {
.jet-feature-panel {
     width:95%;
    }
}

/*
@media only screen and (min-width: 2000px) {
.jet-feature-panel {
     width:22%;
    }
}
*/
