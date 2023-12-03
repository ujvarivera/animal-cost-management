<template>
    <Head title="Állatorvos adatainak szerkesztése" />

    <AuthenticatedLayout>
        <template #header>
            {{ vet.name }} állatorvos adatainak szerkesztése
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <VetEditForm :vet="vet"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import VetEditForm from './Partials/VetEditForm.vue'

const { vet } = defineProps({
    vet: Object
})
</script>