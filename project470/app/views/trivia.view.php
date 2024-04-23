<?= $this-> view('header');?>

<link rel="stylesheet" href="<?= ROOT ?>/assets/css/trivia.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

<form method='post' name='trivia' action="<?=ROOT?>/trivia">
    <div class="container mt-sm-5 my-1">
        <div id="timer">00:00</div>
        <?php if(!empty($questions)):
            foreach($questions as $question):?>
                <div class="question ml-sm-5 pl-sm-5 pt-2">
                    <div class="py-2 h5"><b><?= $question->question ?></b></div>
                    <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                        <label class="options"><?= $question->option_a ?>
                            <input type="radio" name="<?= $question->question_id ?>" value="<?= $question->option_a ?>">
                            <span class="checkmark"></span>
                        </label>
                        <label class="options"><?= $question->option_b ?>
                            <input type="radio" name="<?= $question->question_id ?>" value="<?= $question->option_b ?>">
                            <span class="checkmark"></span>
                        </label>
                        <label class="options"><?= $question->option_c ?>
                            <input type="radio" name="<?= $question->question_id ?>" value="<?= $question->option_c ?>">
                            <span class="checkmark"></span>
                        </label>
                        <label class="options"><?= $question->option_d ?>
                            <input type="radio" name="<?= $question->question_id ?>" value="<?= $question->option_d ?>">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif;?>
        <input type="text" id="timer-input" name="time" value="" style="display: none;"></input>
        <input type="text" id="challenged" name="challenged" value="<?= $challenged ?>" style="display: none;"></input>
        
        <div class="d-flex align-items-center pt-3">
            <!-- <div id="prev">
                <button class="btn btn-primary">Previous</button>
            </div> -->
            <div class="ml-auto mr-sm-5">
                <button class="btn btn-success" onlick="stopTimer()">Submit</button>
            </div>
        </div>
    </div>
</form>

<script src="<?=ROOT?>/assets/js/trivia.js">  </script>