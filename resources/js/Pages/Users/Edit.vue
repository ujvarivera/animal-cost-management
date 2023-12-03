<template>
    <Head title="Felhasználó adatainak módosítása" />

    <AuthenticatedLayout>
        <template #header>
            {{ user.name }} adatainak módosítása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <UserEditForm :user="user"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import UserEditForm from './Partials/UserEditForm.vue'

const { user } = defineProps({
    user: Object,
});
</script>