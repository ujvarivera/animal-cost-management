<template>
    <Head title="Álaltfaj módosítása" />

    <AuthenticatedLayout>
        <template #header>
            {{ animaltype.name }} módosítása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <AnimalTypeEditForm :animaltype="animaltype"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AnimalTypeEditForm from './Partials/AnimalTypeEditForm.vue'

const { animaltype } = defineProps({
    animaltype: Object
})
</script>