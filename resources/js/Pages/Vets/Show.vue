<template>
    <Head title="Állatorvos megtekintése" />

    <AuthenticatedLayout>
        <template #header>
            {{ vet.name }} állatorvos
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <VetDetails :vet="vet" />
            <VetMedicalRecordsDatatable :vet="vet" :permissions="permissions"/>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import VetDetails from './Partials/VetDetails.vue'
import VetMedicalRecordsDatatable from './Partials/VetMedicalRecordsDatatable.vue'

const props = defineProps({
    vet: Object,
    permissions: Array
})
</script>
