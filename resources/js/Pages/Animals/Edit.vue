<template>
    <Head title="Állat módosítása" />

    <AuthenticatedLayout>
        <template #header>
            {{ animal.name }} adatainak módosítása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <AnimalEditForm :animal="animal" :animalTypes="animalTypes"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AnimalEditForm from './Partials/AnimalEditForm.vue'

const { animal, animalTypes } = defineProps({
    animal: Object,
    animalTypes: Array
})

</script>