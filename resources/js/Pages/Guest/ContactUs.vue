<template>

    <Head title="Contact Us" />

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

        <main class="bg-[#5CC2AC]/10 w-screen h-screen px-8 pt-24 pb-8 text-sm">
            <div class="bg-[#5CC2AC]/20 h-full flex items-center justify-center gap-10 rounded-lg shadow-xl">
                <div>
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
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
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
                    <div class="mapouter">
                        <div class="gmap_canvas rounded-lg">
                            <!-- <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0"
                                marginwidth="0"
                                src="https://maps.google.com/maps?width=200&amp;height=200&amp;hl=en&amp;q=Cavity City, Philippines&amp;t=k&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                href="https://formatjson.org/">format json</a> -->

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3866.1095784289764!2d120.91317591744384!3d14.305065400000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d5e2624b3b21%3A0x9d8b94ccdca59394!2sThe%20Cat%20House!5e0!3m2!1sen!2sph!4v1673465036627!5m2!1sen!2sph"
                                width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
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

const showingNavigationDropdown = ref(false);

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
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