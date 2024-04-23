

<!-- <img src="<?= ROOT ?>/assets/images/1119716387.jpg">   -->

<html class="w-full bg-gray-100">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/header.css">

</head>
<body class="w-full">
    
  <div class="min-h-full">
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="<?=ROOT?>/browse_courses" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" style="font-size: 130% ; font-family: Verdana" aria-current="page">Intellect Quest</a>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
                <a href="<?=ROOT?>/my_courses" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">My Courses</a>
                <a href="<?=ROOT?>/friends" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Friends</a>  
                <a href="<?=ROOT?>/triviahistory" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Trivia!</a> 
                <div class="w3-dropdown-hover" style="z-index: 5">
                  <a class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                    <img src="<?=get_image(user('image'))?>" width="45" height="45" ></a>
                  <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="<?=ROOT?>/my_profile" class="w3-bar-item w3-button">My Profile</a>
                    <!-- <a href="<?=ROOT?>/my_courses" class="w3-bar-item w3-button">My Courses</a> -->
                    <a href="<?=ROOT?>/edit_profile" class="w3-bar-item w3-button">Edit Profile</a>
                    <a href="<?=ROOT?>/logout" class="w3-bar-item w3-button">Logout</a>
                  </div>
                </div>   
            </div>
          </div>
        </div>
      </div>
  
      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="<?=ROOT?>/browse_courses" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" style="font-size: 130% ; font-family: Verdana" aria-current="page" >Intellect Quest</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
          <div class="flex items-center px-5">
              <a href="<?=ROOT?>/my_courses" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Courses</a>
              <a href="<?=ROOT?>/friends" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Friends</a> 
              <a href="<?=ROOT?>/triviahistory" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Trivia!</a> 
              <a href="<?=ROOT?>/my_profile" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Profile</a> 
              <!-- <a href="<?=ROOT?>/my_courses" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">My courses</a>  -->
          </div>
        </div>
      </div>
    </nav>
  
