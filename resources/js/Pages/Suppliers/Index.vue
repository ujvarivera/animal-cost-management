<template>
    <Head title="Beszállítók" />

    <AuthenticatedLayout>
        <template #header>
            Beszállítók
            <ButtonLink v-if="permissions.manage" :href="route('suppliers.create')" class="bg-purple-800 hover:bg-purple-700">Új beszállító</ButtonLink>
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <SuppliersDatatable :suppliers="suppliers" :permissions="permissions"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ButtonLink from '@/Components/Custom/ButtonLink.vue';
import SuppliersDatatable from './Partials/SuppliersDatatable.vue'

const { suppliers, permissions }  = defineProps({
    suppliers: Array,
    permissions: Array
})
</script>
