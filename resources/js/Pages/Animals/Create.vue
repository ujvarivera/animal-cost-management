<template>
    <Head title="Új állat hozzáadása" />

    <AuthenticatedLayout>
        <template #header>
            Új állat hozzáadása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <AnimalCreateForm :animalTypes="animalTypes"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AnimalCreateForm from './Partials/AnimalCreateForm.vue';

const { animalTypes } = defineProps({
    animalTypes: Array
})

</script>