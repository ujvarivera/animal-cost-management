<template>
    <Head title="Állatorvosi vizsgálatok" />

    <AuthenticatedLayout>
        <template #header>
            Állatorvosi vizsgálatok
            <ButtonLink v-if="permissions.manage" :href="route('medical-records.create')" class="bg-purple-800 hover:bg-purple-700">Új Vizsgálat</ButtonLink>
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <MedicalRecordsDatatable 
                    :medicalRecords="medicalRecords"
                    :totalCostOfAll="totalCostOfAll"
                    :permissions="permissions"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import MedicalRecordsDatatable from './Partials/MedicalRecordsDatatable.vue'
import ButtonLink from '@/Components/Custom/ButtonLink.vue';

const { medicalRecords, totalCostOfAll, permissions } = defineProps({
    medicalRecords: Array,
    totalCostOfAll: Number,
    permissions: Array
})

</script>
