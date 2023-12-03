<template>
    <Head title="Állatorvosok" />

    <AuthenticatedLayout>
        <template #header>
            Állatorvosok
            <ButtonLink v-if="permissions.manage" :href="route('vets.create')" class="bg-purple-800 hover:bg-purple-700">Állatorvos hozzáadása</ButtonLink>
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <VetsDatatable :vets="vets" :permissions="permissions"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ButtonLink from '@/Components/Custom/ButtonLink.vue';
import VetsDatatable from './Partials/VetsDatatable.vue'

const { vets, permissions } = defineProps({
    vets: Array,
    permissions: Array
})
</script>
