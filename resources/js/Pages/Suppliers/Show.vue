<template>
    <Head title="Beszállító adatainak megtekintése" />

    <AuthenticatedLayout>
        <template #header>
            {{ supplier.name }} beszállító adatai
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <SupplierDetails :supplier="supplier"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import SupplierDetails from './Partials/SupplierDetails.vue'

const { supplier } = defineProps({
    supplier: Object,
})
</script>
