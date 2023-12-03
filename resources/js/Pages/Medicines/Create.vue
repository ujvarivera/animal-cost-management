<template>
    <Head title="Új gyógyszer hozzáadása" />

    <AuthenticatedLayout>
        <template #header>
            Új gyógyszer hozzáadása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <MedicineCreateForm />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import MedicineCreateForm from './Partials/MedicineCreateForm.vue'
</script>