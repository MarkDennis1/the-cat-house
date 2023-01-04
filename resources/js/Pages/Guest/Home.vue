<template>

    <Head title="Home" />

    <div class="bg-gray-100">
        <nav class="bg-[#C2E9E0] w-screen border-b border-[#C2E9E0] shadow fixed top-0 left-0 z-50 transition-all">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 transition-all">
                <div class="flex justify-between h-16 transition-all">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <Link href="home">
                            <ApplicationMark class="block h-9 w-auto" />
                            </Link>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <NavLink href="home" :active="route().current('home')">
                                Home
                            </NavLink>
                            <NavLink href="about-us" :active="route().current('about-us')">
                                About Us
                            </NavLink>
                            <NavLink href="adopt" :active="route().current('adopt')">
                                Adopt
                            </NavLink>
                            <NavLink href="volunteer" :active="route().current('volunteer')">
                                Volunteer
                            </NavLink>
                            <NavLink href="ways-to-help" :active="route().current('ways-to-help')">
                                Ways to Help
                            </NavLink>
                            <NavLink href="contact-us" :active="route().current('contact-us')">
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
                    <ResponsiveNavLink href="home" :active="route().current('home')">
                        Home
                    </ResponsiveNavLink>
                    <ResponsiveNavLink href="about-us" :active="route().current('about-us')">
                        About Us
                    </ResponsiveNavLink>
                    <ResponsiveNavLink href="adopt" :active="route().current('adopt')">
                        Adopt
                    </ResponsiveNavLink>
                    <ResponsiveNavLink href="volunteer" :active="route().current('volunteer')">
                        Volunteer
                    </ResponsiveNavLink>
                    <ResponsiveNavLink href="ways-to-help" :active="route().current('ways-to-help')">
                        Ways to Help
                    </ResponsiveNavLink>
                    <ResponsiveNavLink href="contact-us" :active="route().current('contact-us')">
                        Contact Us
                    </ResponsiveNavLink>
                </div>
            </div>
        </nav>

        <main class="bg-gray-100 px-8 pt-24 pb-8 text-sm">
            <div class="bg-[#D0EEE8] rounded-lg shadow-xl">
                <div class="h-[90vh] flex items-center justify-center gap-40 text-center">
                    <div>
                        <p class="text-4xl font-bold uppercase">
                            Home of rescued puspins
                        </p>
                        <p class="text-base uppercase">
                            Promotes adoption and
                            spaying / neutering
                        </p>

                        <div class="mt-5 space-x-1">
                            <LinkButton :href='"adopt"'>
                                Adopt
                            </LinkButton>
                            <LinkButton :href='"ways-to-help"'>
                                Donate
                            </LinkButton>
                        </div>
                    </div>

                    <div>
                        <ApplicationMark class="w-[300px] h-[300px]" />
                    </div>
                </div>

                <div class="px-10 pb-20 text-center">
                    <div>
                        <p class="mb-[-5px] tracking-widest">ฅ^•ﻌ•^ฅ</p>
                        <hr class="bg-black w-full h-1 mb-10 mx-auto rounded border-0" />
                    </div>
                    <div>
                        <p class="text-xl font-semibold uppercase">Happy National Cat Day</p>
                        <p>We will be live on Unang Hirit August 08, 2022 <br>
                            Tantan rescue story will be featured ABANGAN !!!
                        </p>

                        <img src="https://i.ibb.co/JCGN3Y3/national-cat-day.png" alt="national-cat-day" border="0"
                            class="w-2/3 h-2/3 mx-auto mt-5">
                    </div>
                </div>

                <div class="text-center">
                    <div class="px-10">
                        <p class="mb-[-5px] tracking-widest">ฅ^•ﻌ•^ฅ</p>
                        <hr class="bg-black w-full h-1 mb-10 mx-auto rounded border-0" />
                    </div>

                    <p class="text-xl font-semibold uppercase rounded-lg">Featured cats</p>

                    <div class="px-10 pb-10 flex justify-around gap-5">
                        <div class="bg-slate-100 w-[33%] mt-10 rounded-lg border dark:bg-slate-800 lg:mt-5">
                            <div class="h-[300px]">
                                <img src="https://i.ibb.co/P6MvHkS/cholo.jpg" alt="cholo"
                                    class="w-full h-full object-cover rounded-t-lg" loading="lazy" />
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

                        <div class="bg-slate-100 w-[33%] mt-5 rounded-lg border dark:bg-slate-800">
                            <div class="h-[300px]">
                                <img src="https://i.ibb.co/qs2yk8H/tiang.jpg" alt="tiang"
                                    class="w-full h-full object-cover rounded-t-lg" loading="lazy" />
                            </div>

                            <div class="h-[150px] mt-5 pb-3">
                                <p class="text-base font-semibold tracking-wider">Hi! Im Tiang</p>
                                <p class="mx-3">
                                    Tiang is estimated to have been born in 2019. She came to us after
                                    her person passed away. Unfortunately, she was alone.
                                </p>
                            </div>
                        </div>

                        <div class="bg-slate-100 w-[33%] mt-5 rounded-lg border dark:bg-slate-800">
                            <div class="h-[300px]">
                                <img src="https://i.ibb.co/6H7Q44N/aya.jpg" alt="aya"
                                    class="w-full h-full object-cover rounded-t-lg" loading="lazy" />
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

                    <LinkButton :href='"adopt"'>
                        Available cats
                    </LinkButton>
                </div>

                <div class="mt-20 pb-10 text-center">
                    <div class="px-10 ">
                        <p class="mb-[-5px] tracking-widest">ฅ^•ﻌ•^ฅ</p>
                        <hr class="bg-black w-full h-1 mb-10 mx-auto rounded border-0" />
                    </div>

                    <p class="text-xl font-semibold uppercase">
                        See how you can help us
                    </p>

                    <div class="md:px-40">
                        <div class="mt-10 rounded-lg border">
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
                                        <img src="https://i.ibb.co/bb2SG6h/adopt.png" alt="animals-for-adoption"
                                            class="w-[150px]" />
                                        <p class="mt-1">Animals for adoption</p>
                                    </div>

                                    <div>
                                        <img src="https://i.ibb.co/4RwNxHR/donate.png" alt="animals-for-adoption"
                                            class="w-[150px] mt-8 lg:mt-0" />
                                        <p class="mt-1">Volunteers needed</p>
                                    </div>

                                    <div>
                                        <img src="https://i.ibb.co/k4wGXdr/volunteer.png" alt="animals-for-adoption"
                                            class="w-[150px] mt-8 lg:mt-0" />
                                        <p class="mt-1">Donation</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-20 pb-10 text-center">
                    <div class="px-10 ">
                        <p class="mb-[-5px] tracking-widest">ฅ^•ﻌ•^ฅ</p>
                        <hr class="bg-black w-full h-1 mb-10 mx-auto rounded border-0" />
                    </div>

                    <div class="px-20 flex gap-20">
                        <div>
                            <p class="mb-2 text-lg font-semibold uppercase tracking-wider text-left">
                                Contact Us
                            </p>

                            <div class="w-full flex mb-3">
                                <svg class="text-red-500 w-[32px] h-[32px]" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd">
                                    </path>
                                </svg>

                                <div class="ml-3 text-left">
                                    <p class="font-semibold">The Cat House</p>
                                    <p>Cavite City, Philippines</p>
                                </div>
                            </div>

                            <div class="w-full flex mb-3 items-center">
                                <svg class="w-[32px] h-[32px] text-green-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                    </path>
                                </svg>

                                <p class="ml-3 font-semibold">0906-235-2037</p>
                            </div>

                            <div class="w-full flex mb-3 items-center">
                                <svg class="w-[32px] h-[32px] text-orange-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                    </path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>

                                <p class="ml-3 font-semibold">solsandsiblings@gmail.com</p>
                            </div>

                            <div class="w-full flex mb-3 items-center">
                                <svg class="w-[32px] h-[32px] text-blue-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z">
                                    </path>
                                </svg>

                                <p class="ml-3 font-semibold">@thecathouse</p>
                            </div>
                        </div>

                        <div>
                            <p class="mb-2 text-lg font-semibold uppercase tracking-wider">
                                Our Pages
                            </p>

                            <div class="flex flex-col items-start gap-1">
                                <a href="home">Home</a>
                                <a href="about-us">About Us</a>
                                <a href="adopt">Adopt</a>
                                <a href="volunteer">Volunteer</a>
                                <a href="ways-to-help">Ways to Help</a>
                                <a href="contact-us">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue'
import { ref } from 'vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import LinkButton from '@/Components/LinkButton.vue';

const showingNavigationDropdown = ref(false);
</script>

<style scoped>

</style>