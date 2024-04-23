<?= $this->view('header');?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/css/course.css">


<body>

    <div class="sidebar-container">
        <div class="sidenav">
            <h2 style="font-size:30px; padding: 6px 8px 6px 16px; color:brown">All Sections</h2>
            <?php if(!empty($allsections)):
                foreach($allsections as $sec):?>
                    <a href="<?=ROOT?>/course?viewcourse=<?=$sec->course?>-<?=$sec->priority?>"><?=$sec->name?></a>
                <?php endforeach;?>
            <?php endif;?>
            <a href="#">Pending...</a>
        </div>
    </div>

    <div class="main">
        <div class="content">
            <?php if(!empty($onesection)):
            foreach($onesection as $section):?>
                <h1 style="font-size:50px; padding-bottom:18px; color:brown"><?=$section->name?></h1>
                <?php $column = str_replace("\n", "<br><br>", $section->content)?>                   
                <p><?=$column?></p> 
                <div class="video-container" style="padding:30px 20px">
                    <?php $col = str_replace("watch?v=", "embed/", $section->video)?>
                    <iframe width="90%" height="70%" src="<?=$col?>" frameborder="2" allowfullscreen></iframe> 
                </div>
                <?php endforeach;?>
            <?php endif;?>

        </div>
    </div>

<?php $this->view('footer');?>