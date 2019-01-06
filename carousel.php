<?php
$i=1;
$stmt=$pdo->prepare("SELECT * FROM carousel");
if(!$stmt->execute()){
    print "Databse error";
    exit;
}
?>


<div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
                <?php
                //do{
                ?>
                   <!-- <li data-target="#myCarousel" data-slide-to="<?php echo $i ;?>" class ="active"></li>
                    -->
                <?php
                //$i= $i+1;
                //}while($i <=$total )
                ?>
        </ol>
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">

            <div class="item active">
                <img src="/images/carousel/deer.png" alt="First Slide">
            </div>
            <?php
            while($row=$stmt->fetch()){
            ?>
            <div class="item">

                <img src="<?php echo $row["image"]; ?>" alt="Slide">
            </div>
            <?php
            }
            ?>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
