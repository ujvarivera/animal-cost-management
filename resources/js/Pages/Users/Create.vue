<template>
    <Head title="Új felhasználó hozzáadása" />

    <AuthenticatedLayout>
        <template #header>
            Új felhasználó hozzáadása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <UserCreateForm />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import UserCreateForm from './Partials/UserCreateForm.vue'
</script>