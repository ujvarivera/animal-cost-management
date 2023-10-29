<template>
    <div class="max-w-sm mx-2 rounded shadow-zinc-500 overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ title }}</div>
            <p class="text-gray-700 text-xl flex justify-center items-center">
                {{ description }}
            </p>
        </div>
    </div>
</template>

<script setup>
const props = defineProps(['title', 'description']);
</script>