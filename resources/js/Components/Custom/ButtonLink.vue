<template>
    <Link :href="href" :class="classes">
        <slot name="icon" />
        <span class="mx-3">
            <slot />
        </span>
    </Link>
</template>

<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'flex items-center mt-4 py-2 px-6 bg-gray-500 bg-opacity-25 text-gray-100'
    : 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest transition ease-in-out duration-150'
);
</script>
