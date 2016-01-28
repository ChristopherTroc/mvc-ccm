<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
    <div class="container">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
            <div class="container">
                <div class="navbar-header">
                    <!-- Logo Starts -->
                    <a class="navbar-brand" href="#home"><img src="<?$helper->urldispatch('images')?>logo.png" alt="logo"></a>
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
                        <li class="active"><a href="#home">Inicio</a></li>
                        <li ><a href="#works">Albumes</a></li>
                        <li ><a href="#contact">Contacto</a></li>
                    </ul>
                </div>
                <!-- #Nav Ends -->
            </div>
        </div>
    </div>
</div>
<!-- #Header Starts -->


<div class="wrapper-bg">
    <img src="<?$helper->urldispatch('images')?>back4.jpg" class="img-responsive" />
</div>

<div id="home">

<!-- works -->
<div id="works"  class="clearfix grid"> 
  <?foreach($categorys as $category): ?>
  <figure class="effect-oscar  wowload fadeInUp">
    <?if($category[img]){?>
    <img src="<?$helper->urldispatch(files)?><?=$category[category]?>/<?=$category[img]?>" />
        <figcaption>
            <p><br><a href="<?$helper->urldispatch(album)?>?id=<?=$category[id]?>" >Ver Album</a></p>           
        </figcaption>
    <?}else {?>
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="<?=$category[url]?>"></iframe>
    </div>
        <figcaption>
           <p><br><a href="<?$helper->urldispatch(album)?>?id=<?=$category[id]?>" >Ver Album</a></p>           
        </figcaption>
    <?}?>
  </figure>
  <?endforeach;?>
</div>
<!-- works -->


<div id="contact" class="spacer">
<!--Contact Starts-->
<div class="container contactform center">
    <h2 class="text-center  wowload fadeInUp">Contactame para iniciar tu proyecto</h2>
        <div class="row wowload fadeInLeftBig">      
            <div class="col-sm-6 col-sm-offset-3 col-xs-12">      
                <input type="text" placeholder="Nombre">
                <input type="text" placeholder="Asunto">
                <textarea rows="5" placeholder="Mensaje"></textarea>
                <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Enviar</button>
            </div>
        </div>
    </div>
</div>
<!--Contact Ends-->
</div>



<!-- Footer Starts -->
<div class="footer text-center spacer">
     <p class="wowload flipInX">
         <a href="#"><i class="fa fa-facebook fa-2x"></i></a> 
         <a href="#"><i class="fa fa-instagram fa-2x"></i></a> 
         <a href="#"><i class="fa fa-twitter fa-2x"></i></a> 
        <a href="#"><i class="fa fa-flickr fa-2x"></i></a> 
     </p>
     Desarrollado por <a href="http://www.ctroc.com">www.ctroc.com</a>
</div>
<!-- # Footer Ends -->

<a href="#home" class="gototop"><i class="fa fa-angle-up  fa-3x"></i></a>


</div> 
<!-- End home box -->


<?foreach($footer_js as $js):?>
<?=$js?>
<?endforeach?>
