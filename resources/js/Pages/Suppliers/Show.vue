<template>
    <Head title="Beszállító adatainak megtekintése" />

    <AuthenticatedLayout>
        <template #header>
            {{ supplier.name }} beszállító adatai
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="text-xl flex flex-col justify-center items-center">
                    <p class="py-2">
                        <span class="font-bold">Név: </span>
                        <span>{{ supplier.name }}</span>
                    </p>
                    <p class="py-2">
                        <span class="font-bold">Cím: </span>
                        <span class="mr-1">{{ supplier.zipcode }}</span>
                        <span>{{ supplier.city }}, </span>
                        <span class="mr-1">{{ supplier.street }} </span>
                        <span>{{ supplier.street_number }}</span>
                    </p>
                    <p class="py-2">
                        <span class="font-bold">Telefonszám: </span>
                        <span>{{ supplier.phone_number }}</span>
                    </p>
                    <p class="py-2">
                        <span class="font-bold">Adószám: </span>
                        <span>{{ supplier.tax_number }}</span>
                    </p>
                    <p class="py-2">
                        <span class="font-bold">Cégjegyzékszám: </span>
                        <span>{{ supplier.registration_number }}</span>
                    </p>
                </div>
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
    supplier: Object,
})

</script>
