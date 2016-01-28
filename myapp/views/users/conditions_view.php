<? // conditions to use system ?>

<div class="container">
  <div class="col-lg-offset-1 col-lg-10 row conditions">
    <h4> Condiciones de Uso de esta aplicación. </h4>
    <p class="m-top-20">
     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in tellus posuere velit euismod egestas. 
     Maecenas eget interdum dui. Vivamus cursus commodo ex sed dapibus. Duis risus arcu, mattis eu viverra vitae, 
     malesuada dignissim lorem. Aliquam semper consectetur luctus. Sed urna ante, pulvinar quis nibh ornare, malesuada 
     ultricies ligula. Mauris aliquet volutpat porta.
    </p>
    <p>
     Duis porttitor at metus ut egestas. Phasellus in luctus odio. Integer a justo egestas mi malesuada tempus eget non ligula. 
     Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam a est at turpis viverra 
     pellentesque. Nullam volutpat interdum elit, sit amet ultrices metus consequat vel. Ut sit amet magna molestie, convallis 
     sapien eget, blandit eros. Suspendisse felis sem, dictum sed imperdiet vel, fermentum sit amet tellus. Duis volutpat tempor 
     ligula, vel malesuada ante scelerisque quis. Proin interdum sit amet enim quis molestie. Ut nisl mi, vehicula id dui quis, 
     egestas euismod mauris. Aliquam viverra rhoncus ante at ornare. Quisque a risus quam. Sed quis erat enim. Curabitur tempor 
     tortor a nisi euismod, rhoncus dignissim ligula egestas. Suspendisse pellentesque mauris quis urna dignissim vehicula.
    </p>
     Cras quis nunc fringilla felis blandit pulvinar. In hac habitasse platea dictumst. Praesent quam turpis, tempor in quam et, 
     vestibulum auctor nisl. Maecenas scelerisque eros sollicitudin magna condimentum gravida. Suspendisse posuere cursus felis, 
     sed convallis orci dapibus eu. Ut vel diam quis justo interdum gravida. Aenean ut ipsum porttitor, dignissim leo quis, vestibulum nisi. 
     Nunc cursus purus a laoreet malesuada. Vivamus vehicula lorem ut felis fermentum elementum. Sed quam purus, molestie non varius eu, 
     tincidunt sed lorem. Duis ut nisl ac ligula euismod porttitor.
    </p>
    <p>   
     Aliquam eu ante tincidunt, bibendum mauris vitae, aliquam urna. Morbi sagittis elit vitae odio faucibus, eget mattis massa tincidunt. 
     Sed porttitor laoreet ultrices. Morbi vehicula mauris nec sodales euismod. Praesent vitae mi ac sapien scelerisque aliquam quis vel dolor. 
     Nunc vitae lacus tortor. Donec aliquam aliquam sollicitudin. Nulla scelerisque sapien tellus, non accumsan orci auctor at.
    </p>

    <p class="m-top-50"> 
    <form action="<?$helper->urldispatch("activate_user_account")?>/acept_conditions" id="acept_conditions" method="POST">
      <div class="checkbox">
        <label>
         <input type="checkbox" id="condition"  value="1">
         He leido y acepto las condiciones de uso de la aplicación.
        </label>
      </div>
      <input type="hidden" name="id_user" value ="<?=$user[id_user]?>">
      <input type="hidden" name="activation_key" value ="<?=$user[activation_key]?>" >
      <button type="submit" id="submit_btn" class="btn btn-primary"> Continuar </button>
    </form>
    </p>

  </div>
</div>

<script>
$(document).ready(function(){

  $("#submit_btn").click(function(){

    if($("#condition").is(':checked')){
       $("#acept_conditions").submit(); 
    } else {
      $("#condition").focus();
    }

      return false;
  });

});
</script>
