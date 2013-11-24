<?php

require_once 'application.php';

$portfolioItems = PortfolioItem::all(); 

?>


<section id="portfolio">
    <header class="sectionwrapper">
        <h1>Portfolio</h1>
    </header>
    <div class="container">
      

    <?php foreach ($portfolioItems as $index => $item): ?>
        <?php if ($index % 2): ?>
            <div class="smallbox portLeft">
                <h2><?php echo $item->title; ?></h2>
                <p><?php echo $item->content; ?></p>
                <a href="">Läs mer</a>
            </div>
            <div class="smallbox">
                <img class="portImg" src="../images/portfolio/<?php echo $item->id; ?>.png" alt="">
            </div>
        <?php else: ?>
        <div class="smallbox portLeft">
            <img class="portImg" src="../images/portfolio/<?php echo $item->id; ?>.png" alt="">
        </div>
        <div class="smallbox">
            <h2><?php echo $item->title; ?></h2>
            <p><?php echo $item->content; ?></p>
            <a href="">Läs mer</a>
        </div>
        <?php endif ?>
       
    <?php endforeach  ?>
      
    </div>
</section>