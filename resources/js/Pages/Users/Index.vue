<template>
    <Head title="Felhasználók" />

    <AuthenticatedLayout>
        <template #header>
            Felhasználók
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

                <DataTable :value="users.data" paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]" 
                    sortMode="multiple" removableSort showGridlines tableStyle="min-width: 50rem">
                    <Column field="name" header="Név" sortable></Column>
                    <Column field="email" header="E-mail" sortable></Column>
                    <Column field="role.name" header="Szerep" sortable></Column>
                </DataTable>
            </div>
        </div>
      
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue'
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

import { Head } from '@inertiajs/vue3';
import Info from '@/Components/Custom/Info.vue'

const props = defineProps({
    users: Object
})

</script>
