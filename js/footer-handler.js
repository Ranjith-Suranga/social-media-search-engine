/*
 *  Infoob (Socail Media Search Engine)
 *  Main JS for adjusting footer according to the page
 *  Currently, this is being used by all the advertising landing pages and policies pages
 *  Developer: D.M.Ranjith Suranga (Sura-Boy)
 *  Version: 1.0
 *  Copyright © 2015 Infoob. All rights reserved.
 */

/*
 * This function will adjust dimensions and positions, etc. of the document's elements, 
 * Which we can't handle from just pure CSS
 */
function ajustOnResize(){
    $("body").css("padding-bottom",$("footer").outerHeight());
}

$(document).ready(function () { 
    ajustOnResize();
});

$(window).resize(ajustOnResize);


