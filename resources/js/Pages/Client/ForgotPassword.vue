<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import FormSection from "@/Components/FormSection.vue";
import ActionMessage from "@/Components/ActionMessage.vue";

const validatePassword = (password) => {

    if (password !== form.password_confirmation) {
        return "Password did not match"
    }

    if (password.length < 8) {
        return "Password must be at least 8 characters long";
    }

    var hasUpper = false,
        hasLower = false,
        hasNumber = false;
    for (var i = 0; i < password.length; i++) {
        var char = password.charAt(i);
        if (!hasUpper && char >= "A" && char <= "Z") {
            hasUpper = true;
        } else if (!hasLower && char >= "a" && char <= "z") {
            hasLower = true;
        } else if (!hasNumber && !isNaN(char)) {
            hasNumber = true;
        }
    }

    if (!hasUpper || !hasLower || !hasNumber) {
        return "Password must contain at least one uppercase letter, one lowercase letter, and one number";
    }

    return "valid";
};

defineProps({
    security: Array || [],
    email: String,
});

const answerError = ref("");
const passwordError = ref("");
const isCorrect = ref(false);

const answerForm = useForm({
    securityAnswer: "",
});
const form = useForm({
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = (security_answer) => {
    if (answerForm.securityAnswer !== security_answer) {
        answerError.value = "Wrong Answer";
    } else {
        answerError.value = "";
        isCorrect.value = true;
    }
};

const updatePassword = (email) => {
        passwordError.value = validatePassword(form.password);
        if (passwordError.value == "valid") {
            form.email = email;
            form.put(route("user-forgot-password.update", email));
        }
};
</script>

<template>
    <Head title="Forgot Password" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="!isCorrect" class="mb-4">Security Question</div>

        <div v-if="!isCorrect" class="mb-4 font-medium text-sm text-green-600">
            {{ security.security_question }}
        </div>

        <div v-if="!isCorrect">
            <form @submit.prevent="submit(security.security_answer)">
                <div>
                    <InputLabel for="answer" value="Answer" />
                    <TextInput
                        id="answer"
                        v-model="answerForm.securityAnswer"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                    />
                    <InputError class="mt-2" :message="answerError" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton
                        :class="{ 'opacity-25': answerForm.processing }"
                        :disabled="answerForm.processing"
                    >
                        Submit
                    </PrimaryButton>
                </div>
            </form>
        </div>

        <div v-if="isCorrect" class="mt-10 sm:mt-0">
            <SectionBorder />
            <FormSection @submitted="updatePassword(email)">
                <template #title> Update Password </template>

                <template #description>
                    Ensure your account is using a long, random password to stay
                    secure.
                </template>

                <template #form>
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="password" value="New Password" />
                        <TextInput
                            id="password"
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-full"
                            autocomplete="new-password"
                        />
                        <InputError
                            :message="form.errors.password"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel
                            for="password_confirmation"
                            value="Confirm Password"
                        />
                        <TextInput
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            type="password"
                            class="mt-1 block w-full"
                            autocomplete="new-password"
                        />
                        <InputError :message="passwordError" class="mt-2" />
                    </div>
                </template>

                <template #actions>
                    <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                        Saved.
                    </ActionMessage>

                    <PrimaryButton
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Save
                    </PrimaryButton>
                </template>
            </FormSection>
        </div>
    </AuthenticationCard>
</template>
