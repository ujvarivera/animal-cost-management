<template>
    <Head title="Új vizsgálat hozzáadása" />

    <AuthenticatedLayout>
        <template #header>
            Új vizsgálat hozzáadása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <MedicalRecordCreateForm :animals="animals" :vets="vets"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import MedicalRecordCreateForm from './Partials/MedicalRecordCreateForm.vue'

const { animals, vets } = defineProps({
    animals: Array,
    vets: Array
})
</script>