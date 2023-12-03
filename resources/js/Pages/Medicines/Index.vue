<template>
    <Head title="Gyógyszerek" />

    <AuthenticatedLayout>
        <template #header>
            Gyógyszerek
            <ButtonLink v-if="permissions.manage" :href="route('medicines.create')" class="bg-purple-800 hover:bg-purple-700">Gyógyszer hozzáadása</ButtonLink>
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <MedicinesDatatable :medicines="medicines" :permissions="permissions"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ButtonLink from '@/Components/Custom/ButtonLink.vue';
import MedicinesDatatable from './Partials/MedicinesDatatable.vue'

const { medicines, permissions } = defineProps({
    medicines: Array,
    permissions: Array
})
</script>
