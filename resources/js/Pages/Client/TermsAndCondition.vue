<script setup>
import BreadCrumbs from "@/Components/BreadCrumbs.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
    <AppLayout title="terms and condition">
        <template #header>
            <BreadCrumbs :folders="['Terms and Condition']" />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Terms and Condition
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                Terms and Condition
            </div>
        </div>
    </AppLayout>
</template>
