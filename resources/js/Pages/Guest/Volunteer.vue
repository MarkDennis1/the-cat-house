<template>

    <Head title="Volunteer" />

    <div class="bg-gray-100 min-h-screen">
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

                    <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-6 sm:block">
                        <Link v-if="$page.props.user" :href="route('dashboard')"
                            class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>

                        <template v-else>
                            <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                            in</Link>

                            <Link v-if="canRegister" :href="route('register')"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
                        </template>
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
                <div class="px-20 pt-5 text-center">
                    <div class="bg-slate-100 pt-10 flex flex-col items-center justify-center rounded-lg border">
                        <p class="text-xl font-semibold uppercase">
                            How to Volunteer
                        </p>

                        <form action="" class="p-10">
                            <div class="mb-10 flex gap-10">
                                <div class="w-1/2">
                                    <div class="relative">
                                        <input type="text" id="floating_outlined"
                                            class="bg-transparent w-full px-2.5 pb-2.5 pt-4 text-sm rounded-lg border-1 border-gray-300 block appearance-none peer dark:border-gray-600 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600"
                                            placeholder=" " />
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-100 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-sky-600 peer-focus:dark:text-sky-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">First
                                            name</label>
                                    </div>

                                    <div class="mt-3 relative">
                                        <input type="text" id="floating_outlined"
                                            class="bg-transparent w-full px-2.5 pb-2.5 pt-4 text-sm rounded-lg border-1 border-gray-300 block appearance-none peer dark:border-gray-600 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600"
                                            placeholder=" " />
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-100 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-sky-600 peer-focus:dark:text-sky-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Last
                                            name</label>
                                    </div>

                                    <div class="mt-3 relative">
                                        <input type="text" id="floating_outlined"
                                            class="bg-transparent w-full px-2.5 pb-2.5 pt-4 text-sm rounded-lg border-1 border-gray-300 block appearance-none peer dark:border-gray-600 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600"
                                            placeholder=" " />
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-100 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-sky-600 peer-focus:dark:text-sky-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Address</label>
                                    </div>

                                    <div class="mt-3 relative">
                                        <input type="number" id="floating_outlined"
                                            class="bg-transparent w-full px-2.5 pb-2.5 pt-4 text-sm rounded-lg border-1 border-gray-300 block appearance-none peer dark:border-gray-600 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600"
                                            placeholder=" " />
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-100 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-sky-600 peer-focus:dark:text-sky-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Phone
                                            number</label>
                                    </div>

                                    <div class="mt-3 relative">
                                        <input type="text" id="floating_outlined"
                                            class="bg-transparent w-full px-2.5 pb-2.5 pt-4 text-sm rounded-lg border-1 border-gray-300 block appearance-none peer dark:border-gray-600 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600"
                                            placeholder=" " />
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-100 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-sky-600 peer-focus:dark:text-sky-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Occupation</label>
                                    </div>

                                    <div class="mt-3 relative">
                                        <input type="email" id="floating_outlined"
                                            class="bg-transparent w-full px-2.5 pb-2.5 pt-4 text-sm rounded-lg border-1 border-gray-300 block appearance-none peer dark:border-gray-600 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600"
                                            placeholder=" " />
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-100 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-sky-600 peer-focus:dark:text-sky-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Email
                                            address</label>
                                    </div>

                                    <div class="mt-3 relative">
                                        <input type="number" id="floating_outlined"
                                            class="bg-transparent w-full px-2.5 pb-2.5 pt-4 text-sm rounded-lg border-1 border-gray-300 block appearance-none peer dark:border-gray-600 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600"
                                            placeholder=" " />
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-100 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-sky-600 peer-focus:dark:text-sky-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Age</label>
                                    </div>
                                </div>

                                <div>
                                    <p class="mt-8 mb-3 text-left">
                                        Please choose all volunteer opportunities you are interested in:
                                    </p>

                                    <div class="flex items-center mb-4">
                                        <input id="checkbox-cat" type="checkbox" value=""
                                            class="w-4 h-4 text-sky-600 bg-gray-100 rounded border-gray-300 focus:ring-sky-500 dark:focus:ring-sky-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                        <label for="checkbox-cat"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cat
                                            caregiver at our main shelter</label>
                                    </div>

                                    <div class="flex items-center mb-4">
                                        <input id="checkbox-tour" type="checkbox" value=""
                                            class="w-4 h-4 text-sky-600 bg-gray-100 rounded border-gray-300 focus:ring-sky-500 dark:focus:ring-sky-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                        <label for="checkbox-tour"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tour guide
                                            during public hours</label>
                                    </div>

                                    <div class="flex items-center mb-4">
                                        <input id="checkbox-foster" type="checkbox" value=""
                                            class="w-4 h-4 text-sky-600 bg-gray-100 rounded border-gray-300 focus:ring-sky-500 dark:focus:ring-sky-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                        <label for="checkbox-foster"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Foster
                                            home</label>
                                    </div>

                                    <div class="flex items-center mb-4">
                                        <input id="checkbox-other" type="checkbox" value=""
                                            class="w-4 h-4 text-sky-600 bg-gray-100 rounded border-gray-300 focus:ring-sky-500 dark:focus:ring-sky-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                        <label for="checkbox-other"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                                    </div>

                                    <p class="my-10 font-semibold">
                                        Volunteer under the age of 18 must be accompanied by a parent/guardian
                                    </p>

                                    <p class="mt-8 mb-3 text-left">
                                        Tell us a bit about your background with animals, your experiencewith
                                        volunteer groups, your interests and why you want to volunteer with us
                                    </p>

                                    <textarea id="message" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 focus:ring-sky-500 focus:border-sky-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                        placeholder=""></textarea>

                                    <p class="mt-8 mb-3 text-left">
                                        Email is our preferred method of contact. At least our initial contact
                                        to you will likely be via email. Please monitor your spam, thank you!
                                    </p>
                                </div>
                            </div>

                            <LinkButton :href='"login"'>
                                Submit form
                            </LinkButton>
                        </form>
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



defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<style scoped>

</style>