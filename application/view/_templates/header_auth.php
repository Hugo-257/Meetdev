<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="utf-8">
    <title>MeetDev</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" async />


      <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body class="h-full  bg-[#F8F8FA] relative">
        <nav class="pt-2 pb-2 bg-[#24212F] z-10 overflow-visible  relative">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="<?php echo URL ?>">
                                <img class="h-10 w-12" src="<?php echo URL; ?>img/logo-white.png" alt="Your Company">
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="#"
                                    class="hover:text-gray-300  text-white rounded-md px-3 py-2 text-base font-normal">About</a>
                                <a href="#"
                                    class="hover:text-gray-300  text-white rounded-md px-3 py-2 text-base font-normal">Contact</a>
                            </div>
                        </div>
                    </div>

                    <div class="relative ml-3 z-10 overflow-visible">
                          <div
                            class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full">
                            <button onClick="toogleAvatar()" class="font-semibold text-[#3A2E67] dark:text-gray-300">
                                <?php echo ($avatarName) ?>
                            </button>
                         </div>
                         <div id="myDropdown" class="absolute right-2 py-3  -bottom-18  w-[10em] bg-white hover:bg-gray-100 shadow rounded hidden">
                             <div class="flex  mb-2  justify-center">
                                <a class="pl-2" href="<?php URL ?>myspace">My space</a>
                            </div> 
                            <div class="w-full h-[0.04em] mb-2 bg-gray-200"></div>
                            <div class="flex mb-1 pl-2 ">
                                <img src="<?php echo URL; ?>img/power-off.png" class="w-[1.5  em] h-[1.5em]" alt="out-btn"/>
                                <a class="pl-2" href="<?php URL ?>auth/disconnect">Disconnect</a>
                            </div>
                          </div>
                    </div>
                </div>
        </nav>