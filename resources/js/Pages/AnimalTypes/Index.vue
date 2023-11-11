<template>
    <Head title="Állatfajok" />

    <AuthenticatedLayout>
        <template #header>
            Állatfajok
            <ButtonLink v-if="permissions.manage" :href="route('animaltypes.create')" class="bg-purple-800 hover:bg-purple-700">Állatfaj hozzáadása</ButtonLink>
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

                <DataTable v-model:filters="filters" :value="animalTypes" paginator :rows="5" 
                    :rowsPerPageOptions="[5, 10, 20, 50]" sortMode="multiple" removableSort showGridlines 
                    tableStyle="min-width: 50rem" :globalFilterFields="['name']">
                    <template #header>
                        <div class="flex justify-end">
                            <span class="p-input-icon-left">
                                <TextInput v-model="filters['global'].value" placeholder="Keresés" class="w-20"/>
                            </span>
                        </div>
                    </template>
                    <template #empty> Nem található állatfaj. </template>
                    <Column field="name" header="Név" sortable></Column>
                    <Column header="Törlés" v-if="permissions.manage">
                        <template #body="animalType">
                            <ButtonLink method="delete" :href="route('animaltypes.destroy', animalType.data)" class="bg-red-400 hover:bg-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </ButtonLink>
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
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ButtonLink from '@/Components/Custom/ButtonLink.vue';
import TextInput from '@/Components/TextInput.vue';
import { FilterMatchMode } from 'primevue/api';
import { ref } from 'vue';
import { isAdmin } from '@/utils/utils'

const props = defineProps({
    animalTypes: Array,
    permissions: Array
})

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
});
</script>
