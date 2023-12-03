<template>
    <Head title="Új beszállító hozzáadása" />

    <AuthenticatedLayout>
        <template #header>
            Új beszállító hozzáadása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <SupplierCreateForm />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import SupplierCreateForm from './Partials/SupplierCreateForm.vue'
</script>