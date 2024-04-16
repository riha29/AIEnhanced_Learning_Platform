<?= $this->view('header');?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/css/browse_courses.css">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

<body>

<div class=searchbar>
    <form method="get" action="<?=ROOT?>/browse_courses" role="search" name="search-container">
        <input value="<?=old_value('find','','get')?>" name="find" type="search" placeholder="Search..">
        <button type="submit"><i class="bi bi-search"></i></button>
    </form>
</div>

<div class="ag-format-container">
<div class="ag-courses_box">
    <?php if(!empty($allrows)):
        foreach($allrows as $row):?>
            <div class="ag-courses_item">
                <a href="<?=ROOT?>/course?viewcourse=<?=$row->id?>-1" class="ag-courses-item_link">
                    <?php if(!in_array($row->id,$course_list)){?>
                        <form method="post" action="<?=ROOT?>/browse_courses"><button name = "add_course" value = "<?=$row->id?>" type="submit" class="add-btn"><i class="bi bi-plus"></i></button></form>
                    <?php }else{?>
                        <form method="post" action="<?=ROOT?>/browse_courses"><button name = "remove_course" value = "<?=$row->id?>" type="submit" class="add-btn"><i class="bi bi-dash"></i></button></form>
                    <?php }?>
                
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title"><?=$row->title?></div>

                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date"><?=$row->description?></span>
                    </div>
                </a>
            </div>
        <?php endforeach;?>
    <?php endif;?>
  </div>
</div>

<?php $this->view('footer');?>
