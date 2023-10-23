<template>
    <Head title="Állatfajok" />

    <AuthenticatedLayout>
        <template #header>
            Állatfajok
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

                <DataTable :value="animalTypes" paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]" 
                    sortMode="multiple" removableSort showGridlines tableStyle="min-width: 50rem">
                    <Column field="name" header="Név" sortable></Column>
                </DataTable>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

const props = defineProps({
    animalTypes: Array
})
</script>
