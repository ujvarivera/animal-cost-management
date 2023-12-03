<template>
    <Head title="Készletváltozás" />

    <AuthenticatedLayout>
        <template #header>
            Készletváltozás felvitele
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <SupplyCreateForm
                    :suppliableTypes="suppliableTypes"
                    :animals="animals"
                    :suppliers="suppliers"
                    :equipments="equipments"
                    :nourishments="nourishments"
                    :medicines="medicines"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import SupplyCreateForm from './Partials/SupplyCreateForm.vue'

const props = defineProps({
    suppliableTypes: Array,
    animals: Array,
    suppliers: Array,
    equipments: Array,
    nourishments: Array, 
    medicines: Array
})

</script>