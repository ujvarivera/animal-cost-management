<template>
    <Head title="Állat megtekintése" />

    <AuthenticatedLayout>
        <template #header>
            {{ animal.name }} adatai
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
import { showImage, isAdmin, hufCurrency, changeSuppliableType } from '@/utils/utils'
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ButtonLink from '@/Components/Custom/ButtonLink.vue';
import TextInput from '@/Components/TextInput.vue';
import AnimalDetails from './Partials/AnimalDetails.vue';
import AnimalSupplyDatatable from './Partials/AnimalSupplyDatatable.vue';
import AnimalMedicalRecordsDatatable from './Partials/AnimalMedicalRecordsDatatable.vue';
import { FilterMatchMode } from 'primevue/api';
import { ref } from 'vue';

const props = defineProps({
    animal: Object,
    permissions: Array
})

</script>
