<?= $this->view('header');?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/css/my_profile.css">
    <main>
        <div class="mx-auto max-w-7xl py-2 sm:px-6 lg:px-8">
            <!-- Your content -->

            <section class="section about-section gray-bg " id="about">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-lg-6">
                            <form method="post" onsubmit="submit_post(event)">
                                <div class="about-text go-to">
                                    <h3 class="dark-color">About Me</h3>
                                    <div class="row about-list">
                                        <div class="col-md-6">
                                            <div class="media">
                                                <label for="username">Username</label>
                                                <input value="<?=$row->username?>" type="text" class="form-control" id="username" placeholder="Enter username">
                                            </div>
                                            <div class="media">
                                                <label for="email">Email</label>
                                                <input value="<?=$row->email?>" type="text" class="form-control" id="email" placeholder="Enter email">
                                            </div>
                                            <div class="media">
                                                <label for="password">Password</label>
                                                <input value="" type="password" class="form-control" id="password" placeholder="Enter password">
                                            </div>    
                                        </div>
                                        <div class="col-md-6">
                                            <div class="media">
                                                <label for="country">Country</label>
                                                <input value="<?=$row->country?>" type="text" class="form-control" id="country" placeholder="Enter country">
                                            </div>
                                            <div class="media">
                                                <label for="age">Age</label>
                                                <input value="<?=$row->age?>" type="number" class="form-control" id="age" placeholder="Enter age">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="edit-button-container" style="float:right; padding: 20px 20px">
                                        <button class="edit-button" type="submit">Confirm</button>
                                    </div>
                                    <div class="edit-button-container" style="float:right; padding: 20px 20px">
                                        <a class="edit-button" href="<?=ROOT?>/my_profile" type="submit">Go Back</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-avatar">
                                <img  class="profile-image" src="<?=get_image(user('image'))?>" style="width:500px;height:500px" title="Me" alt="Me"> 
                                    <label>
                                        <i style="position: absolute;cursor: pointer;" class="h1 text-primary bi bi-image"></i>
                                        <input onchange="display_image(this.files[0])" type="file" class="d-none" name="">
                                    </label>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </main>
    <script>

        function display_image(file)
            {
                let allowed = ['jpg','jpeg','png','webp'];
                let ext = file.name.split(".").pop();

                if(!allowed.includes(ext.toLowerCase()))
                {
                    alert('Only files of this type allowed: '+ allowed.toString(", "));
                    return;
                }

                document.querySelector(".profile-image").src = URL.createObjectURL(file);
                change_image(file);
            }

            function display_post_image(file)
            {
                let allowed = ['jpg','jpeg','png','webp'];
                let ext = file.name.split(".").pop();

                if(!allowed.includes(ext.toLowerCase()))
                {
                    alert('Only files of this type allowed: '+ allowed.toString(", "));
                    post_image_added = false;
                    return;
                }

                document.querySelector(".post-image").src = URL.createObjectURL(file);
                document.querySelector(".post-image").parentNode.classList.remove("d-none");
                
                post_image_added = true;
            }

        function change_image(file){
            var obj = {};
            obj.image = file;
            obj.data_type = "profile-image";
            obj.id = '<?=user('id')?>';
            send_data(obj);
        }

		function send_data(obj)
		{

			var myform = new FormData();
			

			for(key in obj)
			{
				myform.append(key,obj[key]);
			}

			var ajax = new XMLHttpRequest();

			ajax.addEventListener('readystatechange',function(e){

				if(ajax.readyState == 4 && ajax.status == 200)
				{
					handle_result(ajax.responseText);
				}
			});
            
            ajax.open('post','<?=ROOT?>/ajax',true);  //post protocol, to send to another page put '<?=ROOT?>/ajax' in second index
            ajax.send(myform);

        }

		function handle_result(result)
		{
			//console.log(result);
			let obj = JSON.parse(result);

			if(obj.data_type == "profile-image")
			{
				alert(obj.message);
				window.location.reload();
			} else 
            if(obj.data_type == "profile-settings"){
                console.log(result);
                let obj = JSON.parse(result);

                alert(obj.message);

                if(obj.success)
                    window.location.reload();
            }
		}

        function submit_post(e)
		{
			e.preventDefault();

			var obj = {};
 
			obj.username = e.currentTarget.querySelector("#username").value;
			obj.email = e.currentTarget.querySelector("#email").value;
			obj.password = e.currentTarget.querySelector("#password").value;
            obj.country = e.currentTarget.querySelector("#country").value;
            obj.age = e.currentTarget.querySelector("#age").value;
            obj.password = e.currentTarget.querySelector("#password").value;
			obj.data_type = "profile-settings";
			obj.id = "<?=user('id')?>";
			send_data(obj);
		}

    </script>
<?= $this->view('footer');?>