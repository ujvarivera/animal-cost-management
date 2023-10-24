<template>
    <Head title="Állatok" />

    <AuthenticatedLayout>
        <template #header>
            Állatok
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

                <NavLink :href="route('animals.create')" as="button" class="text-gray-600">Új állat</NavLink>

                <DataTable :value="animals" paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]" 
                    sortMode="multiple" removableSort showGridlines tableStyle="min-width: 50rem">
                    <Column field="name" header="Név" sortable></Column>
                    <Column field="birthday" header="Szülinap" sortable></Column>
                    <Column field="animal_type.name" header="Állatfaj" sortable></Column>
                    <Column header="Műveletek">
                        <template #body="animal">
                            <NavLink :href="route('animals.show', animal.data)" as="button" class="text-gray-600">Megtekintés</NavLink>
                        </template>
                    </Column>
                    <Column header="Műveletek">
                        <template #body="animal">
                            <NavLink :href="route('animals.edit', animal.data)" as="button" class="text-gray-600">Módosítás</NavLink>
                        </template>
                    </Column>
                    <Column header="Műveletek">
                        <template #body="animal">
                            <NavLink method="delete" :href="route('animals.destroy', animal.data)" as="button" class="text-gray-600">Törlés</NavLink>
                        </template>
                    </Column>
                </DataTable>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primevue/resources/themes/lara-light-teal/theme.css'

const props = defineProps({
    animals: Array
})
</script>
