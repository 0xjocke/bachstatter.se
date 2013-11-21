<?php

class PortfolioItem{
    public $title, $content, $imgName;
    
    public function __construct(array $attributes){
        foreach ($attributes as $key => $value) {
            $this->$key = $value;
        }
    }
}

$dbResult = array(
    array('title' => 'Thisstyle.se kommande sida', 'content' => 'Thisstyles kommande sida. Byggd med wordpress och Woocommerce.','imgName' => 'port1.png'),
    array('title' => 'Växjö Taxis Nyhetsblad','content' => 'En intern sida för Växjö Taxis nyhetsblad byggd med HTML, CSS och JavaScript','imgName' => 'port2.png'),
    array('title' => 'Thisstyle.se','content' => 'Thisstyle.ses officiella hemsida byggd med Tictail.', 'imgName' => 'port3.png'),
    array('title' => 'X2 Technology:s kommande sida','content' => 'X2 Technology:s kommande sida byggd med Wordpress.', 'imgName' => 'port4.png')

    );

$portfolioItems = array();
foreach ($dbResult as $r) {
    $portfolioItems[] = new PortfolioItem($r);
}
?>


<section id="portfolio">
    <header class="sectionwrapper">
        <h1>Portfolio</h1>
    </header>
    <div class="portwrapper">
      <ul>

    <?php foreach ($portfolioItems as $index => $item): ?>
        <?php if ($index % 2): ?>
            <li class="smallbox">
                <p><?php echo $item->content; ?></p>
            </li>
            <li class="smallbox">
                <img class="portImg" src="../images/portfolio/<?php echo $item->imgName; ?>" alt="">
            </li>
        <?php else: ?>
        <li class="smallbox">
            <img class="portImg" src="../images/portfolio/<?php echo $item->imgName; ?>" alt="">
        </li>
        <li class="smallbox">
            <p><?php echo $item->content; ?></p>
        </li>
       

    <?php endif ?>
       
        <?php endforeach  ?>
        </ul>
    </div>
</section>