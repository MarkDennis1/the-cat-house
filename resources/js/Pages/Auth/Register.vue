<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const securityQuestion = [
    "What was the street name you lived in as a child?",
    "What primary school did you attend?",
    "In what city or town was your first job?",
    "What was the make and model of your first car?",
    "What is your oldest cousin's first and last name?",
];

const form = useForm({
    first_name: "",
    last_name: "",
    address: "",
    phone_number: "",
    age: "",
    citizenship: "",
    occupation: "",
    email: "",
    password: "",
    password_confirmation: "",
    security_question: "",
    security_answer: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="first_name" value="First Name" />
                <TextInput
                    id="first_name"
                    v-model="form.first_name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="first_name"
                />
                <InputError class="mt-2" :message="form.errors.first_name" />
            </div>

            <div class="mt-4">
                <InputLabel for="first_name" value="Last Name" />
                <TextInput
                    id="last_name"
                    v-model="form.last_name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="last_name"
                />
                <InputError class="mt-2" :message="form.errors.last_name" />
            </div>
            <div class="mt-4">
                <InputLabel for="address" value="Address" />
                <TextInput
                    id="address"
                    v-model="form.address"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="address"
                />
                <InputError class="mt-2" :message="form.errors.address" />
            </div>
            <div class="mt-4">
                <InputLabel for="phone_number" value="Phone Number" />
                <TextInput
                    id="phone_number"
                    v-model="form.phone_number"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="phone_number"
                />
                <InputError class="mt-2" :message="form.errors.phone_number" />
            </div>
            <div class="mt-4">
                <InputLabel for="age" value="Age" />
                <TextInput
                    id="age"
                    v-model="form.age"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="age"
                />
                <InputError class="mt-2" :message="form.errors.age" />
            </div>
            <div class="mt-4">
                <InputLabel for="citizenship" value="Citizenship" />
                <TextInput
                    id="citizenship"
                    v-model="form.citizenship"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="citizenship"
                />
                <InputError class="mt-2" :message="form.errors.citizenship" />
            </div>
            <div class="mt-4">
                <InputLabel for="occupation" value="Occupation" />
                <TextInput
                    id="occupation"
                    v-model="form.occupation"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="occupation"
                />
                <InputError class="mt-2" :message="form.errors.occupation" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <label
                for="countries"
                class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Select a security question</label
            >
            <select
                v-model="form.security_question"
                id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
                <option v-for="question in securityQuestion" :value="question">
                    {{ question }}
                </option>
            </select>
            <InputError class="mt-2" :message="form.errors.security_question" />
            <div class="mt-4">
                <InputLabel for="security_answer" value="Security Answer" />
                <TextInput
                    id="security_answer"
                    v-model="form.security_answer"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="security_answer"
                />
                <InputError
                    class="mt-2"
                    :message="form.errors.security_answer"
                />
            </div>
            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="password_confirmation"
                    value="Confirm Password"
                />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                    Already registered?
                </Link>

                <PrimaryButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Register
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
