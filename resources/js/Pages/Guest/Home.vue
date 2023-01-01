<template>

    <Head title="Home" />

    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white w-screen border-b border-gray-100 shadow fixed top-0 left-0 transition-all">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 transition-all">
                <div class="flex justify-between h-16 transition-all">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <Link href="/guest/home">
                            <ApplicationMark class="block h-9 w-auto" />
                            </Link>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <NavLink href="/guest/home" :active="route().current('/guest/home')">
                                Home
                            </NavLink>
                            <NavLink href="about-us" :active="route().current('about-us)">
                                About Us
                            </NavLink>
                            <NavLink href="/guest/adopt" :active="route().current('/guest/adopt')">
                                Adopt
                            </NavLink>
                            <NavLink href="/guest/volunteer" :active="route().current('/guest/volunteer')">
                                Volunteer
                            </NavLink>
                            <NavLink href="/guest/ways-to-help" :active="route().current('/guest/ways-to-help')">
                                Ways to Help
                            </NavLink>
                            <NavLink href="/guest/contact-us" :active="route().current('/guest/contact-us')">
                                Contact Us
                            </NavLink>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition"
                            @click="showingNavigationDropdown = !showingNavigationDropdown">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path
                                    :class="{ 'hidden': showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path
                                    :class="{ 'hidden': !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div :class="{ 'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown }"
                class="sm:hidden transition-all">
                <div class="pt-2 pb-3 space-y-1">
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        Home
                    </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        About Us
                    </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        Adopt
                    </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        Volunteer
                    </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        Ways to Help
                    </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        Contact Us
                    </ResponsiveNavLink>
                </div>
            </div>
        </nav>

        <main class="text-xs">
            <div class="py-2 md:py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white  overflow-hidden shadow-xl sm:rounded-lg">
                        <section class="bg-[#5CC2AC]/10 h-screen text-center grid place-items-center">
                            <div>
                                <img src="https://i.ibb.co/TYbjJ4X/the-cat-house-logo.png" alt="website-logo"
                                    class="w-[200px] h-[200px] mx-auto" />
                                <p class="mt-5 text-lg font-semibold uppercase">
                                    Home of rescued puspins
                                </p>
                                <p class="text-base uppercase">
                                    Promotes adoption and <br />
                                    spaying / neutering
                                </p>

                                <div class="mt-5 space-x-1">
                                    <PrimaryButton>Adopt</PrimaryButton>
                                    <PrimaryButton>Donate</PrimaryButton>
                                </div>
                            </div>
                        </section>

                        <section class="bg-[#5CC2AC]/10 text-center px-10 pb-10">
                            <p class="mb-[-5px] tracking-widest">ฅ^•ﻌ•^ฅ</p>
                            <hr class="bg-black w-full h-1 mb-10 mx-auto rounded border-0 md:my-10 dark:bg-white" />

                            <p class="text-xl font-semibold uppercase rounded-lg">Featured cats</p>

                            <div class="md:px-40 lg:flex lg:gap-5">
                                <div class="bg-slate-100 mt-10 rounded-lg border dark:bg-slate-800 lg:mt-5">
                                    <div class="h-[300px]">
                                        <img src="" alt="cholo" class="w-full h-full object-cover rounded-t-lg"
                                            loading="lazy" />
                                    </div>

                                    <div class="h-[150px] mt-5 pb-3">
                                        <p class="text-base font-semibold tracking-wider">Hi! Im Cholo</p>
                                        <p class="mx-3">
                                            Cholo was born in spring 2020. He and his siblings weere taken by
                                            a kind woman who had many cats amd couldn't spend enought time
                                            with them.
                                        </p>
                                    </div>
                                </div>

                                <div class="bg-slate-100 mt-5 rounded-lg border dark:bg-slate-800">
                                    <div class="h-[300px]">
                                        <img src="" alt="cholo" class="w-full h-full object-cover rounded-t-lg"
                                            loading="lazy" />
                                    </div>

                                    <div class="h-[150px] mt-5 pb-3">
                                        <p class="text-base font-semibold tracking-wider">Hi! Im Tiang</p>
                                        <p class="mx-3">
                                            Tiang is estimated to have been born in 2019. She came to us after
                                            her person passed away. Unfortunately, she was alone.
                                        </p>
                                    </div>
                                </div>

                                <div class="bg-slate-100 mt-5 rounded-lg border dark:bg-slate-800">
                                    <div class="h-[300px]">
                                        <img src="" alt="cholo" class="w-full h-full object-cover rounded-t-lg"
                                            loading="lazy" />
                                    </div>

                                    <div class="h-[150px] mt-5 pb-3">
                                        <p class="text-base font-semibold tracking-wider">Hi! Im Aya</p>
                                        <p class="mx-3">
                                            Aya is estimated to have been in 2018. She was neutered through
                                            the cat house trap-neuter return in 2019 to live outdoors.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <button
                                class="bg-purple-500 text-white mt-5 px-3 py-2 rounded uppercase tracking-wider font-semibold dark:bg-purple-400 dark:text-black">
                                Available cats
                            </button>
                        </section>

                        <section class="text-center mt-20 px-10 pb-10">
                            <p class="mb-[-5px] tracking-widest">ฅ^•ﻌ•^ฅ</p>
                            <hr class="bg-black w-full h-1 mb-10 mx-auto rounded border-0 md:my-10 dark:bg-white" />

                            <p class="text-xl font-semibold uppercase rounded-lg">
                                See how you can help us
                            </p>

                            <div class="md:px-40">
                                <div class="bg-slate-100 mt-10 rounded-lg border dark:bg-slate-800">
                                    <div class="pb-3 mt-3 flex flex-col items-center">
                                        <p class="text-base font-semibold uppercase tracking-wider">
                                            Get involved and save lives
                                        </p>
                                        <p class="mx-3 mt-3 mb-10">
                                            We believe that every cats <br />
                                            deserve a loving home, <br />
                                            please help us with this mission.
                                        </p>

                                        <div class="lg:flex lg:gap-5 lg:items-center lg:justify-center">
                                            <div>
                                                <img src="" alt="animals-for-adoption" class="w-[150px]" />
                                                <p class="mt-1">Animals for adoption</p>
                                            </div>

                                            <div>
                                                <img src="" alt="animals-for-adoption" class="w-[150px] mt-8 lg:mt-0" />
                                                <p class="mt-1">Volunteers needed</p>
                                            </div>

                                            <div>
                                                <img src="" alt="animals-for-adoption" class="w-[150px] mt-8 lg:mt-0" />
                                                <p class="mt-1">Donation</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="text-center mt-20 px-10 pb-10">
                            <p class="mb-[-5px] tracking-widest">ฅ^•ﻌ•^ฅ</p>
                            <hr class="bg-black w-full h-1 mb-10 mx-auto rounded border-0 md:my-10 dark:bg-white" />

                            <p class="mb-10 text-xl font-semibold uppercase">Contact us</p>

                            <div class="md:px-40">
                                <div
                                    class="bg-slate-100 mt-10 px-3 py-5 rounded-lg border text-center flex flex-col items-center dark:bg-slate-800">
                                    <div class="w-full flex mb-3">
                                        <img src="" alt="" class="w-[32px] h-[32px]" />

                                        <div class="ml-3 text-left">
                                            <p class="font-semibold">The Cat House</p>
                                            <p>Cavite City, Philippines</p>
                                        </div>
                                    </div>

                                    <div class="w-full flex mb-3 items-center">
                                        <img src="" alt="" class="w-[32px] h-[32px]" />

                                        <p class="ml-3 font-semibold">0906-235-2037</p>
                                    </div>

                                    <div class="w-full flex mb-3 items-center">
                                        <img src="" alt="" class="w-[32px] h-[32px]" />

                                        <p class="ml-3 font-semibold">solsandsiblings@gmail.com</p>
                                    </div>

                                    <div class="w-full flex mb-3 items-center">
                                        <img src="" alt="" class="w-[32px] h-[32px]" />

                                        <p class="ml-3 font-semibold">@thecathouse</p>
                                    </div>

                                    <div class="mapouter mt-10">
                                        <div class="gmap_canvas rounded-lg">
                                            <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no"
                                                marginheight="0" marginwidth="0"
                                                src="https://maps.google.com/maps?width=200&amp;height=200&amp;hl=en&amp;q=Cavity City, Philippines&amp;t=k&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                                href="https://formatjson.org/">format json</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import { ref } from 'vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const showingNavigationDropdown = ref(false);
</script>

<style scoped>
.mapouter {
    position: relative;
    text-align: right;
    width: 100%;
    height: 300px;
}

.gmap_canvas {
    overflow: hidden;
    background: none !important;
    width: 100%;
    height: 300px;
}

.gmap_iframe {
    height: 300px !important;
}
</style>