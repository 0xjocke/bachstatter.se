<?php

require_once 'application.php';
if (isset($_POST['chosenCat'])) {
    $portfolioItems = PortfolioItem::whereCategory($_POST['chosenCat']);
}else{
    $portfolioItems = PortfolioItem::all();
}

?>


<section id="portfolio">
    <header class="sectionwrapper">
        <h1>Portfolio</h1>
    </header>
    <div class="container">
    <form action="" method="post">
        <select name="chosenCat">
            <option value="">Välj kategori</option>
            <option disabled="disabled"></option>
            <option value="1">Wordpress</option>
            <option value="2">HTML & CSS</option>             
            <option value="3">Tictail</option>
        </select>
        <input type="submit">
    </form>
    <br>

    <?php 
            foreach ($portfolioItems as $index => $item):
            
    ?>
        <?php 
            if ($index % 2): 
        ?>
                    <div class="smallbox portLeft">
                        <h2><?php echo $item->title; ?></h2>
                        <p><?php echo $item->content; ?></p>
                        <a class="readmore" href="<?php echo $item->url() ?>">Läs mer</a>
                    </div>
                    <div class="smallbox">
                        <a href="<?php echo $item->url() ?>"><img class="portImg" src="../images/<?php echo $item->imageName; ?>" alt="<?php echo $item->title; ?>"></a>
                    </div>
            <?php else: ?>
                <div class="smallbox portLeft">
                    <a href="<?php echo $item->url() ?>"><img class="portImg" src="../images/<?php echo $item->imageName ?>" alt="<?php echo $item->title; ?>"></a>
                </div>
                <div class="smallbox">
                    <h2><?php echo $item->title; ?></h2>
                    <p><?php echo $item->content; ?></p>
                    <a class="readmore" href="<?php echo $item->url() ?>">Läs mer</a>
                </div>
            <?php endif; ?>
       <?php 
     
       endforeach;
        
       ?>
      
    </div>
</section>