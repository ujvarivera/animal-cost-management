<template>
    <Head title="Állat" />

    <AuthenticatedLayout>
        <template #header>
            Állat
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

                <p>Hello {{ animal.name }}! - Edit Page</p>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    animal: Object
})
</script>
