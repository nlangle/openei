
<?php
/**
 * BaseTemplate class for the OpenEI skin
 *
 * @ingroup Skins
 */
class OpenEITemplate extends BaseTemplate {
  /**
   * Outputs the entire contents of the page
   */
  public function execute(){
    $this->html( 'headelement' );
    ?>
    <!-- jQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Optional theme <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

    <!-- Web Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Ubuntu:300" rel="stylesheet">

    <!-- OpenEI Skin Header -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container-fluid">
        <!-- Brand and toggle grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo $this->data['nav_urls']['mainpage']['href']; ?>" aria-label="Main Page Link">
            <!--<img class="have2x" src="<?php echo $this->get('logopath'); ?>" alt="OpenEI: Energy Information">-->
            <object alt="OpenEI: Energy Information" height="52" width="165" type="image/svg+xml" data="/w/skins/OpenEI/images/openei_logo.svg" style="pointer-events: none;"></object>
          </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#oeiNavbarCollpase" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <!--<i id="menu-open" class="fa fa-bars" aria-hidden="true"></i>
            <i id="menu-close" class="fa fa-times" aria-hidden="true"></i>-->
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="oeiNavbarCollpase">
          <ul class="nav navbar-nav primary-nav">
            <li><a href="/wiki/Information">Information</a></li>
            <li><a href="/wiki/Data">Data</a></li>
            <li><a href="/wiki/Apps">Apps</a></li>
            <!-- concept for apps dropdown menu
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Apps <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/wiki/RAPID/">RAPID</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo $this->openEIUrl('gdr'); ?>">GDR</a></li>
                <li><a href="<?php echo $this->openEIUrl('mhkdr'); ?>">MHKDR</a></li>
                <li><a href="<?php echo $this->openEIUrl().'/apps/URDB/'; ?>">URDB</a></li>
              </ul>
            </li>-->
          </ul>

          <!-- User Menu -->
          <ul class="nav navbar-nav navbar-right openei-user">
            <li class="dropdown user-menu">
              <a href="my user page" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo $this->userIconType(); ?>
              </a>
              <ul class="dropdown-menu">
                <?php echo $this->userDisplay(); ?>
                <?php echo $this->getUserLinks(); ?>
              </ul>
            </li>
          </ul>

          <!-- Print PDF Button -->
          <div id="printPDFButton" style="display:none;">
            <div class="print">
              <i class="fa fa-print"></i>
            </div>
          </div>

          <!-- OpenEI Search form -->
          <form class="navbar-form navbar-right openei-search" action="/search/" method="get" name="openei-search">
            <div class="form-group">
              <label class="sr-only" for="oeiSearchQuery">Search open E I</label>
              <input type="text" name="q" id="oeiSearchQuery" class="form-control" placeholder="Search">
              <button type="submit" class="btn btn-default btn-search" value="Search" aria-label="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
          </form>

          <?php
            if ($this->data['notspecialpage']){
          ?>

          <!-- Wiki Actions Menu -->
          <div id="pageLinks" class="btn-group <?php echo $this->noAction(); ?>">
            <button type="button" class="btn btn-default dropdown-toggle wiki-actions-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Menu">
              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </button>
            <div class="shadow"></div>
              <ul class="dropdown-menu dropdown-menu-right" role="navigation">
                <?php echo $this->getPageLinks(); ?>
              </ul>
            </div>
          <?php
            } //endif notspecialpage
          ?>

        </div><!-- end .navbar-collapse -->
      </div><!-- end .container-fluid -->
    </nav><!-- end .navbar -->
    
    <!-- Build images -->
    <div id="background-canvas">
      <?php
        $schema = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
        $host = $_SERVER['SERVER_NAME'];
        $unsplash = glob('/var/www/wiki/skins/OpenEI/images/unsplash/backgrounds/*');
        $randomImage = substr($unsplash[rand(0, count($unsplash) - 1)], 43);
        echo '<div id="background-image" class="fade-in" alt="background images sourced from unsplash.com" style="background-image: url('. $schema .''. $host .'/w/skins/OpenEI/images/unsplash/'. $randomImage . '); opacity: 0;"></div>';
      ?>
    </div>
    
    <!-- Begin mediawiki body -->
    <div id="mw-wrapper">
      <?php 
        if ($this->data['notspecialpage']){
      ?>
      <!-- Wiki Actions Menu -->
      <!--<div id="pageLinks" class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle wiki-actions-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Menu">
          <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
        </button>
        <div class="shadow"></div>
        <ul class="dropdown-menu dropdown-menu-right" role="navigation">
          <?php echo $this->getPageLinks(); ?>
        </ul>
      </div>-->
      <?php 
        } //endif notspecialpage
      ?>
          
      <div class="mw-body" role="main">
        <a name="top" id="top"></a>
        <div id="siteNotice"><?php echo $this->get('sitenotice'); ?></div>
        <div id="wikiIndicators"><?php echo $this->getIndicators(); ?></div>
        
        <h1 class="firstHeading" lang="<?php echo $this->get('pageLanguage'); ?>"><?php echo $this->get('title'); ?></h1>
        
        <div id="siteSub"><?php echo $this->getMsg( 'tagline' )->parse(); ?></div>

        <div class="mw-body-content">
          <div id="contentSub">
            <?php 
              if ($this->data['subtitle']){
                echo '<p class="wiki-subtitle">' . $this->get('subtitle') . '</p>'."\n";
              }
            ?>
            <p><?php echo $this->get('undelete'); ?></p>
          </div>
          <?php
             //body content
             $this->html('bodycontent');
             // include $this->getSkin()->skinname.'/templates/feedback_form.html'; //ported from old skin
             $this->clear();
           ?>
           <div class="printfooter">
             <?php echo $this->get('printfooter'); ?>
           </div>
           <div class="noprintpdf">
             <?php
               $this->html( 'catlinks' );
               $this->html( 'dataAfterContent' );
             ?> 
           </div>
          
        </div>
      </div>

      <div id="mw-footer">
        <!-- //Add feedback mechanism -->
        <div id="feedbackBtn">
          <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
        </div>
        <div class="special-links noprintpdf">
          <?php 
            /*deprecated??
            $this->footerSpecialBox();*/
          ?>
        </div>
        
        <!-- Contents configured by MediaWiki:SideBar -->
        <div class="footers-nav-links"><?php echo $this->getFooterNavLinks(); ?></div>
        
        <!-- ESI code to pull the footer in from Varnish -->
        <esi:include src="/esi/footer.php?v=latest" />
        
        <?php 
          /* Google Translate
          echo "<script>
            function googleTranslateElementInit() {
              new google.translate.TranslateElement({
                pageLanguage: 'en',
                multilanguagePage: true,
                gaTrack: true,
                gaId: '" . $this->googleAnalyticsAccount() . "'
              });
            }
          </script>
          <script src=\"//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit\"></script>";
          */
          $this->googleAnalyticsCode();
        ?>
        
        <?php
        
        foreach ( $this->getFooterLinks() as $category => $links ) {
          echo Html::openElement(
            'ul',
            array(
              'id' => 'footer-' . Sanitizer::escapeId( $category ),
              'role' => 'contentinfo'
            )
          );
          foreach ( $links as $key ) {
            echo Html::rawElement(
              'li',
              array(
                'id' => 'footer-' . Sanitizer::escapeId( $category . '-' . $key )
              ),
              $this->get( $key )
            );
          }
          echo Html::closeElement( 'ul' );
        }
        $this->clear();
        
        ?>
        
      </div> <!-- end footer -->
      
    </div><!-- end mw-wrapper -->

    <?php $this->printTrail(); ?>
    </body>
    </html>

    <?php
  }

  /**
   * Generates the footer nav links using the mediawiki sidebar (set in Mediawiki:Sidebar)
   * Set the elements to true to allow them to be part of the sidebar
   * @return string html
   */
  private function getFooterNavLinks(){
    $sidebar = $this->getSidebar();
    // returns content from wiki/Mediawiki:Sidebar 
    // plus a few internal defaults like SEARCH, LANGUAGES, TOOLBOX and TOOLBOXEND
    unset($sidebar['SEARCH']);
    unset($sidebar['LANGUAGES']);
    unset($sidebar['TOOLBOXEND']); //show "Duplicate this page" link occasionally?
    
    $html = '';
    foreach ($sidebar as $category => $linkGroup){
      if (!$linkGroup['content']){
        continue;
      }else{
        //force to array
        $linkGroup['content'] = is_array($linkGroup['content'])? $linkGroup['content'] : array($linkGroup['content']);
      }
      $html .= '<div class="footer-links">'."\n";
      //$html .= '  <h4>'.$linkGroup['header'].'</h4>'."\n";
      $html .= '  <ul>'."\n";
      foreach ($linkGroup['content'] as $key => $linkObj){
          if (is_string($linkObj)){
              $html .= $linkObj;
          } else {
              $html .= $this->makeListItem($key, $linkObj);
          }
      }
      $html .= '  </ul>'."\n";
      $html .= '</div>';
    }

    return $html;
  }

  /**
   * Generates page-related tools/links
   * @return string html <li>s with embedded <a>s
   */
  private function getPageLinks(){
    
    //Merge wiki page actions and omit current view/action
    $contentNavs = array_merge($this->data['content_navigation']['variants'],
                             $this->data['content_navigation']['views'],
                              $this->data['content_navigation']['actions']);
    $pageLinks = array();
    foreach ($contentNavs as $linkObj){
      if ($linkObj['class'] != 'selected'){
        $pageLinks[] = $linkObj;
      }
    }
    
    //Add What links here
    $pageLinks[] = array('class'=>'','text'=>'What links here','href'=>'/wiki/Special:WhatLinksHere/'.$this->get('thispage'),'id'=>'what-links-here');
    
    //Add Browse Properties
    $pageLinks[] = array('class'=>'','text'=>'Browse Properties','href'=>'/wiki/Special:Browse/'.$this->get('thispage'),'id'=>'browse-properties');
    
    $html = '';
    foreach ($pageLinks as $key => $linkObj){
      $linkClass = preg_replace('/\s+/', '_', $linkObj['text']);
      $linkClass = strtolower($linkClass);
      //$html .= $this->makeListItem($key, $linkObj);
      //$html .= '<li><a class="'.$linkObj['class'].'" href="'.$linkObj['href'].'">'.$linkObj['text'].'</a></li>'."\n";
      $html .= '<li class="page-actions"><a class="'.$linkClass.'" href="'.$linkObj['href'].'">'.$linkObj['text'].'</a></li>'."\n";
    }

    return $html;
  }

  /**
   * Generates user menu
   * @return string html <li>s with embedded <a>s
   */
  private function getUserLinks() {
    $userLinks = array();
    $personalTools = $this->getPersonalTools();
    
    //flatten mediawiki's terrible nested linkObj array
    foreach ($personalTools as $key => $toolObj){
      if (isset($toolObj['links'])){
        $userLinks = array_merge($userLinks, $toolObj['links']);
      }else{
        $userLinks[] = $toolObj;
      }
    }
    
    //build individual links with control over html elements
    $html = '';
    foreach ($userLinks as $key => $linkObj){
      $linkText = $linkObj['text'];
      //$linkClass = isset($linkObj['class'])? $linkObj['class'] : '';
      if ($linkObj['text'] == $this->get('username')){
        $linkText = 'My Profile';
      }
      if ($linkObj['text'] == 'Talk'){
        continue;
      }
      if ($linkObj['text'] == 'Admin links'){
        continue;
      }
      if ($linkObj['text'] == 'Semantic watchlist'){
        continue;
      }
      $linkClass = preg_replace('/\s+/', '_', $linkText);
      $linkClass = strtolower($linkClass);
      //$html .= $this->makeListItem($key, $linkObj);
      $html .= '<li><a class="'.$linkClass.'" href="'.$linkObj['href'].'">'.$linkText.'</a></li>'."\n";
    }

    return $html;
  }
        
  //set user initial for user button if logged in
  private function userIconType() {
    $firstInitial = substr($this->get('username'),0,1);
    if (strlen($firstInitial) > 0) {
      echo '<i class="first-initial" aria-hidden="true">'.$firstInitial.'</i><span class="sr-only">My User</span>';
    } else {
      echo '<i class="fa fa-user" aria-hidden="true"></i><span class="sr-only">My User</span>';
    }
  }
        
  //display username at top of user menu if logged in
  private function userDisplay() {
    $showHandle = $this->get('username');
    if (isset($showHandle)) {
      echo '<li class="user-handle">'.$showHandle.'</li>';
    }
  }
        
  /**
   * Hide action menu if user is not logged in
   */
  private function noAction() {
    if(strlen($this->get('username')) <= 0){
      echo 'no-user';
    }
  }

  /**
   * Outputs a css clear using the core visualClear class
   */
  private function clear(){
    echo '<div class="visualClear"></div>';
  }
  
  /**
   * Creates an openei url including proper protocol and subdomain
   * @param string $sub (optional) subdomain, i.e. 'gdr', 'mhkdr'.
   * @return string URL
   */
  private function openEIUrl($sub=''){
    $s = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')? 's' : '';
    $onDev = (preg_match('/^dev/', $_SERVER['SERVER_NAME']));
    if ($sub && $onDev){
      $sub = 'dev-'.$sub;
    }
    if (!$sub){
      $sub = ($onDev)? 'dev' : 'en';
    }
    return "http$s://$sub.openei.org";
  }
  
  private function googleAnalyticsAccount(){
    //Google analytics code
    $analyticsSite = ($_SERVER['SERVER_NAME'] == "en.openei.org")? '2' : '3';
    $analyticsAcct = "UA-9266690-" . $analyticsSite;
    return $analyticsAcct;
  }
  
  private function googleAnalyticsCode(){
    $s = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')? 's' : '';
    $analyticsUrl  = "http$s://ssl.google-analytics.com/ga.js";
    ?>
    <!-- Google Analytics -->
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', '<?php echo $this->googleAnalyticsAccount(); ?>']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = '<?php echo $analyticsUrl ?>';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    function _pageTracker(type){
        this.type = type;
        this._trackEvent = function(a,b,c) {
           _gaq.push(['_trackEvent', a, b, c]);
        };
    }
    var pageTracker = new _pageTracker();
  </script>
  <?php 
  } // end googleAnalytics
}// end class
