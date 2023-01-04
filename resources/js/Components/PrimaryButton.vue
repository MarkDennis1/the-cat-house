<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-[#5CC2AC] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-[#3D8172] hover:text-white active:bg-[#3D8172] focus:outline-none focus:border-[#3D8172] focus:ring focus:ring-[#28564C] disabled:opacity-25 transition">
        <slot />
    </button>
</template>
