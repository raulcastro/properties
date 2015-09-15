<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Framework/Tools.php';

class Layout_View
{
	private $data;
	
	public function __construct($data)
	{
		$this->data = $data;
	}    
	
	/**
	 * function printHTMLPage
	 * 
	 * Prints the content of the whole website
	 * 
	 * @param head 		(string) Is the head of the HTML structure
	 * @param header 	(string) Is the menu and logo section
	 * @param bodyType	(string) Is for CSS purposes
	 * @param body		(string) Content of the website
	 * 
	 */
	
	public function printHTMLPage($section)
    {
    ?>
	<!DOCTYPE html>
	<html class='no-js' lang='<?php echo $this->data['appInfo']['lang']; ?>'>
		<head>
			<!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <![endif]-->
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<link rel="shortcut icon" href="favicon.ico" />
			<link rel="icon" type="image/gif" href="favicon.ico" />
			<?php 
			switch ($section) {
				case 'mainSection':
					echo self :: getHead();
				break;
				
				case 'byCategory':
					echo self :: getCoverHead();
				break;
				
				case 'byCompany':
					echo self :: getCompanyHead();
				break;
			
				case 'map':
					echo self::getMapHead();
				break;
				
				case 'videos':
					echo self::getVideosHead();
				break;
				
				case 'contact':
					echo self::getContactHead();
				break;
				
				case 'search':
					echo self::getSearchHead();
				break;
			
				case 'allEvents':
					echo self::getAllEventsHead();
				break;
				
				case 'about-us':
					echo self::getAboutHead();
				break;
				
				case 'contact-us':
					echo self::getVideosHead();
				break;
				
				default:
				break;
			}
			?>
		</head>
		<body>
			<?php 
			echo self :: getHeader();
			  
			switch ($section) {
				case 'mainSection':
					echo self :: getIndexContent();
				break;
				
				case 'byCategory':
					echo self :: getCoverContent();
				break;
				
				case 'byCompany':
					echo self :: getCompanyContent();
				break;
				
				case 'map':
					echo self :: getMapContent();
				break;
				
				case 'videos':
					echo self :: getVideosContent();
				break;
				
				case 'contact':
					echo self :: getContactContent();
				break;
				
				case 'search':
					echo self :: getSearchContent();
				break;
				
				case 'allEvents':
					echo self :: getAllEventsContent();
				break;
				
				case 'about-us':
					echo self :: getAboutContent();
				break;
				
				default:
				break;
			}

			echo self :: getFooter(); 
			?>
		</body>
	</html>
    <?php
    }
    
    /**
     * getMainHeader
     *
     * This function returns the headeer of the index, by now, it can
     * receive params like js and css
     *
     * @param NULL
     * @return string $header an html string
     *
     */
    public function getHead()
    {
        ob_start();
        ?>
		<title><?php echo $this->data['appInfo']['title']; ?></title>
		<meta name="keywords" content="<?php echo $this->data['appInfo']['keywords']; ?>" />
		<meta name="description" content="<?php echo $this->data['appInfo']['description']; ?>" />
		<meta property="og:type" content="website" /> 
		<meta property="og:url" content="<?php echo $this->data['appInfo']['url']; ?>" />
		<meta property="og:site_name" content="<?php echo $this->data['appInfo']['siteName']; ?> />
		<link rel='canonical' href="<?php echo $this->data['appInfo']['url']; ?>" />
		<?php echo self::getCommonDocuments(); ?>
		<link rel="stylesheet" href="/css/front/camera.css">
		
		<script src="/js/front/camera.js"></script>
		
		<script>
	        $(document).ready(function(){
	            jQuery('#camera_wrap').camera({
	                playPause: false,
	                loader: 'none',
	                pagination: true,
	                minHeight: '40',
	                thumbnails: false,
	                height: '35,555555555555555555555555555556%',
	                caption: true,
	                navigation: false,
	                fx: 'scrollHorz',
	                transPeriod: 500
	            });
	        });
	     </script>
		
		<?php echo self::getGoogleAnalytics(); 
		
        $head = ob_get_contents();
        ob_end_clean();
        return $head;
    }
    
    public function getCommonDocuments()
    {
    	ob_start();
    	?>
    	<link rel="stylesheet" href="/css/front/style.css">
     	<link rel="stylesheet" href="/css/front/font-awesome.min.css">
    	    
		<script type="text/javascript" src="/js/jquery.js"></script>
		<script src="/js/front/jquery-migrate-1.2.1.js"></script>
	    <script src="/js/front/jquery.easing.1.3.js"></script>
	    <script src="/js/front/jquery.ui.totop.js"></script>
	    <script src="/js/front/jquery.equalheights.js"></script>
		<script src="/js/front/script.js"></script>
	    <script src="/js/front/superfish.js"></script>
	    <script src="/js/front/jquery.mobilemenu.js"></script>
		<script type="text/javascript" src="/js/front/script.js"></script>
		
		<!--[if (gt IE 9)|!(IE)]><!-->
		<script src="/js/front/jquery.mobile.customized.min.js"></script>
		<!--<![endif]-->
		
	    	
	    
    	<?php 
    	$documents = ob_get_contents();
    	ob_end_clean();
    	return $documents; 
    }
    
    public function getGoogleAnalytics()
	{
		ob_start();
		?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-37520668-6', 'auto');
		  ga('send', 'pageview');
		
		</script>
		<?php 
		$google = ob_get_contents();
		ob_end_clean();
		return $google;
	}
    
    /**
     * getHeader
     * 
     * it's the top and main navigation menu
     * 
     * @return string
     */
    public function getHeader()
	{
		ob_start();
		?>
		<!--============================== Header =================================-->
		<header>
		    <div class="container">
		        <div class="row">
		            <div class="grid_4">
		                <h1><a href="/"><img src="/images/logo.jpg" alt="<?php echo $this->data['appInfo']['siteName']; ?>"></a></h1>       
		            </div>
		            <nav class="grid_8">
		                <ul class="sf-menu">
		                    <li class="current"><a href="/">Home</a></li>
		                    
		                    <li class="with-ul"><a href="/">Listing</a>                    
		                        <ul>
		                        <?php
								foreach ($this->data['categories'] as $c)
								{
								?>
								<li>
									<a href="/<?php echo Tools::slugify($c['category_id']); ?>/<?php echo Tools::slugify($c['name']); ?>/"><?php echo $c['name']; ?></a>
<!-- 									<ul> -->
<!-- 	                                    <li><a href="condos-for-rent.html#">Condos</a></li> -->
<!-- 	                                    <li><a href="homes-for-rent.html#">Homes</a></li> -->
<!-- 	                                </ul> -->
								</li>
								<?php
								}
								?>
		                       </ul>
		                    </li>
		                    <li><a href="/about-us/">About Us</a></li>
		                    <li><a href="/contact-us/">Contact</a></li>
		                </ul>
		            </nav>
		        </div>
		    </div>
		</header>
		<?php
		$header = ob_get_contents();
		ob_end_clean();
		return $header;
	}
	
	/**
	 * getFooter
	 * 
	 * returns an string with the footer content, this includes categories, 
	 * location, contact info, and some description
	 * 
	 * @return string
	 */
	public function getFooter()
	{
		ob_start();
		?>
		<!--=======Footer=================================-->

		<footer>
		    <div class="container">        
		        <div class="row">
		            <div class="pr_policy grid_6">
		                <span><?php echo $this->data['appInfo']['siteName']; ?></span>
		                &copy;
		                <span id="copyright-year"> </span>
		                &bull;
		                <a href="index-6.html"> Privacy Policy</a>
		            </div>
		            <div class="social">
		                <ul>
		                    <li><a href="http://www.pinterest.com/<?php echo $this->data['appInfo']['pinterest']; ?>" target="_blank"><div><i class="fa fa-pinterest"></i></div></a></li>
		                    <li><a href="http://twitter.com/<?php echo $this->data['appInfo']['twitter']; ?>" target="_blank"><div><i class="fa fa-twitter"></i></div></a></li>
		                    <li><a href="http://www.facebook.com/<?php echo $this->data['appInfo']['facebook']; ?>" target="_blank"><div><i class="fa fa-facebook"></i></div></a></li>
		                    <li><a href="http://instagram.com/<?php echo $this->data['appInfo']['instagram']; ?>" target="_blank"><div><i class="fa fa-instagram"></i></div></a></li>
		                </ul>
		            </div>
		        </div>
		    </div>
		    <!--{%FOOTER_LINK} -->
		</footer>
		
		<!--======= To Top Button =================================-->
		<a href="/#" id="toTop">
		    <i class="fa fa-arrow-circle-up"></i>
		</a>
        <?php
        $footer = ob_get_contents();
        ob_end_clean();
        return $footer;
    }
    
    /**
     * getCategoriesFooter
     * 
     * return the categories, on li, for the footer
     * 
     * @return string
     */
    public function getCategoriesFooter()
    {
    	ob_start();
    	if($this->data['categories'])
    	{
    		foreach ($this->data['categories'] as $category)
    		{
    			?>
    		<li>
    		    <a href="/<?php echo $category['category_id']; ?>/<?php echo Tools::slugify($category['name']); ?>/">
    		        &raquo; <?php echo $category['name']; ?>
    		    </a>
    		    <div class="clear"></div>
    		</li>
    			<?php
    		}
    	}
    	$categories = ob_get_contents();
    	ob_end_clean();
    	return $categories;
    }
    
    /**
     * getLocationsFooter
     * 
     * returns an string with the locations on li
     * 
     * @return string
     */
    public function getLocationsFooter()
    {
    	ob_start();
    	if($this->data['locations'])
    	{
    		foreach ($this->data['locations'] as $location)
    		{
    			?>
    			<li>
    			    <a href="/location/<?php echo $location['location_id']; ?>/<?php echo Tools::slugify($location['name']); ?>/">
    					&raquo; <?php echo $location['name']; ?>
    				</a>
    				<div class="clr"></div>
    			</li>
    			<?php
    		}
    	}
        $locations_footer = ob_get_contents();
        ob_end_clean();
        return $locations_footer;
    }
    
    /**
     * getIndexContent
     * 
     * returns the html for the index section, and only for the index section
     * 
     * @return string html code
     */
    public function getIndexContent()
    {
    	ob_start();
    	?>
		<!--========= Camera Slider =========-->
		<div id="camera_wrap">
		    <?php echo self::getSwipes(); ?>  
		</div>
		
		<!--========= Info in Column =========-->
		<div class="container">
			<div class="row info-col">
			<?php echo self :: getItemsPromoted(); ?>
			</div>
		</div>
		
		<!--========= Ad =========-->
		<div class="showcase">
		    <img src="images/page-1_img-5.jpg" alt="Real Estate Playa del Carmen">
		    <div class="container">
		        <div class="showcase_text">
		            <div class="showcase_logo">
		                <span class="showcase_logo_1"><?php echo $this->data['appInfo']['siteName']; ?></span>
		            </div>
		            <h2><?php echo $this->data['appInfo']['description']; ?></h2>
		            <a href="about-us.html" class="btn btn__in-showcase">read more info</a>
		        </div>        
		    </div>
		</div>
		
		<!--========= Text Block =========-->
		<div class="container text_block">
		    <h3><?php echo $this->data['appInfo']['siteName']; ?></h3>
		    <div class="row">
		        <div class="grid_6">
		            
		            <p>We are known for developing quality working relationships with our 
		            clients based on respect, integrity, and trust . We pride ourselves 
		            on building a solid foundation for assisting you with all your real 
		            estate needs. <br>
		            Whether you are purchasing or selling, we will ensure that you will 
		            have the support you need to make sound decisions and receive the best 
		            deal possible.
		            </p>
		            
		            <p class="last">Our goal is to be recognized as the premiere, full 
		            services real estate firm in Playa del Carmen. This translates to 
		            you, our client, receiving our full attention with the purpose of 
		            assisting you in achieving your dream. It is a lofty aspiration 
		            and one we take seriously.
		            </p>
		        </div>
		        <div class="grid_6">
		            <p>We offer all aspects of traditional real estate purchase and 
		            sale services and include every detail attended to with your best 
		            interests in mind. We have deep and broad knowledge of the unique 
		            aspects of the Mexican property transaction system and have 
		            established relationships with professionals that can assist. 
		            Lawyers, notaries, accountants, tax advisors and property management 
		            professionals are available that have solid reputations and can 
		            address your every need.<br>
		            
		            We also have a marketing division that focuses on assisting developers 
		            in bringing their product to market, whether it be single family homes, 
		            condominium buildings or land subdivisions. Please refer to the links 
		            provided to be put in contact with professionals who can help you decide 
		            on the right product for the current market needs.<br>
		            Should you require the need of full project management services, that 
		            too is available. Let us work with you to design a program that will 
		            fit your every need.
		            
		            </p>
		        </div>
		    </div>
		</div>
		<?php
		$wideBody = ob_get_contents();
        ob_end_clean();
		return $wideBody;
    }
    
	/**
	 * getSwipes
	 * 
	 * returns the sliders for the mainSection
	 * 
	 * @return string
	 */    	
	public function getSwipes()
	{
		ob_start();
		if ($this->data['mainSliders'])
		{
			foreach($this->data['mainSliders'] as $a)
			{
				$link = 'javascript:void(0)';
				if ($a['link'])
				$link = $a['link'];
				?>
				<div data-src="/img-up/main-gallery/front/<?php echo $a['name']; ?>">
			        <div class="camera_caption">
			        <?php
					if ($a['promos'])
					{
						?>
			            <div class="container">
			                <div class="camera_caption_block">
			                    <h3 class="camera_caption_block_title"><?php echo $a['promos']; ?></h3>
			                    <a href="<?php echo $link; ?>">Details <i class="fa fa-angle-double-right"></i> </a>
			                </div>
			            </div>
			           <?php
					}
					?>
			        </div>
			    </div>
				<?php 
			}
		}
		$slides = ob_get_contents();
		ob_end_clean();
		return $slides;
	}
    
	/**
	 * getVideosIndex
	 * 
	 * return the list of videos for the main section
	 * 
	 * @return string
	 */
	public function getVideosIndex()
	{
		ob_start();
		foreach ($this->data['lastTwoVideos'] as $video)
		{
			echo self::getIndexItemVideo($video);
		}
		$videolist = ob_get_contents();
		ob_end_clean();
		return $videolist;
	}
    
	/**
	 * getIndexItemVideo
	 * 
	 * return only one item for the main section videos, it's different from the 
	 * other videos
	 * 
	 * @return string
	 */
	public function getIndexItemVideo($video)
	{
		ob_start();
		$image = str_replace('2.jpg', 'mqdefault.jpg', $video['image']);
		?>
		<div class="item">
			<div class="thumb"> 
				<a  rel="vimeo" href="https://www.youtube.com/watch?v=<?php echo $video['youtube']; ?>" class="swipebox-video">
					<img src="<?php echo $image; ?>" 
							alt="<?php $video['title']; ?>"
							/>
				</a>
			</div>
			<span><?php echo $video['duration']; ?></span>
			<div class="clr"></div>
			<a href="http://www.youtube.com/watch?v=<?php echo $video['youtube']; ?>"
					target="_blank" 
					class="title swipebox-video">
				<?php echo $video['title']; ?>
			</a>
			<div class="clr"></div>
		</div>
		<?php	    
		$items = ob_get_contents();
		ob_end_clean();
		return $items;
	}
	
	/**
	 * getFacebookIndex
	 * 
	 * return the facebook bar for the index
	 * 
	 * @return string
	 */
	public function getFacebookIndex()
	{
		ob_start();
		?>
		<div class="fb-like-box" data-href="http://www.facebook.com/<?php echo $this->data['appInfo']['facebook']; ?>"
			data-width="300" data-height="470" data-show-faces="true"
			data-colorscheme="dark" style="color: #111; " 
			data-stream="true" data-show-border="false" data-header="false">
		</div>
		<?php 
		$facebookIndex = ob_get_contents();
		ob_end_clean();
		return $facebookIndex;
	}
    
	/**
	 * getTwitterIndex
	 * 
	 * returns the html for the twitter on the index
	 * 
	 * @return string
	 */
	public function getTwitterIndex()
	{
		ob_start();
		?>
	    <div class="clr"></div>
	    <div id="twitter">
		    <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/<?php $this->data['appInfo']['facebook']; ?>" data-widget-id="373534020283273216">
		    	Tweets by @<?php echo $this->data['appInfo']['facebook']; ?>
		    </a>
			<script>
				!function(d,s,id){
					var js,
					fjs=d.getElementsByTagName(s)[0],
					p=/^http:/.test(d.location)?'http':'https';
					if(!d.getElementById(id))
					{
						js=d.createElement(s);
						js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
						fjs.parentNode.insertBefore(js,fjs);
					}
				}(document,"script","twitter-wjs");
			</script>
	    </div><!-- /Twitter -->
        <?php
        $twitter_box = ob_get_contents();
        ob_end_clean();
        return $twitter_box;
    }
	
	/**
	 * getItemsPromoted
	 * 
	 * return the four manPromoted companies for show at the main section
	 * 
	 * @return string
	 */
    public function getItemsPromoted()
    {
    	ob_start();
    	foreach ($this->data['mainPromoted'] as $company)
    	{
    	?>
        <div class="grid_3">
            <div class="box">
                <div class="maxheight">
                    <?php
            			if (!$company['logo'])
            			{
            			?>
            			<img src="images/default_item_front.jpg" 
            			    alt="<?php echo $company['name']; ?>"
    			        />
            			<?php
            			}
            			else
            			{
            			?>
            			<img src="img-up/companies_pictures/logo/<?php echo $company['logo']; ?>" 
            			    alt="<?php echo $company['name']; ?>"
    			        />
            			<?php
            			}
            		?>
                    <div class="info-col_text-block">
                        <h4><?php echo $company['name']; ?></h4>
                        <p><?php echo $company['description']; ?></p>
                        <a href="/property/<?php echo $company['category_id']; ?>/<?php echo Tools::slugify($company['category_name']); ?>/<?php echo $company['company_id']; ?>/<?php echo Tools::slugify($company['name']); ?>/" class="btn">more</a>
                    </div>
                </div>
            </div>
        </div>
    	<?php
    	}
    	$items = ob_get_contents();
    	ob_end_clean();
    	return $items;
    }
    
    /**
     * getCoverHead
     * 
     * returns the header content for the view of categories and subcategories
     * 
     * @param string $css
     * @param string $js
     * @return string
     */
    public function getCoverHead()
    {
    	ob_start();
    	?>
		<title><?php echo $this->data['categoryInfo']['title']; ?> <?php echo $this->data['subcategoryInfo']['name']; ?> | <?php echo $this->data['appInfo']['title']; ?> </title>
		<meta name="keywords" content="<?php echo $this->data['appInfo']['keywords']; ?>, <?php echo $this->data['categoryInfo']['name'].' '.$this->data['subcategoryInfo']['name']; ?>" />
		<?php
		if ($this->data['categoryInfo']['description'])
		{
			if ($subcategory['description'])
			{
			?>
		<meta name="description" content="<?php echo $subcategory['description']; ?>">
			<?php
			}
			else
			{
			?>
		<meta name="description" content="<?php echo $this->data['categoryInfo']['description']; ?>">
			<?php
			}
		}
		else
		{
		?>
		<meta name="description" content="<?php echo $this->data['appInfo']['description']; ?>" />
		<?php
		}
		?>	
		<meta property="og:type" content="website" /> 
		<meta property="og:url" content="<?php echo $this->data['appInfo']['url']; ?>" />
		<meta property="og:site_name" content="<?php echo $this->data['appInfo']['siteName']; ?> />
		<link rel='canonical' href="<?php echo $this->data['appInfo']['url']; ?>" />
		<?php echo self::getCommonDocuments(); ?>
		<?php echo self::getGoogleAnalytics(); ?>
		<?php
		$head = ob_get_contents();
		ob_end_clean();
		return $head;
	}   
	
	/**
	 * getCoverContent
	 * 
	 * it's basically the grid for the cover section
	 * 
	 * @return string
	 */
	public function getCoverContent()
	{
		ob_start();
		?>
		<div class="container gallery">
    		<?php echo self :: getGridCompanies(); ?>
    	</div>
		
		
		<?php
		$coverBody = ob_get_contents();
		ob_end_clean();
		return $coverBody;
	}
	
	/**
	 * getGridCompanies
	 * 
	 * companies grid, depending of category, subcategory or location
	 * 
	 * @return string
	 */
	
	public function getGridCompanies()
	{
		ob_start();
		?>
		<h3 class="row_title__first"><?php echo $this->data['categoryInfo']['title']; ?></h3>
		<!-- <h5><?php echo $this->data['appInfo']['siteName']; ?></h5> -->
		
		<ul class="row thumbs">
			<?php
				foreach ($this->data['companies'] as $c)
				{
					?>
					<li class='grid_3'>
						<?php 
						if ($c['closed'] == 1) 
						{
							?>
						<div class="closed">closed</div>
							<?php 
						}
 
						$link = '';
						if ($this->data['subcategoryInfo']) 
						{
							$link = "/property/".$c['category_id']."/".Tools::slugify($c['category'])."/".$this->data['subcategoryInfo']['subcategory_id']."/".Tools::slugify($this->data['subcategoryInfo']['name'])."/".$c['company_id']."/".Tools::slugify($c['name'])."/";
						} else if ($this->data['section'] == 'allEvents' && $this->data['events']) {
							$link = "/events/".$c['company_id']."/".Tools::slugify($c['company_name'])."/".Tools::slugify($c['date'])."/".$c['event_id']."/".Tools::slugify($c['name'])."/"; 
						} else {
							$link = "/property/".$c['category_id']."/".Tools::slugify($c['category'])."/".$c['company_id']."/".Tools::slugify($c['name'])."/";
						}
						?>
						<div class="box">
			                <div class="maxheight">
			                    <a href="<?php echo $link; ?>" >
			                        <div>
			                            <div class="lbHover">
			                                <i class="fa fa-search"></i>
			                            </div>
			                            <?php 
										if ($c['logo'])
										{
										?>
										    <img src="/img-up/companies_pictures/logo/<?php echo $c['logo']; ?>" 
										        alt="<?php echo $c['name']; ?>" class="protip_li_img"/>
										<?php
										}
										else
										{
										?>
											<img src="/images/default_item_front.jpg" 
											    alt="<?php echo $c['name']; ?>"  class="protip_li_img"/>
										<?php
										}
										?>
			                        </div>
			                    </a>
			                    <div class="gallery_text-block">
			                        <p class="p-title"><a href="<?php echo $link; ?>"><?php echo $c['name']; ?></a></p>
			                        <p><?php echo $c['description']; ?></p>
			                    </div>
			                </div>
			            </div>
					</li>
					<?php
				}
				?>
		</ul>
		<?php
		$gridCompanies = ob_get_contents();
		ob_end_clean();
		return $gridCompanies;
	}
	
	/**
	 * getMenuLeft
	 * 
	 * this is the menu that shows the subcategories
	 * 
	 * @return string
	 */
	public function getMenuLeft()
	{
		ob_start();
		?>
		<div id="menu-left">
			<?php
			if ($this->data['subcategories'])
			{
			?>	
			<div id="subcategories_list">
				<ul>
					<?php					
					foreach ($this->data['subcategories'] as $s)
					{ 
					?>
					<li>
						<a href="/<?php echo $this->data['categoryInfo']['category_id'].'/'.Tools::slugify($this->data['categoryInfo']['name']).'/'.$s['subcategory_id'].'/'.Tools::slugify($s['name']); ?>/">
							<?php echo $s['name']; ?>
						</a>
					</li>
					<?php
					}
					?>
				</ul>
			</div>
			<?php
			}
			 
			if ($this->data['locationInfo'])
			{
			?>	
			<div id="subcategories_list">
				<ul>
					<?php					
					foreach ($this->data['categories'] as $c)
					{ 
					?>
					<li>
						<a href="/<?php echo $c['category_id'].'/'.Tools::slugify($c['name']); ?>/">
							<?php echo $c['name']; ?>
						</a>
					</li>
					<?php
					}
					?>
				</ul>
			</div>
			<?php
			}
		
			if ($this->data['section'] == 'other')
			{
			?>
			<div id="subcategories_list" class="other-option-menu">
				<ul>
					<?php					
					foreach ($this->data['categories'] as $c)
					{ 
					?>
					<li>
						<a href="/<?php echo $c['category_id'].'/'.Tools::slugify($c['name']); ?>/">
							<?php echo $c['name']; ?>
						</a>
					</li>
					<?php
					}
					?>
				</ul>
			</div>
			<?php
			}

			if ($this->data['section'] == 'allEvents' && $this->data['events'])
			{
				?>
			<div id="subcategories_list" class="other-option-menu">
				<ul>
				<?php 
				foreach ($this->data['events'] as $years)
				{
					?>
					<li class="year">
					<?php echo $years['year']; ?>
						<ul class="month">
						<?php 
						foreach ($years['months'] as $months)
						{
							?>
							<li>
							<?php echo $months['month']; ?>
								<ul class="day">
								<?php 
								foreach ($months['events'] as $events)
								{
									?>
									<li>
										&raquo; 
										<a href="/events/<?php echo $events['belong_company']; ?>/<?php echo Tools::slugify($events['company_name']); ?>/<?php echo Tools::slugify($events['date']); ?>/<?php echo $events['company_id']; ?>/<?php echo Tools::slugify($events['name']); ?>/">
											<?php echo $events['name']; ?>
										</a>
									</li>
									<?php
								}
								?>
								</ul>
							</li>
							<?php
						}
						?>
						</ul>
					</li>
					<?php
				}
				?>
				</ul>
			</div>
				<?php
			}
			?>
		</div>
		<?php
		$menuLeft = ob_get_contents();
		ob_end_clean();
		return $menuLeft;
	}
	
	/**
	 * getCompanyHead
	 * 
	 * Returns the header for th company section, the script on it it's for the maps
	 * which i cannot embeb in a diferent js document, by now, btw.
	 * 
	 * @return string
	 */
	public function getCompanyHead()
	{
		ob_start();
		?>
		<title><?php echo $this->data['company']['seo']['title']; ?> | <?php echo $this->data['appInfo']['title']; ?></title>
		<meta name="keywords" content="<?php echo $this->data['company']['seo']['keywords']; ?>" />
		<meta name="description" content="<?php echo $this->data['company']['seo']['description']; ?>" />
		<meta property="og:type" content="website" /> 
		<meta property="og:url" content="<?php echo $this->data['appInfo']['url']; ?>" />
		<meta property="og:site_name" content="<?php echo $this->data['appInfo']['siteName']; ?> />
		<link rel='canonical' href="<?php echo $this->data['appInfo']['url']; ?>" />
		
		<?php echo self::getCommonDocuments(); ?>
		
		<script src="/js/front/jquery.swipebox.js"></script>
     	<link rel="stylesheet" href="/css/front/swipebox.css">
		<script type="text/javascript">
		;( function( $ ) {
		
		    $( '.swipebox' ).swipebox( {
		        useCSS : true, // false will force the use of jQuery for animations
		        hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
		        hideBarsDelay : 3000, // delay before hiding bars on desktop
		        loopAtEnd: false // true will return to the first image after the last image is reached
		    } );
		
		} )( jQuery );
		</script>
		<?php echo self::getGoogleAnalytics(); ?>
		
		<?php
        $head = ob_get_contents();
        ob_end_clean();
        return $head;
    }
	
    /**
     * getMapCompanyGlobe
     * 
     * returns the item of the globe for the map, by a given lat and long, it 
     * also shows the logo, title and description, as links
     * 
     * @return string
     */
    public function getMapCompanyGlobe()
    {
    	ob_start();
    	?>
	    '<div class="map-company-globe">' +
		    '<div class="map-company-globe-box">' +
			    '<div class="header">' +
				    '<a href="/company/<?php echo $this->data['company']['general']['category'].'/'.Tools::slugify($this->data['company']['general']['category_name']).'/'.$this->data['company']['general']['company_id'].'/'.Tools::slugify($this->data['company']['general']['name']).'/'; ?>">' +
				    '	<?php echo $this->data['company']['general']['name']; ?>' +
				    '</a>' +
			    '</div>' +
			    '<div class="content">' +
				    '<div class="left">' +
					    '<a href="/company/<?php echo $this->data['company']['general']['category'].'/'.Tools::slugify($this->data['company']['general']['category_name']).'/'.$this->data['company']['general']['company_id'].'/'.Tools::slugify($this->data['company']['general']['name']).'/'; ?>">' +
					    	'<img alt="<?php echo $this->data['company']['general']['name']; ?>" src="/img-up/companies_pictures/logo/<?php echo $this->data['company']['logo']; ?>">'+
					    	'<?php echo trim(preg_replace('/\s+/', ' ',str_replace(array("'"), "",$this->data['company']['seo']['description']))); ?>' +
					    '</a>'+
				    '</div>' +
				    '<div class="clr"></div>'+
			    '</div>' +
			    '<div class="clr"></div>'+
		    '</div>'+
	    '</div>';
	    <?php 
	    $globe = ob_get_contents();
	    ob_end_clean();
	    return $globe;
    }
    
    /**
     * getCompanyContent
     * 
     * this section returs the content for the map section, it is a listing pins 
     * of all the companies that has their location 
     * 
     * @return string
     */
	public function getCompanyContent()
	{
		ob_start();
		?>
		<!--======= Content ================================-->

		<div class="container">
		    <div class="row">
		        <div class="grid_12 blog">                                       
		        	<!--========= Blog =========-->
		            <h3 class="row_title__first"><?php echo $this->data['company']['general']['name']; ?></h3>
		            <div class="post row">
		                <div class="grid_12">
		                <p class="p-title"><strong><?php echo $this->data['company']['general']['name']; ?></strong></p>
		                <br><br>
		
		                <p class="p-title">
		
		
		                <?php echo stripslashes($this->data['company']['general']['description']); ?>
		                    
		                 </p>
		                </div>
		
		                <div class="grid_12 gallery_to">
							<?php
							foreach($this->data['company']['gallery'] as $g)
							{
							?>
							<div class="image">
								<a href="/img-up/companies_pictures/original/<?php echo $g['picture']; ?>" alt="<?php echo $general['name']; ?>" class="swipebox">
		                        	<img src="/img-up/companies_pictures/galery/<?php echo $g['picture']; ?>" 
												alt="<?php echo $this->data['company']['general']['name']; ?>">
		                   		</a>
		                   	</div>
							<?php
							}
							?>
		                   
		                </div>
		            </div>
		        </div>
		        
		    </div>
		</div>
		
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
	
	/**
	 * getCompanyArticle
	 * 
	 * returns the left section of the company, is where the slider, content and
	 * gallery are located
	 * 
	 * @return string
	 */
	public function getCompanyArticle()
	{
		ob_start();
		?>
		<article class="tip-panel" id="mnwcog">
			<header class="tip-header">
				<h1 class="tip-title" id="companyName"><?php echo $this->data['company']['general']['name']; ?></h1>
				<p class="views">
					<span>
						<?php echo $this->data['company']['general']['category_name']; ?>
						<?php 
						if ($this->data['company']['subcategoryInfo'])
						{
							echo " / ".$this->data['company']['subcategoryInfo']['name'];
						}
						
						if ($this->data['event']['detail'])
						{
							echo Tools::formatMYSQLToFront($this->data['event']['detail']['date']);
							if ($this->data['event']['detail']['date'].' hrs')
								echo ' / '.Tools::formatHourMYSQLToFront($this->data['event']['detail']['time']);
						}
						?> 
					</span>
				</p>
				<?php 
				if ($this->data['belongCompany'])
				{
					$link = "/company/".$this->data['belongCompany']['category']."/".Tools::slugify($this->data['belongCompany']['categoryName'])."/".$this->data['belongCompany']['belongCompanyId']."/".Tools::slugify($this->data['belongCompany']['belongCompanyName'])."/";
					?>
				<div>
					<div class="belong-company">
						<img alt="Ukraine" src="/img-up/companies_pictures/logo/<?php echo $this->data['belongCompany']['logo']; ?>">
						<div class="belong-company-layer">
							<a href="<?php echo $link; ?>">
								<img alt="" class="belong-company-logo" src="/img-up/companies_pictures/logo/<?php echo $this->data['belongCompany']['logo']; ?>">
							</a>
							<div class="bc-right">
								<h1 itemprop="name"><a href="<?php echo $link; ?>"><?php echo $this->data['belongCompany']['info']['title']; ?></a></h1>
								<p class="location">
									<?php echo $this->data['belongCompany']['info']['description']; ?>
								</p>
							</div>
							<div class="user-pro-tip cf">
								<a class="pro-tip-number">
									<span><?php echo $this->data['belongCompany']['totalEvents']; ?></span>
									Events
								</a>
							</div>
						</div>
					</div>
				</div>
					<?php
				}	
				?>			
			</header>
					
			<div class="tip-content">
				
				<div id="description_prev">
					<?php echo stripslashes($this->data['company']['general']['description']); ?>
				</div>
									
				<div id="company-gallerys">
					<div id="extra-content-box">
						<div id="extra-content">
							<div id="company-gallery">
							
							<div class="clr"></div>
							</div>
						</div>
					</div>
											
					<div class="clr"></div>
				</div>
				<div class="clr"></div>
				<!--<h3>Videos</h3>-->
				<?php
				if (is_numeric($this->data['company']['general']['latitude']) && is_numeric($this->data['company']['general']['longitude']))
				{
					if ($this->data['company']['general']['latitude'] !=  0 && $this->data['company']['general']['longitude'] != 0)
					{
				?>					
				<div id="map_canvas"></div>
				<?php 
					}
				}
				?>					
				<div class="clr"></div>
								
			</div> <!-- /tip-content -->
		</article> <!--/article tip-panel -->
		<?php
		$article = ob_get_contents();
		ob_end_clean();
		return $article;
	}
	
	/**
	 * getSideBar
	 * 
	 * is the right section of the company content, where is the logo, networks, contact
	 * and others... 
	 * 
	 * @return string
	 */
	public function getSideBar()
	{
		ob_start();
		?>
		<aside class="tip-sidebar">
			<div class="user-box">
				<div class="team-box" >
					<div class="image-top">
						<img alt="<?php echo $this->data['company']['general']['name']; ?>" src="/img-up/companies_pictures/logo/<?php echo $this->data['company']['logo']; ?>" />
					</div>
				</div>
				<p class="bio">
					<?php echo $this->data['company']['seo']['title']; ?>
				</p>
				<p class="bio">
					<?php echo stripslashes($this->data['company']['seo']['description']); ?>
				</p>
			</div><!-- /user-box -->
			<div class="side-btm">
				<?php 
				if ($this->data['events'])
				{
					?>
				<div class="events-list">
					<h3>Events</h3>
					<ul>
					<?php 
					foreach ($this->data['events'] as $years)
					{
						?>
						<li class="year">
						<?php echo $years['year']; ?>
							<ul class="month">
							<?php 
							foreach ($years['months'] as $months)
							{
								?>
								<li>
								<?php echo $months['month']; ?>
									<ul class="day">
									<?php 
									foreach ($months['events'] as $events)
									{
										?>
										<li>&raquo; 
											<a href="/events/<?php echo $events['company_id']; ?>/<?php echo Tools::slugify($events['name']); ?>/<?php echo Tools::slugify($events['date']); ?>/<?php echo $events['event_id']; ?>/<?php echo Tools::slugify($events['name']); ?>/">
												<?php echo $events['name']; ?>
											</a>
										</li>
										<?php
									}
									?>
									</ul>
								</li>
								<?php
							}
							?>
							</ul>
						</li>
						<?php
					}
					?>
					</ul>
				</div>
					<?php
				}
				?>
				
				<h3>Networks</h3>
				<ul class="side-bar-list side-bar-networks">
					<div class="clr"></div>
					
					<nav class="social-networks-box">
						<ul>
							<?php 
							if ($this->data['company']['social']['facebook'])
							{
								?>
							<li>
								<a href="http://www.facebook.com/<?php echo $this->data['company']['social']['facebook']; ?>/" target="_blank">
									<img src="/images/facebook.png" alt="<?php echo $this->data['company']['general']['name']; ?> - Facebook">
								</a>
							</li>
								<?php 
							}
							?>
							
							<?php 
							if ($this->data['company']['social']['tuit_url'])
							{
								?>
							<li>
								<a href="http://www.twitter.com/<?php echo $this->data['company']['social']['tuit_url']; ?>/" target="_blank">
									<img src="/images/twitter.png" alt="<?php echo $this->data['company']['general']['name']; ?> - Twitter">
								</a>
							</li>
								<?php 
							}
							?>
							
							<?php 
							if ($this->data['company']['social']['youtube'])
							{
								?>
							<li>
								<a href="http://www.youtube.com/user/<?php echo $this->data['company']['social']['facebook']; ?>/" target="_blank">
									<img src="/images/youtube.png" alt="<?php echo $this->data['company']['general']['name']; ?> - Youtube">
								</a>
							</li>
								<?php 
							}
							?>
							
							<?php 
							if ($this->data['company']['social']['pinterest'])
							{
								?>
							<li>
								<a href="http://www.pinterest.com/<?php echo $this->data['company']['social']['pinterest']; ?>/" target="_blank">
									<img src="/images/pinterest.png" alt="<?php echo $this->data['company']['general']['name']; ?> - Pinterest">
								</a>
							</li>
								<?php 
							}
							?>

							<?php 
							if ($this->data['company']['social']['instagram'])
							{
								?>
							<li>
								<a href="http://instagram.com/<?php echo $this->data['company']['social']['instagram']; ?>/" target="_blank">
									<img src="/images/instagram.png" alt="<?php echo $this->data['company']['general']['name']; ?> - Instagram">
								</a>
							</li>
								<?php 
							}
							?>
							
							<div class="clr"></div>
						</ul>
					</nav>
				
					<div class="clr"></div>
					<?php
					if ($this->data['company']['social']['facebook'])
					{
					?>
					<div class="fb-like-box" id="facebook-companies" data-href="http://www.facebook.com/<?php echo $this->data['company']['social']['facebook']; ?>"
							data-width="244" data-height="350" data-show-faces="true"
							data-colorscheme="dark" style="background-color: #373737;" 
							data-stream="true" data-show-border="false" data-header="false">
					</div>
					<?php	
					}
					?>
				</ul>
				<div class="team-box">
					<div class="image-top">
						<img alt="<?php echo $this->data['company']['seo']['title']; ?>" src="/img-up/companies_pictures/sliders/<?php echo $this->data['company']['lastSlider']; ?>">
					</div>
					<div class="content">
						<h4>Contact Info</h4>
						<?php 
						foreach ($this->data['company']['emails'] as $e)
						{
						?>
						<p><?php echo $e['e_mail']; ?></p>
						<?php
						}
							    						
						foreach ($this->data['company']['phones'] as $p)
						{
						?>
						<a href="tel:<?php echo $p['telephone']; ?>" ><?php echo $p['telephone']; ?></a>
						<div class="clr"></div>
						<?php
						}
						?>
						
						<a href="<?php echo $this->data['company']['general']['website']; ?>" target="_blank" >
							<?php echo $this->data['company']['general']['website']; ?>
						</a>
						<div class="clr"></div>
					</div>
				</div>
				
				<?php 
				if ($this->data['company']['subcategoryInfo'])
				{
					$link = "/".$this->data['company']['general']['category']."/".Tools::slugify($this->data['company']['general']['category_name'])."/".$this->data['company']['subcategoryInfo']['subcategory_id']."/".Tools::slugify($this->data['company']['subcategoryInfo']['name'])."/";
					?>
				<ul class="companies-list">
					<a class="feature-jobs track" data-action="upgrade team" data-from="protip page" href="<?php echo $link; ?>">
						<?php echo $this->data['company']['subcategoryInfo']['name']; ?>
					</a>
					<?php
					foreach ($this->data['companies'] as $c)
					{
						$link = "/company/".$this->data['company']['general']['category']."/".Tools::slugify($this->data['company']['general']['category_name'])."/".$this->data['company']['subcategoryInfo']['subcategory_id']."/".Tools::slugify($this->data['company']['subcategoryInfo']['name'])."/".$c['company_id']."/".Tools::slugify($c['name'])."/";
					?>
					<li><a href="<?php echo $link; ?>">&raquo; <?php echo $c['name']; ?></a></li>
					<?php 
					}
					?>
				</ul>
					<?php
				}
				?>
				
				<?php 
				if ($this->data['subcategories'])
				{
					$link = "/".$this->data['company']['general']['category']."/".Tools::slugify($this->data['company']['general']['category_name'])."/";
					?>
				<ul class="companies-list">
					<a class="feature-jobs track" data-action="upgrade team" data-from="protip page" href="<?php echo $link; ?>">
						<?php echo $this->data['company']['general']['category_name']; ?>
					</a>
					<?php
					foreach ($this->data['subcategories'] as $s)
					{
						$link = "/".$this->data['company']['general']['category']."/".Tools::slugify($this->data['company']['general']['category_name'])."/".$s['subcategory_id']."/".Tools::slugify($s['name'])."/";
					?>
					<li><a href="<?php echo $link;?>">&raquo; <?php echo $s['name']; ?></a></li>
					<?php 
					}
					?>
				</ul>
					<?php
				}
				?>
				
				<?php 
				if ($this->data['categories'])
				{
					?>
				<ul class="companies-list">
					<a class="feature-jobs track" data-action="upgrade team" data-from="protip page" href="/">
						Find more
					</a>
					<?php
					foreach ($this->data['categories'] as $c)
					{
						$link = "/".$c['category_id']."/".Tools::slugify($c['name'])."/";
					?>
					<li><a href="<?php echo $link;?>">&raquo; <?php echo $c['name']; ?></a></li>
					<?php 
					}
					?>
				</ul>
					<?php
				}
				?>
			</div> <!-- /side-btm -->
		</aside><!-- right side -->
		<?php
		$sideBar = ob_get_contents();
		ob_end_clean();
		return $sideBar;
	}
	
    /**
     * getMapHead
     * 
     * is the head section for the maps, it also generates an script for the map 
     * array, and calls the globe.
     * 
     * @return string
     */        
	public function getMapHead()
	{
		ob_start();
		?>
		
		<title><?php echo $this->data['appInfo']['title']; ?> | Map of the companies</title>
		
		<meta name="keywords" content="<?php echo $this->data['appInfo']['keywords']; ?>" />
		<meta name="description" content="<?php echo $this->data['appInfo']['description']; ?>" />
		<meta property="og:type" content="website" /> 
		<meta property="og:url" content="<?php echo $this->data['appInfo']['url']; ?>" />
		<meta property="og:site_name" content="<?php echo $this->data['appInfo']['siteName']; ?> />
		<link rel='canonical' href="<?php echo $this->data['appInfo']['url']; ?>" />
		<?php echo self::getCommonDocuments(); ?>
		<?php echo self::getGoogleAnalytics(); ?>
			
		<script type="text/javascript"
			src="https://maps.google.com/maps/api/js?sensor=true">
		</script>
				
		<script type="text/javascript">
		function initialize() {
					
			var locations = [
			<?php
			$i = 0;
			
			foreach ($this->data['companies'] as $c)
			{
				$i++;
				?>
				[<?php echo self::getMapGeneralGlobe($c['category'], $c['category_name'], $c['company_id'], $c['name'], $c['logo'], $c['seo_description']); ?>, <?php echo $c['latitude']; ?>, <?php echo $c['longitude']; ?>, <?php echo $i; ?>],
				<?php
			}
			?>
			];
		
			var map = new google.maps.Map(document.getElementById('general_map'), {
			  zoom: 10,
			  center: new google.maps.LatLng(20.6348323822,-87.0751495361),
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			});
		
			var infowindow = new google.maps.InfoWindow();
	
			var marker, i;
		
			for (i = 0; i < locations.length; i++) {  
			  	marker = new google.maps.Marker({
					position: new google.maps.LatLng(locations[i][1], locations[i][2]),
					map: map
			  });
		
				  google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infowindow.setContent(locations[i][0]);
						infowindow.open(map, marker);
					}
				  })(marker, i));
			}
		}
			
		$(document).ready(function() {
			initialize();
		});
		</script>
        <?php
        $head = ob_get_contents();
        ob_end_clean();
        return $head;
    }	
	
    /**
     * getMapCompanyGlobe
     *
     * retunrs the globe item where it's displayed the logo, the description and
     * the title of the companies, also it's a link for it's company view
     *
     * @return string
     */
    public function getMapGeneralGlobe($categoryId, $categoryName, $companyId, $name, $logo, $description)
    {
    	ob_start();
    	?>
	    '<div class="map-company-globe">' +
		    '<div class="map-company-globe-box">' +
			    '<div class="header">' +
				    '<a href="/company/<?php echo $categoryId.'/'.Tools::slugify($categoryName).'/'.$companyId.'/'.Tools::slugify($name).'/'; ?>">' +
				    	'<?php echo $name; ?>' +
				    '</a>' +
			    '</div>' +
			    '<div class="content">' +
				    '<div class="left">' +
					    '<a href="/company/<?php echo $categoryId.'/'.Tools::slugify($categoryName).'/'.$companyId.'/'.Tools::slugify($name).'/'; ?>">' +
					    	'<img alt="<?php echo $name; ?>" src="/img-up/companies_pictures/logo/<?php echo $logo; ?>">'+
					    '<?php echo trim(preg_replace('/\s+/', ' ',str_replace(array("'"), "",$description))); ?>'+
					    '</a>'+
				    '</div>' +
				    '<div class="clr"></div>'+
			    '</div>' +
			    '<div class="clr"></div>'+
		    '</div>'+
	    '</div>'
	    <?php 
	    $globe = ob_get_contents();
	    ob_end_clean();
	    return $globe;
    }

    /**
     * getMapContent
     * 
     * it returns the HTML string for the map section
     * 
     * @return string
     */
    public function getMapContent()
    {
    	ob_start();
    	?>
    	<?php echo self :: getBackground(); ?>
    	<div id="main-grid" class='inside cf'>
			<div class="main-wrapper-bg" style="">
		    	<div id="wrapper">
		    		<div id="content">
		    			<div id="box_map">
		    				<div id="general_map"></div>
		    			</div>
		    		</div>
		    		<div class="clr"></div>
		    	</div>
    		</div>
			<div class="clr"></div>
		</div>	
    	<?php
    	$coverBody = ob_get_contents();
    	ob_end_clean();
    	return $coverBody;
    }
    
    /**
     * getVideosHead
     *
     * is the head section for the videos
     *
     * @return string
     */
    public function getVideosHead()
    {
    	ob_start();
    	?>
    	<title><?php echo $this->data['appInfo']['title']; ?> | Videos</title>
    	
    	<meta name="keywords" content="<?php echo $this->data['appInfo']['keywords']; ?>" />
    	<meta name="description" content="<?php echo $this->data['appInfo']['description']; ?>" />
    	<meta property="og:type" content="website" /> 
    	<meta property="og:url" content="<?php echo $this->data['appInfo']['url']; ?>" />
    	<meta property="og:site_name" content="<?php echo $this->data['appInfo']['siteName']; ?> />
    	<link rel='canonical' href="<?php echo $this->data['appInfo']['url']; ?>" />
    	<?php echo self::getCommonDocuments(); ?>
    	<?php echo self::getGoogleAnalytics(); ?>
    	<script type="text/javascript" src="/js/front/jquery.swipebox.js"></script>
		<script type="text/javascript" src="/js/front/init-swipe-box-videos.js"></script>
        <?php
        $head = ob_get_contents();
        ob_end_clean();
        return $head;
    }	
	
    /**
     * getVideosContent
     *
     * it's basically the grid for the videos section
     *
     * @return string
     */
    public function getVideosContent()
    {
    	ob_start();
    	?>
    	<?php echo self :: getBackground(); ?>	
    	<div id="main-grid" class='inside cf'>
    		<div class="main-wrapper-bg" style="">
    			<?php echo self :: getMenuLeft(); ?>
    			<?php echo self :: getVideos(); ?>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<?php
    	$coverBody = ob_get_contents();
    	ob_end_clean();
    	return $coverBody;
   	}
    
   	/**
   	 * getVideos
   	 * 
   	 * return an array with all the videos published, ASC order
   	 * 
   	 * @return string
   	 */
	public function getVideos()
	{
		ob_start();
		?>
		<div id="main_contents">
			<h1>
				<a href="/videos/">
					Videos
				</a>
			</h1>
			<div class="clr"></div>
			<h3><?php echo $this->data['appInfo']['siteName']; ?></h3>
			
			<div class="clr"></div>
			
			<ul class="videos swipebox-video">
				<?php 
				foreach ($this->data['videos'] as $video)
				{
				$image = str_replace('2.jpg', 'mqdefault.jpg', $video['image']);
				?>
				<li>
					<article class='protip'>
						<header>
							<div class="img-cover">	
								<a href="https://www.youtube.com/watch?v=<?php echo $video['youtube']; ?>" rel="youtube" class="title">
									<img src="<?php echo $image; ?>"
											alt="<?php $video['title']; ?>"  class="protip_li_img"/>
								</a>
							</div>
						</header>
						<a href="https://www.youtube.com/watch?v=<?php echo $video['youtube']; ?>" rel="youtube" class="title " style="font-size: 1.2em; font-weight: bold;">
							<?php echo $video['title']; ?>
						</a>
						<footer class='cf'>
							<?php echo $video['content']; ?>
						</footer>
					</article>
				</li>
				<?php
				}
				?>
			</ul>
		</div>
		<?php	    
		$videos = ob_get_contents();
		ob_end_clean();
		return $videos;
	}

	/**
	 * getVideosHead
	 *
	 * is the head section for the videos
	 *
	 * @return string
	 */
	public function getContactHead()
	{
		ob_start();
		?>
    	<title><?php echo $this->data['appInfo']['title']; ?> | Contact</title>
    	
    	<meta name="keywords" content="<?php echo $this->data['appInfo']['keywords']; ?>" />
    	<meta name="description" content="<?php echo $this->data['appInfo']['description']; ?>" />
    	<meta property="og:type" content="website" /> 
    	<meta property="og:url" content="<?php echo $this->data['appInfo']['url']; ?>" />
    	<meta property="og:site_name" content="<?php echo $this->data['appInfo']['siteName']; ?> />
    	<link rel='canonical' href="<?php echo $this->data['appInfo']['url']; ?>" />
    	<?php echo self::getCommonDocuments(); ?>
    	<?php echo self::getGoogleAnalytics(); ?>
        <?php
        $head = ob_get_contents();
        ob_end_clean();
        return $head;
    }
    
    /**
     * getContactContent
     *
     * it's basically the grid for the contact section
     *
     * @return string
     */
    public function getContactContent()
    {
    	ob_start();
    	?>
       	<?php echo self :: getBackground(); ?>	
       	<div id="main-grid" class='inside cf'>
       		<div class="main-wrapper-bg" style="">
       			<?php echo self :: getMenuLeft(); ?>
       			<?php echo self :: getContactForm(); ?>
       		</div>
       		<div class="clear"></div>
       	</div>
       	<?php
       	$coverBody = ob_get_contents();
       	ob_end_clean();
       	return $coverBody;
    }
	
    /**
     * getContactForm
     * 
     * the contact form
     * 
     * @return string
     */
    public function getContactForm()
    {
    	ob_start();
    	?>
        <div id="main_contents">
			<h1>
				<a href="/videos/">
					Contact Us
				</a>
			</h1>
			<div class="clr"></div>
			<h3><?php echo $this->data['appInfo']['siteName']; ?></h3>
			
			<div class="clr"></div>
    		<div id="contact_box">
    			<form id="contact-form">
					<div class="success-message">Contact form submitted! <strong>We will be in touch soon.</strong></div>
					<div class="wrapper">
						<label class="name">
							<input id="name" type="text" placeholder="Name*:" data-constraints="@Required @JustLetters" />
							<span class="empty-message">*This field is required.</span>
							<span class="error-message">*This is not a valid name.</span>
						</label>
						<label class="email">
							<input id="email" type="text" placeholder="Email*:" data-constraints="@Required @Email" />
							<span class="empty-message">*This field is required.</span>
							<span class="error-message">*This is not a valid email.</span>
						</label>
						<label class="phone">
							<input id="phone" type="text" placeholder="Phone:" data-constraints="@Required @JustNumbers"/>
							<span class="empty-message">*This field is required.</span>
							<span class="error-message">*This is not a valid phone.</span>
						</label>
					</div>
					<label class="message">
						<textarea id="message" placeholder="Message:" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
						<span class="empty-message">*This field is required.</span>
						<span class="error-message">*The message is too short.</span>
					</label>
					<div  class="form_btns">
						<a href="/#" data-type="reset" class="more_btn">clear</a>
						<a href="/#" data-type="submit" class="more_btn">submit</a>
					</div>  
					<div class="clr"></div
				</form>
    		</div>
    	</div><!-- main sections -->
    	<div class="clr"></div>
        <?php
       	$contactForm = ob_get_contents();
       	ob_end_clean();
    	return $contactForm;
    }
    
	/**
	 * getSearchHead
	 *
	 * is the head section for the videos
	 *
	 * @return string
	 */
	public function getSearchHead()
	{
		ob_start();
		?>
    	<title><?php echo $this->data['appInfo']['title']; ?> | Search</title>
    	
    	<meta name="keywords" content="<?php echo $this->data['appInfo']['keywords']; ?>" />
    	<meta name="description" content="<?php echo $this->data['appInfo']['description']; ?>" />
    	<meta property="og:type" content="website" /> 
    	<meta property="og:url" content="<?php echo $this->data['appInfo']['url']; ?>" />
    	<meta property="og:site_name" content="<?php echo $this->data['appInfo']['siteName']; ?> />
    	<link rel='canonical' href="<?php echo $this->data['appInfo']['url']; ?>" />
    	<?php echo self::getCommonDocuments(); ?>
    	<?php echo self::getGoogleAnalytics(); ?>
        <?php
        $head = ob_get_contents();
        ob_end_clean();
        return $head;
    }

    /**
     * getCompanyContent
     *
     * this section returs the content for the map section, it is a listing pins
     * of all the companies that has their location
     *
     * @return string
     */
    public function getSearchContent()
    {
    	ob_start();
    	?>
    	<?php echo self :: getBackground(); ?>	
		<div id="main-grid" class='inside cf'>
			<div class="main-wrapper-bg" style="">
				<?php echo self :: getMenuLeft(); ?>
				<?php echo self :: getSearchResults(); ?>
			</div>
			<div class="clear"></div>
		</div>
    	<?php
    	$content = ob_get_contents();
    	ob_end_clean();
    	return $content;
    }
    
    /**
     * returns the box content for the results found
     * @return string
     */
	public function getSearchResults()
	{
		ob_start();
        ?>
        <div id="main_contents">
			<h1 style="text-align: left; line-height: 28px;">
				<span>Results for "<?php echo $this->data['searchData']['term']; ?>"</span>
			</h1>
			
			<div class="clr"></div>
			<h3 style="text-align: left;"><?php echo $this->data['appInfo']['siteName']; ?></h3>
		<?php
		if($this->data['companies'])
		{
		?>
			<div id="companies-grid" class='inside cf '>
				<ul class='protips-grid cf'>
				<?php
				foreach($this->data['companies'] as $item)
				{
					echo self::getResItem($item, $this->data['searchData']['term']);
				}
				?>			
				</ul>
			</div>
			
			<div class="clear"></div>
			
			<!-- <div id="pagination">
			<?php
			$nItems = 10;
			$from 	= $this->data['dataSearch']['from'];
			?>
                <ul class="pgn01 grey">
					<?php
					for ($i = 0; $i<=floor($total/$nItems); $i++)
					{
						if (($from/$nItems) == $i)
						{
						?>
						<li class="current">
							<span>
								<?php echo $i+1; ?>
							</span>
						</li>					
						<?php
						}
						else
						{
						?>
						<li>
							<a href="/search/in-all/site/<?php echo Tools::slugify($term).'/'.($nItems*$i); ?>">
								<?php echo $i+1; ?>
							</a>
						</li>
						<?php
						}
					}
					?>
                </ul>
			</div> -->
			<!-- /pagination -->
		<?php
		}
		else
		{
		?>
			<div class="clr"></div>
			<h3 style="text-align: center; color: darkred; margin-top: 50px;"> No results for this term.</h3>
		<?php	
		}
		?>	
        </div><!-- main sections -->
		<div class="clr"></div>
        <?php
        $videolist = ob_get_contents();
        ob_end_clean();
        return $videolist;
	}
	
	/**
	 * items for the search result
	 * @param unknown $r
	 * @param unknown $term
	 * @return string
	 */
	public function getResItem($r, $term)
	{
		ob_start();
		$description 	= strip_tags($r['description']);
		$title 			= $r['name'];
		
		$size 			= strlen($description);
		$pos 			= stripos($description, $term);
		$show 			= '';
		$sizeTerm 		= strlen($term);
		
		if ($pos > -1)
		{
			$preEnd 		= $pos + $sizeTerm;
			$beforeTerm 	= substr($description, 0, $pos - 1);
			$indexSpaces 	= explode(' ', $beforeTerm);;
			$lastWord 		= end($indexSpaces);
			$longLastWord 	= strlen($lastWord);
			$start 			= $pos - $longLastWord;
			$lastLong 		= 150 - $sizeTerm - $longLastWord;
			$end 			= $preEnd + $lastLong;
			$show 			= substr($description, $start - 1, $lastLong);
			$realTerm 		= substr($description, $pos, $sizeTerm);
			$show 			= str_replace($realTerm, '<strong>'.$realTerm.'</strong>', $show);
		}
		else
		{
			$show 			= substr($description, 0, 150);
		}

		$posTitle = stripos($title, $term);
		
		if ($posTitle > -1)
		{
			$realTermTitle 	= substr($title, $posTitle, $sizeTerm);
			$title 			= str_replace($realTermTitle, '<strong>'.$realTermTitle.'</strong>', $title);	
		}
		$link = "/company/".$r['category']."/".Tools::slugify($r['category_name'])."/".$r['company_id']."/".Tools::slugify($r['name'])."/";
		?>
		<li>
			<article class='protip'>
				<header>
					<div class="img-cover">	
					<?php 
					if ($r['logo'])
					{
					?>
						<a href="<?php echo $link; ?>" class="title hyphenate track x-mode-popup" data-action="view protip" data-from="mini protip">
							<img src="/img-up/companies_pictures/logo/<?php echo $r['logo']; ?>" 
								alt="<?php echo $r['name']; ?>" class="protip_li_img"/>
						</a>
					<?php
					}
					else
					{
					?>
						<a href="<?php echo $link; ?>" class="title hyphenate track x-mode-popup" data-action="view protip" data-from="mini protip">
							<img src="/images/default_item_front.jpg" 
								alt="<?php echo $r['name']; ?>"  class="protip_li_img"/>
						</a>
					<?php
					}
					?>
					</div>
				</header>
				<a href="<?php echo $link; ?>"  class="title hyphenate track x-mode-popup" data-action="view protip" data-from="mini protip" >
					<?php echo $title; ?>
				</a>
				<footer class='cf search-tile'>
						<?php echo $show.' ...'; ?>
				</footer>
			</article>
		</li>
		
		<?php
		$item = ob_get_contents();
		ob_end_clean();
		return $item;
	}
	
	/**
	 * getEventsHead
	 *
	 * is the head section for the videos
	 *
	 * @return string
	 */
	public function getAllEventsHead()
	{
		ob_start();
		?>
		<title><?php echo $this->data['appInfo']['title']; ?> | Events</title>
			    	
		<meta name="keywords" content="<?php echo $this->data['appInfo']['keywords']; ?>" />
		<meta name="description" content="<?php echo $this->data['appInfo']['description']; ?>" />
		<meta property="og:type" content="website" /> 
		<meta property="og:url" content="<?php echo $this->data['appInfo']['url']; ?>" />
		<meta property="og:site_name" content="<?php echo $this->data['appInfo']['siteName']; ?> />
		<link rel='canonical' href="<?php echo $this->data['appInfo']['url']; ?>" />
		<?php echo self::getCommonDocuments(); ?>
		<?php echo self::getGoogleAnalytics(); ?>
		    		
		<?php
		$head = ob_get_contents();
		ob_end_clean();
		return $head;
	}
	
	/**
	* getCompanyContent
	*
	* this section returs the content for the map section, it is a listing pins
	* of all the companies that has their location
	*
	* @return string
	*/
	public function getAllEventsContent()
	{
		ob_start();
		?>
		<?php echo self :: getBackground(); ?>	
		<div id="main-grid" class='inside cf'>
			<div class="main-wrapper-bg" style="">
				<?php echo self :: getMenuLeft(); ?>
				<?php echo self :: getGridCompanies(); ?>
			</div>
			<div class="clear"></div>
		</div>
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}	
	
	/**
	 * getVideosHead
	 *
	 * is the head section for the videos
	 *
	 * @return string
	 */
	public function getAboutHead()
	{
		ob_start();
		?>
    	<title><?php echo $this->data['appInfo']['title']; ?> | Videos</title>
    	
    	<meta name="keywords" content="<?php echo $this->data['appInfo']['keywords']; ?>" />
    	<meta name="description" content="<?php echo $this->data['appInfo']['description']; ?>" />
    	<meta property="og:type" content="website" /> 
    	<meta property="og:url" content="<?php echo $this->data['appInfo']['url']; ?>" />
    	<meta property="og:site_name" content="<?php echo $this->data['appInfo']['siteName']; ?> />
    	<link rel='canonical' href="<?php echo $this->data['appInfo']['url']; ?>" />
    	<?php echo self::getCommonDocuments(); ?>
    	<?php echo self::getGoogleAnalytics(); ?>
        <?php
        $head = ob_get_contents();
        ob_end_clean();
        return $head;
    }	
	
    /**
     * getVideosContent
     *
     * it's basically the grid for the videos section
     *
     * @return string
     */
    public function getAboutContent()
    {
    	ob_start();
    	?>
    	<!--======= Content ================================-->

		<!--========= Info =========-->
		
		<div class="container info">
		    <h3 class="info_title row_title__first">Real Estate Riviera Maya</h3>
		    <div class="row thumbs" data-gallery="one">
		        <div class="grid_4 info_block">
		            
		                <div>
		                    <div class="lbHover">
		                        <i class="fa fa-search"></i>
		                    </div>
		                    <img src="/images/page-2_img-1.jpg" alt="" class="info_img__top">
		                </div>
		            
		            <p>Our executive team has a broad range of skills that are available to 
		               assist you in achieving your objectives. Please read below of the 
		               highlights of our professional group
		               </p>
		            <!--   <a href="#" class="btn">more</a>  -->
		        </div>
		        <div class="grid_4 info_block">
		            
		                <div>
		                    <div class="lbHover">
		                        <i class="fa fa-search"></i>
		                    </div>
		                    <img src="/images/page-2_img-2.jpg" alt="" class="info_img__top">
		                </div>
		            
		            <p>In just a few years this small sleepy fishing village has doubled it's 
		               population. With the one of the fastest growing populations of any city 
		               in the world and its location on the Caribbean Sea 
		            </p>
		            <!-- <a href="#" class="btn">more</a> -->
		        </div>
		        <div class="grid_4 info_block">
		           
		                <div>
		                    <div class="lbHover">
		                        <i class="fa fa-search"></i>
		                    </div>
		                    <img src="/images/page-2_img-3.jpg" alt="" class="info_img__top">
		                </div>
		            
		            <p>We are known for developing quality working relationships with our 
		            clients based on respect, integrity, and trust . We pride ourselves 
		            on building a solid foundation for assisting you with all your real estate needs. .
		             </p>
		            <!--   <a href="##" class="btn">more</a> -->
		        </div>
		    </div>
		</div>
		
		
		<div class="container">
		    <div class="row">
		        <div class="grid_8 list">                               <!--========= List =========-->
		            <h3 class="list_title">Important Information.</h3>
		            <div class="list_row">
		                <div class="list_numb">
		                    <span>1.</span>
		                </div>
		                <p class="p-title"><a href="#">Why Consider Mexico</a></p>
		                <p>The US & Canadian media jump on any negative Mexican story - often 
		                   it isn't even verified or correct. And if it is they will always 
		                   bias it towards the negative.
		                </p>
		            </div>
		            <div class="list_row">
		                <div class="list_numb">
		                    <span>2.</span>
		                </div>
		                <p class="p-title"><a href="#">Purchase Procedure for non-mexicans</a></p>
		                <p>Make a written offer containing details of price, dates, conditions, 
		                   items included or excluded, special circumstances, etc. Accompany your letter 
		                   with earnest money check to be used as an example of good faith. Attach a 
		                   Copy of your passport to the offer.
		                   </p>
		            </div>
		            <div class="list_row">
		                <div class="list_numb">
		                    <span>3.</span>
		                </div>
		                <p class="p-title"><a href="#">Why do non mexicans need a trust</a></p>
		                <p>For historical reasons, in 1917 the Mexican Congress considered it a matter of 
		                   national security to limit foreigners from owning property within 100 kilo meters 
		                   (62 Miles) of the borders, and 50 kilo meters (31 Miles) from the coast, this has 
		                   hence been included in the Constitution.
		               </p>
		            </div>
		        </div>
		        <div class="grid_4 info">                           <!--========= Info =========-->
		            <h3 class="info_title">Vacation Rentals</h3>
		            <img src="/images/page-2_img-4.jpg" alt="" class="info_img__top">
		            <p class="p-title"><a href="condos-for-rent.html">See our Listing.</a></p>
		            <p></p>
		        </div>
		    </div>
		</div>
		
		<!--========= Info =========-->
    	<?php
    	$coverBody = ob_get_contents();
    	ob_end_clean();
    	return $coverBody;
   	}
	
}
