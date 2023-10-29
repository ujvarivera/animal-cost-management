<template>
    <Head title="Kezdőoldal" />

    <AuthenticatedLayout>
        <template #header>
            Kezdőoldal
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

                <div class="flex">
                    <Card title="Állatfajok száma" :description="animalTypesCount"/>
                    <Card title="Állatok száma" :description="animalsCount"/>
                    <Card title="Teljes állatorvosi költség" :description="hufCurrency.format(costOfMedicalRecords)"/>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3';
import Card from '@/Components/Custom/Card.vue'
import { hufCurrency } from '@/utils/utils'

const props = defineProps({
    animalsCount: Number,
    animalTypesCount: Number,
    costOfMedicalRecords: Number
})

</script>
