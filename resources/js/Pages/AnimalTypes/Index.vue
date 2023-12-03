<template>
    <Head title="Állatfajok" />

    <AuthenticatedLayout>
        <template #header>
            Állatfajok
            <ButtonLink v-if="permissions.manage" :href="route('animaltypes.create')" class="bg-purple-800 hover:bg-purple-700">Állatfaj hozzáadása</ButtonLink>
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <AnimalTypesDatatable :animalTypes="animalTypes" :permissions="permissions"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ButtonLink from '@/Components/Custom/ButtonLink.vue';
import AnimalTypesDatatable from './Partials/AnimalTypesDatatable.vue'

const props = defineProps({
    animalTypes: Array,
    permissions: Array
})
</script>
