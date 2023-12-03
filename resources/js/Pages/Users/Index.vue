<template>
    <Head title="Felhasználók" />

    <AuthenticatedLayout>
        <template #header>
            Felhasználók
            <ButtonLink v-if="permissions.manage" :href="route('users.create')" class="bg-purple-800 hover:bg-purple-700">Új felhasználó</ButtonLink>
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <UsersDatatable 
                    :users="users"
                    :permissions="permissions"
                    :auth="auth"
                />
            </div>
        </div>
      
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ButtonLink from '@/Components/Custom/ButtonLink.vue';
import UsersDatatable from './Partials/UsersDatatable.vue'

const { users, permissions, auth } = defineProps({
    users: Object,
    permissions: Array,
    auth: Object
})
</script>
