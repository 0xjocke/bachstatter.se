<?php

require_once '../application.php';

//get all categories
$category = Category::all();

//if categoryId is set in GET and its not empty 
// use whereCategory to fins all portfolioitems with specific ID
if (isset($_GET['categoryId']) && $_GET['categoryId'] != "") {
    $portfolioItems = PortfolioItem::whereCategory($_GET['categoryId']);
}else{
    $_GET["categoryId"] = "";
    $portfolioItems = PortfolioItem::all();
}

?>


<section id="portfolio">
    <header class="sectionwrapper">
        <h1>Portfolio</h1>
    </header>
    <div class="container">
        <form method="get">
          <div class="custom-select">
            <label for="select-choice1" class="label select-1"><span class="selection-choice"> Choose a category</span> </label>
            <select id="select-choice1" class="select" name="categoryId">
                    <option value="">All</option>
                <?php foreach ($category as $category): ?>
                    <option value="<?php echo $category->id;?>" <?php if ($category->id == $_GET['categoryId']) {echo "selected";} ?>>
                    <?php echo $category->name; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
        </form>
        <h2 class="marginLeft"><?php if (isset($_GET['categoryId']) && $_GET['categoryId'] != "") {
            $category = Category::find($_GET['categoryId']);
            echo $category->name;
            }
         ?>
         </h2>

    <?php 
            foreach ($portfolioItems as $index => $item):
            
    ?>
        <?php 
            if ($index % 2): 
        ?>
                    <div class="smallbox portLeft">
                        <h2><?php echo $item->title; ?></h2>
                        <p><?php echo substr($item->content, 0, 60)."..."; ?></p>
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
                    <p><?php echo substr($item->content, 0, 60)."..."; ?></p>
                    <a class="readmore" href="<?php echo $item->url() ?>">Läs mer</a>
                </div>
            <?php endif; ?>
       <?php 
     
       endforeach;
        
       ?>
      
    </div>
    <br>
</section>