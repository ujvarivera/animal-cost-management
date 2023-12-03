<template>
    <Head title="Új állatfaj hozzáadása" />

    <AuthenticatedLayout>
        <template #header>
            Új állatfaj hozzáadása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <AnimalTypeCreateForm />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AnimalTypeCreateForm from './Partials/AnimalTypeCreateForm.vue'
</script>