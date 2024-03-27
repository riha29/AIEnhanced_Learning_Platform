<?= $this->view('header');?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/css/my_profile.css">
    <main>
        <div class="mx-auto max-w-7xl py-2 sm:px-6 lg:px-8">
            <!-- Your content -->

            <section class="section about-section gray-bg " id="about">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-lg-6">
                            <div class="about-text go-to">
                                <h3 class="dark-color">About Me</h3>
                                <div class="row about-list">
                                    <div class="col-md-6">
                                        <div class="media">
                                            <label>Username</label>
                                            <p><?=$row->username?></p>
                                        </div>
                                        <div class="media">
                                            <label>E-mail</label>
                                            <p><?=$row->email?></p>
                                        </div>    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="media">
                                            <label>Country</label>
                                            <p><?=$row->country?></p>
                                        </div>
                                        <div class="media">
                                            <label>Age</label>
                                            <p><?=$row->age?></p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="edit-button-container" style="float:right; padding: 20px 150px">
                                    <a href="<?=ROOT?>/edit_profile" class="edit-button" type="submit">Edit</a>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-avatar">
                                <img src="<?=get_image(user('image'))?>" style="width:500px;height:500px" title="Me" alt="Me">
                            </div>
                        </div>
                    </div>
                    <div class="counter">
                        <div class="row">
                            <div class="col-6 col-lg-3">
                                <div class="count-data text-center">
                                    <h6 class="count h2" data-to="500" data-speed="500"><?=date("Y", strtotime($row->date))?></h6>
                                    <p class="m-0px font-w-600">Joined us</p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="count-data text-center">
                                    <h6 class="count h2" data-to="150" data-speed="150">150</h6>
                                    <p class="m-0px font-w-600">Your Courses</p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="count-data text-center">
                                    <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                                    <p class="m-0px font-w-600">Friends</p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="count-data text-center">
                                    <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                                    <p class="m-0px font-w-600">Points</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
<?= $this->view('footer');?>