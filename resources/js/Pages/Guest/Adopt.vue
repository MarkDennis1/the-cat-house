<template>

    <Head title="Adopt" />

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
                            @click="
                                showingNavigationDropdown =
                                !showingNavigationDropdown
                            ">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{
                                    hidden: showingNavigationDropdown,
                                    'inline-flex':
                                        !showingNavigationDropdown,
                                }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{
                                    hidden: !showingNavigationDropdown,
                                    'inline-flex':
                                        showingNavigationDropdown,
                                }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div :class="{
                block: showingNavigationDropdown,
                hidden: !showingNavigationDropdown,
            }" class="sm:hidden transition-all">
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
            <Modal :show="showModal">
                <div class="p-4">
                    <div class="flex items-center justify-between py-1 px-4">
                        <h1 class="font-bold text-xl"></h1>

                        <button @click="closeModal" type="button" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-9 h-9">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                    <form class="px-4">
                        <div class="overflow-auto">
                            <div class="flex justify-between items-center gap-2 px-4 py-6">
                                <img :src="form.catImg" class="w-6/12 rounded-full" />
                                <div class="w-6/12 pl-5">
                                    <p class="font-bold">Cat name: <span class="font-normal">{{ form.catName }}</span>
                                    </p>
                                    <p class="font-bold">Cat age: <span class="font-normal">{{ form.catAge }}</span></p>
                                    <p class="font-bold">Cat tags: <span class="font-normal">{{ form.catTags }}</span>
                                    </p>
                                    <p class="font-bold">Cat color: <span class="font-normal">{{ form.catColor }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </Modal>

            <div class="bg-[#D0EEE8] rounded-lg shadow-xl">
                <div class="h-[90vh] flex mx-20 items-center justify-center text-center">
                    <div class="bg-slate-100 rounded-lg border p-5 flex flex-col items-center justify-center gap-5">
                        <p class="text-xl font-semibold uppercase">
                            How to Adopt
                        </p>

                        <p class="text-base font-semibold uppercase tracking-wider">
                            The protocols that we used for adoption are based on
                            Philippine Animal Welfare (PAW) These has already
                            been through difficult times. we need to make sure
                            that they will find a home that will truely love
                            them
                        </p>

                        <div>
                            <p class="font-semibold uppercase">
                                Fill out the application form
                            </p>
                            <p>
                                Please download and fill out the adoption form.
                                Kindly attach the photos of your home for ocular
                                inspection particularly the area where your new
                                pet will be kept.
                            </p>
                        </div>

                        <div>
                            <p class="font-semibold uppercase">
                                Zoom interview
                            </p>
                            <p>
                                Because of the pandemic, we use zoom for the
                                interview. Using the form, you will be asked to
                                select a date and time for your 1st interview at
                                least 3 days in advance. That way, we can check
                                our availability of our interview date.
                            </p>
                        </div>

                        <div class="mb-5">
                            <p class="font-semibold uppercase">
                                Shelter visits
                            </p>
                            <p>
                                Your visit will be scheduled if you pass the
                                interview. The 1st visit is where you will
                                choose your prospective pet and have your 2nd
                                interview. The 2nd visit is the time to bond
                                with your pet and finalize your application then
                                you may take your pet.
                            </p>
                        </div>

                        <LinkButton :href="'login'">
                            Login to apply for adoption
                        </LinkButton>
                    </div>
                </div>

                <div class="mt-20 pb-10 text-center">
                    <div class="px-10">
                        <p class="mb-[-5px] tracking-widest">ฅ^•ﻌ•^ฅ</p>
                        <hr class="bg-black w-full h-1 mb-10 mx-auto rounded border-0" />
                    </div>

                    <p class="mb-10 text-xl font-semibold uppercase">
                        Rescue story of cat Evie
                    </p>

                    <div class="flex items-center justify-center gap-10">
                        <div class="bg-slate-100 w-1/3 h-96 px-10 py-5 flex flex-col items-center gap-5 rounded-lg border">
                            <img src="https://i.ibb.co/5sGHZxv/cat-story-01.png" alt="cat-story-01" border="0"
                                class="w-40 h-40 rounded-lg">

                            <p>
                                Si Evie ay natagpuan sa isang palengke, aksidente siyang nakita at natagpuan na halos
                                naipit na ng sasakyan. Malakas ang ulan at baha na sa palengke kaya naman ni-rescue si
                                Evie at inilagay sa bag upang iuwi sa The Cat House.Si Evie ay natagpuan sa isang
                                palengke, aksidente siyang nakita at natagpuan na halos
                                naipit na ng sasakyan. Malakas ang ulan at baha na sa palengke kaya naman ni-rescue si
                                Evie at inilagay sa bag upang iuwi sa The Cat House.
                            </p>

                        </div>

                        <div class="bg-slate-100 w-1/3 h-96 px-10 py-5 flex flex-col items-center gap-5 rounded-lg border">
                            <img src="https://i.ibb.co/MNPsVht/cat-story-02.png" alt="cat-story-02" border="0"
                                class="w-40 h-40 rounded-lg">

                            <p>
                                Ngayon ay eto na si Evie, malusog at malakas dahil sa tulong ng The Cat House.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-20 pb-10 text-center">
                    <div class="px-10">
                        <p class="mb-[-5px] tracking-widest">ฅ^•ﻌ•^ฅ</p>
                        <hr class="bg-black w-full h-1 mb-10 mx-auto rounded border-0" />
                    </div>
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="overflow-hidden sm:rounded-lg p-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 place-content-center">
                                    <button @click="openModal(cat)" v-for="cat in cats"
                                        class="bg-slate-100 p-4 border-2 rounded-xl m-2 drop-shadow-md">
                                        <img class="w-stretch object-fit rounded-xl" :src="cat.image_path" />
                                        <div class="text-start mt-4">
                                            <p class="text-lg">
                                                <span class="font-bold">Cat ID:
                                                </span>
                                                <span>{{ cat.id }}</span>
                                            </p>
                                            <p class="">
                                                <span class="font-bold">Name:
                                                </span>
                                                <span>{{ cat.name }}</span>
                                            </p>
                                            <p class="">
                                                <span class="font-bold">Color:
                                                </span>
                                                <span>{{
                                                    cat.age_category
                                                }}</span>
                                            </p>
                                            <p class="">
                                                <span class="font-bold">
                                                    Tags:
                                                </span>
                                                <span class="keep-all px-2 mx-1 rounded-full text-sm bg-slate-400"
                                                    v-for="tag in cat.tags.split(
                                                        ','
                                                    )">{{ tag }}</span>
                                            </p>
                                            <p class="">
                                                <span class="font-bold">Color:
                                                </span>
                                                <span>{{ cat.color }}</span>
                                            </p>
                                        </div>
                                    </button>
                                    <div v-if="cats.length == 0">
                                        No cats available today, comeback
                                        tommorow.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-20 pb-10 text-center">
                    <div class="px-10">
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
                                        clip-rule="evenodd"></path>
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

                                <p class="ml-3 font-semibold">
                                    solsandsiblings@gmail.com
                                </p>
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
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import ApplicationMark from "@/Components/ApplicationMark.vue";
import { ref } from "vue";
import Modal from "@/Components/Modal.vue";
import InputError from "@/Components/InputError.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import LinkButton from "@/Components/LinkButton.vue";

const showingNavigationDropdown = ref(false);
const showModal = ref(false);

const form = useForm({
    catID: "",
    catImg: "",
    catName: "",
    catAge: "",
    catTags: "",
    catColor: "",
    fname: "",
    lname: "",
    address: "",
    phoneNumber: "",
    age: "",
    email: "",
    citizenship: "",
    occupation: "",
    radioQuestion: [
        {
            question: "Does anyone in the household have allergies?",
            answer: false,
        },
        {
            question: "Do you own or rent your residence?",
            answer: false,
        },
        {
            question: "Is the cat for yourself?",
            answer: false,
        },
        // {
        //     question: "If not, please profive your parent or guardian's name?",
        //     answer: "",
        // },
        {
            question: "Have you ever adopted from The Cat House?",
            answer: false,
        },
        {
            question: "Are you interested in adopting a cat?",
            answer: false,
        },
    ],
    jsonRadioQuestion: "",
});

const closeModal = () => {
    showModal.value = false;
    form.reset();
};

const openModal = (cat) => {
    showModal.value = true;
    form.catID = cat.id;
    form.catImg = cat.image_path;
    form.catAge = cat.age_category;
    form.catColor = cat.color;
    form.catTags = cat.tags;
    form.catName = cat.name;
};

defineProps({
    cats: Array,
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<style scoped>

</style>
