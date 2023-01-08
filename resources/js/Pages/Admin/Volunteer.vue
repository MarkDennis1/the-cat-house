<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Modal from "@/Components/Modal.vue";
import InputError from "@/Components/InputError.vue";

import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import BreadCrumbs from "../../Components/BreadCrumbs.vue";

const form = useForm({
    id: "",
    title: "",
    first_name: "",
    last_name: "",
    address: "",
    phone_number: "",
    occupation: "",
    email: "",
    age: "",
    interested_in: [],
    experience: "",
});

const showModal = ref(false);

const openModal = (volunteer = null) => {
    showModal.value = true;

    form.id = volunteer.id;
    form.title = "View Volunteer";
    form.first_name = volunteer.first_name;
    form.last_name = volunteer.last_name;
    form.address = volunteer.address;
    form.phone_number = volunteer.phone_number;
    form.occupation = volunteer.occupation;
    form.email = volunteer.email;
    form.age = volunteer.age;
    form.interested_in = JSON.parse(volunteer.interested_in);
    form.experience = volunteer.experience;
    console.log(form.interested_in);
};

const closeModal = () => {
    form.reset();
    showModal.value = false;
};

const onDestroy = (id) => {
    if (confirm("Are you sure?")) {
        Inertia.delete(route("volunteers.destroy", id));
    }
};

const onSubmit = () => {
    form.json_interested_in = JSON.stringify(form.interested_in);
    if (refIsEdit.value) {
        form.put(route("volunteers.update", form.id), {
            onSuccess: () => {
                closeModal();
            },
        });
    } else {
        form.post(route("volunteers.store"), {
            onSuccess: () => {
                closeModal();
            },
        });
    }
};

defineProps({
    volunteers: Array,
});
</script>

<template>
    <AppLayout title="Volunteer">
        <Modal :show="showModal" maxWidth="2xl">
            <form @submit.prevent="onSubmit" class="p-4" disabled>
                <div class="flex items-center justify-between">
                    <h1 class="font-bold text-xl">{{ form.title }}</h1>

                    <button @click="closeModal" type="button" class="">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-9 h-9"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                    </button>
                </div>
                <hr class="my-8 h-px bg-gray-200 border-0 dark:bg-gray-700" />

                <div class="flex justify-between items-center">
                    <div class="m-6 w-full">
                        <label
                            for="fname"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >First Name</label
                        >
                        <input
                            type="text"
                            id="fname"
                            disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            v-model="form.first_name"
                        />
                        <InputError :message="form.errors.first_name" />
                    </div>
                    <div class="m-6 w-full">
                        <label
                            for="lname"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Last Name</label
                        >
                        <input
                            type="text"
                            id="lname"
                            disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            v-model="form.last_name"
                        />
                        <InputError :message="form.errors.last_name" />
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="m-6 w-full">
                        <label
                            for="number"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Phone Number</label
                        >
                        <input
                            type="text"
                            id="number"
                            disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            v-model="form.phone_number"
                        />
                        <InputError :message="form.errors.phone_number" />
                    </div>
                    <div class="m-6 w-full">
                        <label
                            for="occupation"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Occupation</label
                        >
                        <input
                            type="text"
                            id="occupation"
                            disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            v-model="form.occupation"
                        />
                        <InputError :message="form.errors.occupation" />
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="m-6 w-full">
                        <label
                            for="email"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Email</label
                        >
                        <input
                            type="email"
                            id="email"
                            disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            v-model="form.email"
                        />
                        <InputError :message="form.errors.email" />
                    </div>
                    <div class="m-6 w-full">
                        <label
                            for="age"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Age</label
                        >
                        <input
                            type="number"
                            id="age"
                            disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            v-model="form.age"
                        />
                        <InputError :message="form.errors.age" />
                    </div>
                </div>

                <div class="m-6">
                    <label
                        for="address"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Address</label
                    >
                    <input
                        type="text"
                        id="address"
                        disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        v-model="form.address"
                    />
                    <InputError :message="form.errors.address" />
                </div>
                <div class="m-6">
                    <label
                        for="age_category"
                        class="block mb-2 text-sm font-medium text-gray-900"
                        >Interested in:</label
                    >
                    <div
                        v-for="interest in form.interested_in"
                        class="flex items-center mb-4"
                    >
                        <input
                            id="checkbox1"
                            type="checkbox"
                            disabled
                            checked="{{true}}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label
                            for="checkbox1"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            >{{ interest }}</label
                        >
                    </div>
                    <div
                        class="mb-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        v-if="form.interested_in === []"
                    >
                        <p>- Did not include any.</p>
                    </div>
                    <div class="mb-6">
                        <label
                            for="experience"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Tell us a bit about your background with animals,
                            your experiencewith volunteer groups, your interests
                            and why you want to volunteer with us</label
                        >
                        <textarea
                            id="experience"
                            disabled
                            rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write your thoughts here..."
                            v-model="form.experience"
                        ></textarea>
                    </div>
                </div>

                <hr class="my-8 h-px bg-gray-200 border-0 dark:bg-gray-700" />
            </form>
        </Modal>

        <template #header>
            <BreadCrumbs :folders="['Schedules']" />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Volunteers
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-[#D0EEE8] overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <div
                        class="overflow-x-auto relative shadow-md sm:rounded-lg"
                    >
                        <table
                            class="w-full text-sm text-left text-gray-500 -gray-400"
                        >
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 -gray-700 -gray-400"
                            >
                                <tr>
                                    <th scope="col" class="py-3 px-6">Name</th>
                                    <th scope="col" class="py-3 px-6">
                                        Address
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Phone Number
                                    </th>
                                    <th scope="col" class="py-3 px-6">Email</th>

                                    <th scope="col" class="py-3 px-6">
                                        Interested in
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="volunteer in volunteers"
                                    :key="volunteer.id"
                                    class="bg-white border-b -gray-700 hover:bg-gray-50"
                                >
                                    <td class="py-4 px-6">
                                        {{
                                            `${volunteer.first_name} ${volunteer.last_name}`
                                        }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ volunteer.address }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ volunteer.phone_number }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ volunteer.email }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ volunteer.interested_in }}
                                    </td>
                                    <td class="flex gap-1 py-4 px-6">
                                        <button
                                            @click="openModal(volunteer)"
                                            type="button"
                                            class="flex items-center gap-1 py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-4 h-4"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                                />
                                            </svg>
                                        </button>
                                        <button
                                            @click="onDestroy(volunteer.id)"
                                            type="button"
                                            class="flex items-center gap-1 py-2 px-3 text-xs font-medium text-center text-white bg-red-700 hover:bg-red-800 rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-4 h-4"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
                                                />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div
                            class="text-center text-xl w-full p-4"
                            v-if="volunteers == 0"
                        >
                            You have no pending volunteers..
                        </div>

                        <!-- Pagination -->
                        <!-- <nav class="flex justify-between items-center p-4" aria-label="Table navigation">
                            <span class="text-sm font-normal text-gray-500">Showing
                                <span class="font-semibold text-gray-900">1-10</span>
                                of
                                <span class="font-semibold text-gray-900">1000</span></span>
                            <ul class="inline-flex items-center -space-x-px">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                        <span class="sr-only">Previous</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                                </li>
                                <li>
                                    <a href="#" aria-current="page"
                                        class="z-10 py-2 px-3 leading-tight text-blue-600 bg-blue-50 border border-blue-300 hover:bg-blue-100 hover:text-blue-700">3</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">...</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">100</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 -gray-700">
                                        <span class="sr-only">Next</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav> -->
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
