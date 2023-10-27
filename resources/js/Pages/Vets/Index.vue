<template>
    <Head title="Állatorvosok" />

    <AuthenticatedLayout>
        <template #header>
            Állatorvosok
            <ButtonLink :href="route('vets.create')" class="bg-purple-800 hover:bg-purple-700">Állatorvos hozzáadása</ButtonLink>
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

                <DataTable v-model:filters="filters" :value="vets" paginator :rows="5" 
                    :rowsPerPageOptions="[5, 10, 20, 50]" sortMode="multiple" removableSort showGridlines 
                    tableStyle="min-width: 50rem" :globalFilterFields="['name']">
                    <template #header>
                        <div class="flex justify-end">
                            <span class="p-input-icon-left">
                                <TextInput v-model="filters['global'].value" placeholder="Keresés" class="w-20"/>
                            </span>
                        </div>
                    </template>
                    <template #empty> Nem található állatorvos. </template>

                    <Column field="name" header="Név" sortable></Column>
                    <Column field="city" header="Város" sortable></Column>
                    <Column field="phone_number" header="Telefonszám" sortable></Column>
                    <Column header="Megtekintés" v-if="false">
                        <template #body="vet">
                            <ButtonLink :href="route('vets.show', vet.data)" class="bg-purple-800 hover:bg-purple-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </ButtonLink>
                        </template>
                    </Column>
                    <Column header="Módosítás" v-if="false">
                        <template #body="vet">
                            <ButtonLink :href="route('vets.edit', vet.data)" class="bg-orange-800 hover:bg-orange-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </ButtonLink>
                        </template>
                    </Column>
                    <Column header="Törlés" v-if="isAdmin($page.props.auth.user.role_id)">
                        <template #body="vet">
                            <ButtonLink method="delete" :href="route('vets.destroy', vet.data)" class="bg-red-400 hover:bg-red-500">
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
    vets: Array
})

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
});
</script>
