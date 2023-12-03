<template>
    <Head title="Készletek" />

    <AuthenticatedLayout>
        <template #header>
            Készletek
            <ButtonLink v-if="permissions.manage" :href="route('supplies.create')" class="bg-purple-800 hover:bg-purple-700">Készletváltozás rögzítése</ButtonLink>
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <SuppliesDatatable :supplies="supplies" :permissions="permissions"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ButtonLink from '@/Components/Custom/ButtonLink.vue';
import SuppliesDatatable from './Partials/SuppliesDatatable.vue'

const { supplies, permissions } = defineProps({
    supplies: Array,
    permissions: Array
})
</script>
