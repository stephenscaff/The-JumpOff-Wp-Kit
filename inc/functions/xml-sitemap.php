<?php 
/*-----------------------------------------------*/
/*  SitemapXML
/*  @description: class to build and save an xml sitemap of posts & pages
/*  @todo: define priorities for sitemap schema, via check for CPTs, etc.
/*-----------------------------------------------*/
class SitemapXML{

  // Add filters and actions in the construct
  function __construct() {
    // Build on save post
    add_action( 'save_post', array( $this, 'create_sitemap' )); 
  }

  // create the sitemap.xml from posts
  function create_sitemap() {
    $sitemap_posts = get_posts( array(
        'numberposts' => -1,
        'orderby'     => 'modified',
        'post_type'   => array( 'post', 'page', 'work' ), // add post types
        'order'       => 'DESC'
    ) );
    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
    $sitemap .= "\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";    
    // 
    foreach( $sitemap_posts as $post ) {
        setup_postdata( $post );   

        //$priority_level = 8.0;
        $postdate = explode( " ", $post->post_modified );   
        $sitemap .= "\t" . '<url>' . "\n" .
            "\t\t" . '<loc>' . get_permalink( $post->ID ) . '</loc>' .
            "\n\t\t" . '<lastmod>' . $postdate[0] . '</lastmod>' .
            "\n\t\t" . '<changefreq>monthly</changefreq>' .
            "\n\t\t" . '<priority>1.0</priority>' .
            "\n\t" . '</url>' . "\n";
    }     
    $sitemap .= '</urlset>';     
    $fp = fopen( ABSPATH . "sitemap.xml", 'w' );
    fwrite( $fp, $sitemap );
    fclose( $fp );
  }
}
new SitemapXML();
?>