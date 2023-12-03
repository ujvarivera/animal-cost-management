<template>
    <Head title="Állatorvosi vizsgálat részletei" />

    <AuthenticatedLayout>
        <template #header>
            Vizsgálat részletei
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <MedicalRecordDetails :medicalRecord="medicalRecord" :totalCost="totalCost"/>
            <MedicalRecordLinesDatatable :medicalRecord="medicalRecord" :permissions="permissions"/>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import MedicalRecordDetails from './Partials/MedicalRecordDetails.vue'
import MedicalRecordLinesDatatable from './Partials/MedicalRecordLinesDatatable.vue'

const { medicalRecord, totalCost, permissions } = defineProps({
    medicalRecord: Object,
    totalCost: Number,
    permissions: Array
})
</script>
