<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <title>MeetDev</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body class="max-w-screen  h-full  bg-[#F8F8FA]">
  <nav class="pt-6 pb-6 bg-[#24212F]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 ">
      <div class="flex h-16 items-center justify-between ">
        <div class="flex items-center  ">
          <div class="flex-shrink-0  ">
            <a href="<?php echo URL ?>"> 
                <img class="h-10 w-12"  src="<?php echo URL; ?>img/logo-white.png" alt="Your Company">
            </a>
            
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <a href="#" class="hover:text-gray-300  text-white rounded-md px-3 py-2 text-base font-normal">About</a>
              <a href="#" class="hover:text-gray-300  text-white rounded-md px-3 py-2 text-base font-normal">Contact</a>
            </div>
          </div>
        </div>
        <div class="relative ml-3">
            <div>
                <a href="<?php echo URL;?>auth" class="hover:text-gray-300  text-white rounded-md px-3 py-2 text-base font-normal mr-4">Login</a>
                <a href="<?php echo URL;?>auth/signup" class="bg-gradient-to-r from-[#F49867] via-[#D884A2] via-40% to-[#AE67FA]  text-white rounded-md px-10 py-3 text-base font-medium" aria-current="page">Sign up</a>
            </div>
        </div>
    </div>
</nav>
 
