<template>
    <Head title="Beszállító adatainak módosítása" />

    <AuthenticatedLayout>
        <template #header>
            {{ supplier.name }} beszállító adatainak módosítása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <SupplierEditForm :supplier="supplier"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import SupplierEditForm from './Partials/SupplierEditForm.vue'

const { supplier } = defineProps({
    supplier: Object
})
</script>