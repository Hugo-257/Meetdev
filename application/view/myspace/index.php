<main class="w-full bg-[#F8F8FA]">
    <div class="px-8 py-16 mx-auto max-w-7xl">
        <div class="w-full flex justify-between mb-4">
            <h1 class="text-3xl font-bold mb-12" id="explore">Bookmarked</h1>

        </div>
        <div class="static grid grid-cols-3 grid-flow-row gap-8 px-20  ">
            <?php foreach ($events as $event) { ?>
                        <div class="max-w-sm rounded-lg overflow-hidden shadow-lg pb-4 relative ">
                    
                            <img class="w-full" src="<?php echo (URL . 'uploads/' . $event->image); ?>"
                            alt="event-img" />
                            <a href="<?php echo (URL . 'myspace/' . 'remove?id=' . $event->id) ?>">
                                        <div
                                            class=" absolute w-[2.5rem] h-[2.5rem] rounded-full bg-white  top-3 right-3 flex justify-center items-center">
                                            <img src="<?php echo URL . 'img/' . 'saved_icon.png' ?>" alt="save-icon" />
                                        </div>
                                    </a>
                            <a href="<?php echo URL . "details?id=" . $event->id ?>">
                            <div class="px-6 py-4 flex">
                                <div class=" px-2  basis-1/5 flex flex-col justify-left items-center">
                                    <p class="font-semibold text-base text-[#6C63FF] mb-2"><?php echo strtoupper((substr(Helper::getMonthFromDate($event->date), 0, 3))) ?></p>
                                    <p class="font-semibold text-base display-block "><?php echo (explode("-", $event->date)[2]) ?></p>
                                </div>
                                <div class="basis-4/5 justify-left">
                                    <p class="text-medium font-medium mb-2"><?php echo $event->nom ?>  </p>
                                    <p class="text-regular text-gray-400"> <?php echo substr($event->description, 0, 50) . '...' ?>  <span class="text-regular text-[#6C63FF]">more</span> </p>
                                </div>
                            </div>
                        </a> 
                        </div>
            <?php } ?>
        </div>
    </div>
</main>