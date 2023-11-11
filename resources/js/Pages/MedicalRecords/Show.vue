<template>
    <Head title="Állatorvosi vizsgálat részletei" />

    <AuthenticatedLayout>
        <template #header>
            Vizsgálat részletei
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

                <div class="text-xl flex flex-col justify-center items-center">
                    <p class="py-2">
                        <span class="font-bold">Név: </span>
                        <span>{{ medicalRecord.description }}</span>
                    </p>
                    <p class="py-2">
                        <span class="font-bold">Vizsgált állat neve: </span>
                        <span class="font-bold text-red-600">
                            <Link :href="route('animals.show', medicalRecord.animal)" class="hover:underline">
                                {{ medicalRecord.animal.name }}
                            </Link>
                        </span>
                    </p>
                    <p class="py-2">
                        <span class="font-bold">Vizsgáló orvos neve: </span>
                        <span class="font-bold text-red-600">
                            <Link :href="route('vets.show', medicalRecord.vet.id)" class="hover:underline">{{ medicalRecord.vet.name }}</Link>
                        </span>
                    </p>
                    <p class="py-2">
                        <span class="font-bold">Vizsgálat dátuma: </span>
                        <span>{{ medicalRecord.examination_date }}</span>
                    </p>
                    <p class="py-2">
                        <span class="font-bold">Következő esedékes vizsgálat dátuma: </span>
                        <span>{{ medicalRecord.next_examination }}</span>
                    </p>
                    <p class="py-2">
                        <span class="font-bold">Vizsgálat teljes költsége: </span>
                        <span class="font-bold text-red-600">{{ hufCurrency.format(totalCost) }}</span>
                    </p>
                </div>

            </div>

            <div class="p-6 border-b border-gray-200">
                <DataTable v-model:filters="filters" :value="medicalRecord.lines" paginator :rows="5" 
                    :rowsPerPageOptions="[5, 10, 20, 50]" sortMode="multiple" removableSort showGridlines 
                    tableStyle="min-width: 50rem" :globalFilterFields="['examination_name']">
                    <template #header>
                        <div class="flex justify-end">
                            <span class="p-input-icon-left">
                                <TextInput v-model="filters['global'].value" placeholder="Keresés" class="w-20"/>
                            </span>
                        </div>
                    </template>
                    <template #empty> Nem található részlet. </template>
                    <Column field="examination_name" header="Elvégzett kezelés" sortable></Column>  
                    <Column field="cost" header="Kiadás (Ft)" sortable>
                        <template #body="slotProps">
                            <div>{{ hufCurrency.format(slotProps.data.cost) }}</div>
                        </template>
                    </Column>
                    <Column header="Törlés" v-if="permissions.manage">
                        <template #body="line">
                            <ButtonLink method="delete" :href="route('medical-record-lines.destroy', line.data)" class="bg-red-400 hover:bg-red-500">
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
import { Head, Link } from '@inertiajs/vue3';
import { showImage, isAdmin, hufCurrency } from '@/utils/utils'
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ButtonLink from '@/Components/Custom/ButtonLink.vue';
import TextInput from '@/Components/TextInput.vue';
import { FilterMatchMode } from 'primevue/api';
import { ref } from 'vue';

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
});
const props = defineProps({
    medicalRecord: Object,
    totalCost: Number,
    permissions: Array
})

</script>
