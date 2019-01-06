

<div class="row">
<div class="col-sm-1">
<div class="thumbnail">
<img class="img-responsive user-photo" src="/images/uthumb.png">
</div><!-- /thumbnail -->
</div><!-- /col-sm-1 -->

<div class="col-sm-5">
<div class="panel panel-default">
<div class="panel-heading">
<strong><?php echo $row['name']; ?></strong> <span class="text-muted"><?php echo $row['date']; ?></span>
</div>
<div class="panel-body">
<?php
echo $row['comment'];
?>
</div><!-- /panel-body -->
</div><!-- /panel panel-default -->
</div><!-- /col-sm-5 -->

</div><!-- /container -->
