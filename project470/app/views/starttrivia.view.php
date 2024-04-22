<?= $this-> view('header');?>

<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900"></h1>
        <div style="text-align:center; padding: 20px">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900" style="font-size: 50px;">Who do you want to challenge?</h1>
            <?php if(!empty($friends)):?>
            <?php 
                foreach($friends as $friend):?>
                <ul>                 
                    <form method="post" action="<?=ROOT?>/trivia"><button name = "challenge" value = "<?=$friend->id?>" type="submit" class="add-btn" style="font-size: 30px; padding: 15px;"><?php echo $friend->username ?></button></form>
                <?php endforeach;?>
                 
            <?php endif;?>
                <form method="post" action="<?=ROOT?>/trivia"><button name = "challenge" value = "<?=$rando->id?>" type="submit" class="add-btn" style="font-size: 30px; padding: 15px;">Random User</button></form>
                </ul>
                
        </div>
    </div>
</header>


<?php $this->view('footer');?>