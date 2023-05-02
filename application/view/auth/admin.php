<div class="h-screen bg-[#F8F8FA]">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="mx-auto px-12 py-8 bg-white shadow rounded">
             <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Admin space</h2>

            <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="<?php echo URL;?>admin/authenticate" method="POST">
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900"></label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" placeholder="Enter secret" autocomplete="current-password"
                                required
                                value="<?php echo $adminPass ?>"
                                class="block w-[28em] rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <p class="text-sm text-red-600"><?php echo $error ?></p>
                    </div>
                    <div class=" flex justify-center mx-auto">
                        <input type="submit" name="admin" value="Authenticate" 
                            class="center w-2/4 flex justify-center rounded-lg bg-gradient-to-r from-[#F49867] via-[#D884A2] via-40% to-[#AE67FA] px-3 py-3 text-md font-semibold leading-6 text-white shadow-sm hover:cursor-pointer "  />
                    </div>
                </form>

                <p class="mt-2 text-center text-sm text-gray-500 hover:text-gray-800 hover:underline ">
                    <a href="<?php echo URL;?>auth/" class="font-semibold leading-6  ">Espace authentification</a>
                </p>
            </div>
        </div>
    </div>
</div>