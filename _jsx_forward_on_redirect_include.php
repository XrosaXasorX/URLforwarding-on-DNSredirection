<?php
///////////////////////////////////////////////////////////////////
//
// BoF :: "_jsx_forward_on_redirect_include.php"
//
// 2015/05/26 - 20:00
///////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////
//
// MODIFY_HERE: insert the redirect-ed domain address.
//
// Redirect-ed domain.
$g_sDomainRedirected = "http://www.mysite.com/";

//
// MODIFY_HERE: add *your* pages (in the order to be shown in the menu).
//
// Pages array.
$g_JSXaPages   = array( );
$g_JSXaPages[] = array( 'title' => "Home Page"    , 'url' => "home_page.php"    );
$g_JSXaPages[] = array( 'title' => "Gallery Page" , 'url' => "the_gallery.php"  );
$g_JSXaPages[] = array( 'title' => "Get Contacts" , 'url' => "get_contacts.php" );

///////////////////////////////////////////////////////////////////

function JSX_PHP_ForwardOnRedirect_Page_Go( )
    {
    global $g_sDomainRedirected;
    global $g_JSXaPages;

    // Search for clicked page.
    $l_pos = 0;
    foreach( $g_JSXaPages as $pos => $pag )
        {
        $l_http_referer = $_SERVER['HTTP_REFERER'];
        $l_domain_nchar = strpos($l_http_referer, "?" );
        $l_url_curr = substr( $l_http_referer, $l_domain_nchar+1 );        
        if( $pag['url']==$l_url_curr )
            $l_pos=$pos;        
        }
        
    // Show clicked page.
    foreach( $g_JSXaPages as $pos => $pag )
        {
        $l_http_referer = $_SERVER['HTTP_REFERER'];
        $l_domain_nchar = strpos($l_http_referer, "?" );
        $l_anchor = sprintf( "%s", $pag['url'] );        
        if( $pos==$l_pos )
            include( $l_anchor );
        }

    }//JSX_PHP_ForwardOnRedirect_Page_Go
///////////////////////////////////////////////////////////////////
    
function JSX_PHP_ForwardOnRedirect_Menu_Print( )
    {
    global $g_sDomainRedirected;
    global $g_JSXaPages;

    // Search for clicked page.
    $l_pos = 0;
    foreach( $g_JSXaPages as $pos => $pag )
        {
        $l_http_referer = $_SERVER['HTTP_REFERER'];
        $l_domain_nchar = strpos($l_http_referer, "?" );
        $l_url_curr = substr( $l_http_referer, $l_domain_nchar+1 );
        if( $pag['url']==$l_url_curr )
            $l_pos=$pos;
        }

    // Show pages menu.
    foreach( $g_JSXaPages as $pos => $pag )
        {
        $l_http_referer = $_SERVER['HTTP_REFERER'];
        $l_domain_nchar = strpos($l_http_referer, "?" );
        if( $pos==$l_pos )
            $bgcol = "#DDDDDD";
        else
            $bgcol = "#EEEEEE";
        printf( "<a href='%s?%s' style=' background-color:%s; color:#000000; display:inline-block; border:1px solid #e0e0e0; text-align:center; text-decoration:none; width:200px; ' >%s</a>",
                $g_sDomainRedirected, $pag['url'], $bgcol, $pag['title'] );
        }        
    echo "<br />";
    }//JSX_PHP_ForwardOnRedirect_Menu_Print
///////////////////////////////////////////////////////////////////
   
    
///////////////////////////////////////////////////////////////////
// JESAX.NET [ http://www.jesax.net/ ]
// JAVA/script Environmental Subroutines for Accessible XML
// (C) CopyRight JESAX.net / SagoSoft.it [1984 - 2015]
// Last update: 2015/05/26 - 20:00
///////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////
// EoF :: "_jsx_forward_on_redirect_include.php"
///////////////////////////////////////////////////////////////////
?>
 
