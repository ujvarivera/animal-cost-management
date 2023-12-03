<template>
    <Head title="Gyógyszer módosítása" />

    <AuthenticatedLayout>
        <template #header>
            {{ medicine.name }} módosítása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <MedicineEditForm :medicine="medicine"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import MedicineEditForm from './Partials/MedicineEditForm.vue'

const { medicine } = defineProps({
    medicine: Object,
});
</script>