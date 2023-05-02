<header class="bg-[#24212F] pb-52 relative overflow-hidden z-0">
    <img class="absolute  -right-20" src="<?php echo URL; ?>img/blob.png" alt="">
    <div class="mx-auto max-w-7xl px-4 pt-28  sm:px-6 lg:px-8 ">
        <div class="static flex overflow-visible ">
            <div class="flex flex-col basis-4/5  mt-16 ">
                <h1
                    class="text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r to-[#F49867] via-80% from-[#AE67FA]">
                    The event platform for developpers.
                </h1>
                <h3 class="text-lg text-white w-2/4 mt-6">
                    Meet people, grow your connections with people around you, know what’s knew in your area.
                </h3>
                <div class="flex mt-12 space-x-12">
                    <a href="#explore"
                        class=" bg-gradient-to-r from-[#F49867] via-[#D884A2] via-40% to-[#AE67FA]  text-white rounded-md px-16 py-3 text-base font-bold"
                        aria-current="page">Explore</a>
                    <a href="#"
                        class=" bg-gradient-to-r bg-white  text-[#3A2E67] rounded-md px-16 py-3 text-base font-bold"
                        aria-current="page">Contact us</a>
                </div>
            </div>
            <div class="pt-12 absolute right-2 ">
                <img class="w-[32rem]" src="<?php echo URL; ?>img/hero-img.png" alt="hero-image" />
            </div>
        </div>
    </div>
</header>

<main class="w-full bg-[#F8F8FA]">
    <div class="px-8 py-16 mx-auto max-w-7xl">
        <h1 class="text-2xl font-bold mb-12" id="explore">Upcoming events</h1>
        <div class="static grid grid-cols-3 grid-flow-row gap-8 px-20  ">
            <?php foreach ($events as $event) { ?>
                        <div class="max-w-sm rounded-lg overflow-hidden shadow-lg pb-4 relative ">
                            <img class="w-full" src="<?php echo (URL . 'uploads/' . $event->image); ?>"
                                alt="event-img" />
                            <a href="<?php echo URL . 'myspace/' . (in_array($event->id, $favorites) ? 'remove?id=' : 'save?id=') . $event->id; ?>">
                                <div
                                    class=" absolute w-[2.5rem] h-[2.5rem] rounded-full bg-white  top-3 right-3 flex justify-center items-center">
                                    <img src="<?php echo URL . 'img/' . (in_array($event->id, $favorites) ? 'saved_icon.png' : 'save_icon.png') ; ?>" alt="save-icon" />
                                </div>
                            </a>
                            <a href="<?php echo URL . "details?id=" . $event->id ?>">

                                <div class="px-6 py-4 flex">
                                    <div class=" px-2  basis-1/5 flex flex-col justify-left items-center">
                                        <p class="font-semibold text-base text-[#6C63FF] mb-2"><?php echo (substr(Helper::getMonthFromDate($event->date), 0, 3)) ?></p>
                                        <p class="font-semibold text-base display-block "><?php echo (explode("-", $event->date)[2]) ?></p>
                                    </div>
                                    <div class="basis-4/5 justify-left">
                                        <p class="text-medium font-medium mb-2"> <?php echo $event->nom ?> </p>
                                        <p class="text-regular text-gray-400"> <?php echo substr($event->description, 0, 50) . '...' ?> <span class="text-regular text-[#6C63FF]">more</span> </p>
                                    </div>
                                </div>
                            </a>

                        </div>
            <?php } ?>
        </div>
        <div class="flex w-full justify-center items-center mt-12">
            <a href="<?php echo URL; ?>preview"
                class=" bg-gradient-to-r bg-white  text-[#3A2E67] rounded-lg px-16 py-3 text-base font-bold"
                aria-current="page">View all</a>
        </div>
    </div>
</main>