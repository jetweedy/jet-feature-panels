<?php
header("Content-type:text/javascript");
define('WP_USE_THEMES', false);
require ('../../../wp-load.php');
$actionsfile = plugins_url()."/jet-feature-panels/jet-feature-panels-actions.php";
?>

try {
    jQuery(document).ready(function($){
		try {
			$('.color-picker').wpColorPicker();
		} catch(er) {}
    });
} catch(er) {}

function initJetFeaturePanelPopup(post_id) {

	var gears = document.createElement("img");
	gears.src = "<?php print plugins_url()."/jet-feature-panels/gears2.gif"; ?>";
    var div = document.createElement("div");
    div.className = "jet-feature-panel-popup";
	div.id = "jet-feature-panel-popup-"+post_id;
    document.body.appendChild(div);
	div.appendChild(gears);

    jet_ajax("GET", "<?=$actionsfile?>", "action=getLongText&post_id="+post_id, function(x){ 
        showJetFeaturePanelPopup(x, div);
    }, false);
}
function showJetFeaturePanelPopup(x, div) {
	
	console.log(div);
	div.innerHTML = "";
	
//    var div = document.createElement("div");
//    div.className = "jet-feature-panel-popup";
//    document.body.appendChild(div);

    dControls = document.createElement("div");
    dControls.className = "jet-feature-panel-controls-top";
    div.appendChild(dControls);

    var aClose = document.createElement("a");
    aClose.className = "jet-feature-panel-controls-top";
    aClose.innerHTML = "[X]"
    aClose.href = "javascript:;";
    aClose.Container = div;
    aClose.addEventListener("click", closeJetFeaturePanels);
    dControls.appendChild(aClose);
    var dContent = document.createElement("div");
    dContent.innerHTML = x;
    div.appendChild(dContent);
}

function closeJetFeaturePanels() {
    var fps = document.getElementsByClassName("jet-feature-panel-popup");
	var fpslen = fps.length + 0;
	var remi = 0;
    while(fps.length>0 && remi < fpslen) {
		remi++;
		var f = 0;
        if (typeof fps[f] == "object") {
            fps[f].parentNode.removeChild(fps[f]);
        }
    }
}

window.addEventListener("keyup", function(e) {
    if (e.keyCode === 27) {
        closeJetFeaturePanels();
    }
});



// ----------------------------------------------------------------------------------


// Resource: http://www.dustindiaz.com/javascript-curry/
// This variation accepts an array of args (can be null or nonexistent) 
var jetCurry = function(fn, scope, args) {
    var scope = scope || window;
    if (!args) { args = []; }
    return function() {
        fn.apply(scope, args);
    };
}

function jet_ajax_trim(str, chars) {
    return jet_ajax_ltrim(jet_ajax_rtrim(str, chars), chars);
}

function jet_ajax_ltrim(str, chars) {
    chars = chars || "\\s";
    return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}

function jet_ajax_rtrim(str, chars) {
    chars = chars || "\\s";
    return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}

function jet_ajax(method,url,params,callback,scope) {
    var scope = (scope==undefined | !scope) ? window : scope;
    var xmlhttp = new XMLHttpRequest();
    var async = (callback!=undefined && !!callback);
    if (async) {
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                callback.apply(scope,[jet_ajax_trim(xmlhttp.responseText)]);
            }
        }
    }
    if (method=="POST") {
        xmlhttp.open("POST", url, async);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//      xmlhttp.setRequestHeader("Content-length", params.length);
//      xmlhttp.setRequestHeader("Connection", "close");
        xmlhttp.send(params);
    } else {
        xmlhttp.open("GET",url+"?"+params,async);
        xmlhttp.send();
    }
    return jet_ajax_trim(xmlhttp.responseText);
}
