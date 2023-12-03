<template>
    <Head title="Állatok" />

    <AuthenticatedLayout>
        <template #header>
            Állatok
            <ButtonLink v-if="permissions.manage" :href="route('animals.create')" class="bg-purple-800 hover:bg-purple-700">Új állat</ButtonLink>
        </template>


        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <AnimalsDatatable :animals="animals" :permissions="permissions"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AnimalsDatatable from './Partials/AnimalsDatatable.vue'
import ButtonLink from '@/Components/Custom/ButtonLink.vue';

const props = defineProps({
    animals: Array,
    permissions: Array
})
</script>
