<?= $this->view('header');?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/css/friends.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<div class="w3-container">
  <h2></h2>

  <div class="w3-bar w3-gray">
    <button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'London')">Search All</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Paris')">My Friends</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Tokyo')">Friend Requests</button>
  </div>
  
  <div id="London" class="w3-container w3-border city">
    <form method="get" action="<?=ROOT?>/friends" role="search" name="search-container">
      <input value="<?=old_value('find','','get')?>" name="find" type="search" placeholder="Search..">
      <button type="submit"><i class="bi bi-search"></i></button>
    </form>

      <table>
      <tr>
        <th>Photo</th>
        <th>Username</th>
        <th>Email</th>
        <th>Country</th>
        <th>Status</th>
      </tr>

      <?php if(!empty($allrows)):
        $count = 0;
        foreach($allrows as $row):?>
          <tr>
            <td><img src="<?=get_image($row->image)?>" style="width:100px;height:100px" title="<?php echo $row->username ?>" alt="photo of <?php echo $row->username ?>"></td>
            <td><?php echo $row->username ?></td>
            <td><?php echo $row->email ?></td>
            <td><?php echo $row->country ?></td>
            <td>
              <?php if($fstatus[$count]=='no'){
                $name = "send_req";?>
                <form method="get" action="<?=ROOT?>/friends"><button  name = "send_req" value = "<?=$row->id?>" class="button-req" style="vertical-align:middle" type="submit"><span>Send friend request</span></button></form>
              <?php } else if($fstatus[$count]=='pending') {
                echo '<a>Pending</a>';
              } else {
                echo '<a>Already friends!</a>';
              }
              $count += 1;
              ?>
            </td>
            
          </tr>
          <?php endforeach;?>
        <?php endif;?>
    </table>
  </div>

  <div id="Paris" class="w3-container w3-border city" style="display:none">
    <h2>My Friends</h2>
      <table>
        <tr>
          <th>Photo</th>
          <th>Username</th>
          <th>Email</th>
          <th>Country</th>
        </tr>

        <?php if(!empty($accepted_req)):?>
            <?php 
            foreach($accepted_req as $req):?>
              <tr>
                <td><img src="<?=get_image($req->image)?>" style="width:100px;height:100px" title="<?php echo $req->username ?>" alt="photo of <?php echo $req->username ?>"></td>
                <td><?php echo $req->username ?></td>
                <td><?php echo $req->email ?></td>
                <td><?php echo $req->country ?></td>
                
            <?php endforeach;?>
          <?php endif;?>
      </table>
  </div>

  <div id="Tokyo" class="w3-container w3-border city" style="display:none">
    <h2>Friend Requests</h2>
    <table>
          <tr>
            <th>Photo</th>
            <th>Username</th>
            <th>Email</th>
            <th>Country</th>
            <th>Status</th>
          </tr>

          <?php if(!empty($received_req)):?>
            <?php 
            foreach($received_req as $req):?>
              <tr>
                <td><img src="<?=get_image($req->image)?>" style="width:100px;height:100px" title="<?php echo $req->username ?>" alt="photo of <?php echo $req->username ?>"></td>
                <td><?php echo $req->username ?></td>
                <td><?php echo $req->email ?></td>
                <td><?php echo $req->country ?></td>
                <td><form method="get" action="<?=ROOT?>/friends"><button  name = "accept_req" value = "<?=$req->sender_id?>" class="button-req" style="vertical-align:middle" type="submit"><span>Accept</span></button></form>
                    <form method="get" action="<?=ROOT?>/friends"><button  name = "reject_req" value = "<?=$req->sender_id?>" class="button-req" style="vertical-align:middle" type="submit"><span>Reject</span></button></form></td>
                
            <?php endforeach;?>
          <?php endif;?>

          <?php if(!empty($sent_req)):?>
            <?php 
            foreach($sent_req as $req):?>
              <tr>
                <td><img src="<?=get_image($req->image)?>" style="width:100px;height:100px" title="<?php echo $req->username ?>" alt="photo of <?php echo $req->username ?>"></td>
                <td><?php echo $req->username ?></td>
                <td><?php echo $req->email ?></td>
                <td><?php echo $req->country ?></td>
                <td><?php echo 'pending' ?></td>
                   
              </tr>
              <?php endforeach;?>
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
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>

</body>


<?php $this->view('footer');?>
