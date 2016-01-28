<div class="alert alert-success alert-dismissable" >
  <button type="button" class="close" data-dismiss="alert">&times</button>
  <div class="col-lg-1">
    <strong><span class="glyphicon glyphicon-exclamation-sign" style="font-size:28px;"></span></strong>
  </div>
<?foreach($alert AS $msje):
    echo "- ".$msje."</br>";
  endforeach;
?>
</div>
