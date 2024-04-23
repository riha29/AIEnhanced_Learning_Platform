<?= $this-> view('header');?>

<link rel="stylesheet" href="<?= ROOT ?>/assets/css/friends.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>
    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="<?=ROOT?>/starttrivia" style="text-align:center; padding: 20px"><h1 style="font-size: 40px; text-decoration:underline" class="text-3xl font-bold tracking-tight text-blue-900" >START NEW TRIVIA!</h1></a>
      </div>
    </header>

<div class="w3-container">

  <div class="w3-bar w3-gray">
    <button class="w3-bar-item w3-button tablink w3-blue" onclick="openCity(event,'London')">Match History</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Paris')">Challenges</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Tokyo')">Ranking</button>
  </div>
  
  <div id="London" class="w3-container w3-border city">
  <table>
        <!-- <tr>
          <th>Photo</th>
          <th>Username</th>
          <th>Email</th>
          <th>Country</th>
        </tr> -->

        <?php if(!empty($history)):?>
            <?php 
            foreach($history as $his):
              if($his->status == 'pending'){?>
                <tr>
                  <?php if($his->player_one_id == $row->id){?>
                    <td style="font-size: 25px">You challenged <?=$his->uname_2?>!</td>
                  <?php } 
                  
                  } 
                  else {
                    if($his->player_one_id == $row->id && $his->winner == $row->id){ ?>
                      <td style="font-size: 25px; color: darkgreen">Congrats! You won against <?=$his->uname_2?></td>
                      <?php } else if($his->player_two_id == $row->id && $his->winner == $row->id){ ?>
                        <td style="font-size: 25px; color: darkgreen">Congrats! You won against <?=$his->uname_1?></td>
                      <?php } else if($his->player_one_id == $row->id && $his->winner != $row->id){ ?>
                        <td style="font-size: 25px; color: darkred">You lost against <?=$his->uname_2?></td>
                      <?php } else if($his->player_two_id == $row->id && $his->winner != $row->id){ ?>
                        <td style="font-size: 25px; color: darkred">You lost against <?=$his->uname_1?></td>
                      <?php }
                  } ?>
                </tr>
              <!-- <tr>
                <td><img src="<?=get_image($req->image)?>" style="width:100px;height:100px" title="<?php echo $req->username ?>" alt="photo of <?php echo $req->username ?>"></td>
                <td><?php echo $req->username ?></td>
                <td><?php echo $req->email ?></td>
                <td><?php echo $req->country ?></td> -->
                
            <?php endforeach;?>
          <?php endif;?>
      </table>
      
  </div>

  <div id="Paris" class="w3-container w3-border city" style="display:none">
  <table>

<?php if(!empty($history)):?>
      <?php 
      foreach($history as $his):
        if($his->status == 'pending'){?>
          <tr>
            <?php if($his->player_one_id != $row->id){?>
              <td style="font-size: 25px"><?=$his->uname_1?> challenged you! 
              <form method="post" action="<?=ROOT?>/triviaresponse" style = "float:right;"><button class="text-darkblue-300 hover:bg-blue-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"  name = "history" value = "<?=$his->history_id?>" type="submit">Respond Now!</button></form></td>
            <?php 
            }
        } ?>
          </tr>
          <?php endforeach;?>
    <?php endif;?>

</table>
  </div>

  <div id="Tokyo" class="w3-container w3-border city" style="display:none">
      <table>
        <tr>
          <th>Rank</th>
          <th>Photo</th>
          <th>Username</th>
          <th>Country</th>
          <th>Score</th>
        </tr>

        <?php if(!empty($ranks)):?>
            <?php 
            $count = 1;
            foreach($ranks as $req):?>
              <tr>
                <td><?php echo $count ?></td>
                <td><img src="<?=get_image($req->image)?>" style="width:100px;height:100px" title="<?php echo $req->username ?>" alt="photo of <?php echo $req->username ?>"></td>
                <td><?php echo $req->username ?></td>
                <td><?php echo $req->country ?></td>
                <td><?php echo $req->score ?></td>
              </tr>
                
            <?php $count += 1;
            endforeach;?>
          <?php endif;?>
      </table>
  </div>
</div>




<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-blue", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-blue";
}
</script>

</body>

  <?php $this->view('footer');?>