<template>
    <div class="p-6 border-b border-gray-200">

        <div class="text-xl flex flex-col justify-center items-center">
            <p class="py-2">
                <span class="font-bold">Név: </span>
                <span>{{ medicalRecord.description }}</span>
            </p>
            <p class="py-2">
                <span class="font-bold">Vizsgált állat neve: </span>
                <span class="font-bold text-red-600">
                    <Link :href="route('animals.show', medicalRecord.animal)" class="hover:underline">
                        {{ medicalRecord.animal.name }}
                    </Link>
                </span>
            </p>
            <p class="py-2">
                <span class="font-bold">Vizsgáló orvos neve: </span>
                <span class="font-bold text-red-600">
                    <Link :href="route('vets.show', medicalRecord.vet.id)" class="hover:underline">{{ medicalRecord.vet.name }}</Link>
                </span>
            </p>
            <p class="py-2">
                <span class="font-bold">Vizsgálat dátuma: </span>
                <span>{{ medicalRecord.examination_date }}</span>
            </p>
            <p class="py-2">
                <span class="font-bold">Következő esedékes vizsgálat dátuma: </span>
                <span>{{ medicalRecord.next_examination }}</span>
            </p>
            <p class="py-2">
                <span class="font-bold">Vizsgálat teljes költsége: </span>
                <span class="font-bold text-red-600">{{ hufCurrency.format(totalCost) }}</span>
            </p>
        </div>

    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { hufCurrency } from '@/utils/utils'
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ButtonLink from '@/Components/Custom/ButtonLink.vue';
import TextInput from '@/Components/TextInput.vue';

const { medicalRecord, totalCost } = defineProps({
    medicalRecord: Object,
    totalCost: Number,
})
</script>
