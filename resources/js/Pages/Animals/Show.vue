<template>
    <Head title="Állat megtekintése" />

    <AuthenticatedLayout>
        <template #header>
            {{ animal.name }} {{ animal.animal_type.name }} adatai
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6">
                <AnimalDetails :animal="animal"/>
                <AnimalMedicalRecordsDatatable :animalMedicalRecords="animal.medical_records" :permissions="permissions"/>
                <AnimalSupplyDatatable :animalSupplies="animal.supplies" :permissions="permissions"/>
            </div>

        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AnimalDetails from './Partials/AnimalDetails.vue';
import AnimalSupplyDatatable from './Partials/AnimalSupplyDatatable.vue';
import AnimalMedicalRecordsDatatable from './Partials/AnimalMedicalRecordsDatatable.vue';

const props = defineProps({
    animal: Object,
    permissions: Array
})

</script>
