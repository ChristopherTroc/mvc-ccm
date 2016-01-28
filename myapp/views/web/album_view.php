<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
    <div class="container">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
            <div class="container">
                <div class="navbar-header">
                    <!-- Logo Starts -->
                    <a class="navbar-brand" href="<?=$helper->urldispatch(index)?>"><img src="<?$helper->urldispatch('images')?>logo.png" alt="logo"></a>
                    <!-- #Logo Ends -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
                
                <!-- Nav Starts -->
                <div class="navbar-collapse  collapse">
                    <ul class="nav navbar-nav navbar-right scroll">
                      <li class="active"><a href="<?=$helper->urldispatch(index)?>">Inicio</a></li>
                    </ul>
                </div>
                <!-- #Nav Ends -->
            </div>
        </div>
    </div>
</div>
<!-- #Header Starts -->


<div id="home">

    <!-- Album -->
    <div class="container center">
    <?foreach($articles AS $article):?>
        <div class="col-sm-8 col-sm-offset-2 col-xs-12 spacer">
        <?if($article[img]){?>
          <img src="<?$helper->urldispatch(files)?><?=$category[category]?>/<?=$article[img]?>" class="img-responsive" />
        <?}else{?>
          <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="<?=$article[url]?>"></iframe>
          </div>
        <?}?>
        </div>
    <?endforeach;?>
    </div>
    <!-- End Album Item -->

    <!-- Footer Starts -->
    <div class="footer text-center spacer">
         <p class="wowload flipInX">
             <a href="#"><i class="fa fa-facebook fa-2x"></i></a> 
             <a href="#"><i class="fa fa-instagram fa-2x"></i></a> 
             <a href="#"><i class="fa fa-twitter fa-2x"></i></a> 
             <a href="#"><i class="fa fa-flickr fa-2x"></i></a> 
         </p>
         Copyright 2014 Cyrus Creative Studio. All rights reserved.
    </div>
    <!-- # Footer Ends -->

    <a href="#home" class="gototop"><i class="fa fa-angle-up  fa-3x"></i></a>

</div>
