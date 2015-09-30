<!doctype html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang="en"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html class="no-js" lang="en"><!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/screen.css" />

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/ie.css" />
     
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        
    <![endif]-->
    
<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicons/favicon.ico?v=2" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicons/144.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicons/114.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicons/72.png">
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicons/57.png">


<?php
	wp_head();
?>

</head>

<body <?php body_class(); ?>>

	<?php include_once("img/svg-defs.svg"); ?>

	<header>

		<div class="row">
	
			<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
			<<?php echo $heading_tag; ?> id="site-title">
					
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
					<svg>
          				<use xlink:href="#shape-branding" viewbox="0 0 100 100"/>
          				<title><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></title>
       				</svg>
				</a>
					
			</<?php echo $heading_tag; ?>>
			
			<svg class="menu-trigger close">
          		<use xlink:href="#shape-nav-trigger" />
        	</svg>

        	<svg class="menu-trigger open">
          		<use xlink:href="#shape-open-nav" />
        	</svg>

        	<?php/* if( get_field('social_links', 'options') ): ?>
	        	<ul id="social-links">
				<?php while( has_sub_field('social_links', 'options') ): ?>
					
						<li class="<?php the_sub_field('social_network', 'options'); ?>"><a href="<?php the_sub_field('social_network_url', 'options'); ?>"><?php the_sub_field('icon_code', 'options'); ?></a></li>
									
				<?php endwhile; ?>
				</ul>	
			<?php endif; */?>
			
			<nav>
			
				<?php
	           /** Loading WordPress Custom Menu  **/
	           wp_nav_menu( array(
	              'menu'            => 'main-menu',
	              'menu_class'      => 'primary-menu',
					'menu_id'         => '',
	              'fallback_cb'     => '',
	              'container' => false,
	              'menu_id' => 'main-menu',
	              'theme_location' => 'primary-menu',
	              'walker' => new Bootstrapwp_Walker_Nav_Menu()
	          ) ); ?>
	          
			</nav>

			<script type="text/javascript">
    			$("nav").hide();
			</script>

		</div>
		