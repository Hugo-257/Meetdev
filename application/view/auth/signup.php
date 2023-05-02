<div class="h-screen bg-[#F8F8FA]">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="mx-auto px-12 py-12 bg-white rounded">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto" src="<?php echo URL; ?>img/logo-black.png" alt="Your Company">
                <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign up</h2>
            </div>

            <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="<?php echo URL; ?>auth/register" method="POST">
                    <div class="flex flex-row space-x-6">
                        <div class="basis-1/2">
                            <label for="nom" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                            <div class="mt-2">
                                <input id="nom" name="nom" autocomplete="family-name" required
                                    class="block w-full rounded-md border-0 px-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="basis-1/2">
                            <label for="prenom" class="block text-sm font-medium leading-6 text-gray-900">Prénom</label>
                            <div class="mt-2">
                                <input id="prenom" name="prenom" autocomplete="given-name" required
                                    class="block w-full rounded-md border-0 px-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full rounded-md border-0 px-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="block w-full rounded-md border-0 px-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class=" flex  justify-center mx-auto">
                        <input type="submit" value="Sign up" name="register"
                            class="center w-2/4 flex justify-center rounded-lg bg-gradient-to-r from-[#F49867] via-[#D884A2] via-40% to-[#AE67FA] px-3 py-3 text-md font-semibold leading-6 text-white shadow-sm  hover:cursor-pointer">
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Vous avez déjà un compte?
                    <a href="<?php echo URL; ?>auth/"
                        class="font-semibold leading-6 text-[#FF6363]">Connectez-vous.</a>
                </p>
                <p class="mt-2 text-center text-sm text-gray-500 hover:text-gray-800 hover:underline ">
                    <a href="<?php echo URL;?>auth/admin" class="font-semibold leading-6  ">Aller espace admin.</a>
                </p>
            </div>
        </div>
    </div>
</div>