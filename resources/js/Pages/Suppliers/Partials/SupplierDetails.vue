<template>
    <div class="text-xl flex flex-col justify-center items-center">
        <p class="py-2">
            <span class="font-bold">Név: </span>
            <span>{{ supplier.name }}</span>
        </p>
        <p class="py-2">
            <span class="font-bold">Cím: </span>
            <span class="mr-1">{{ supplier.zipcode }}</span>
            <span>{{ supplier.city }}, </span>
            <span class="mr-1">{{ supplier.street }} </span>
            <span>{{ supplier.street_number }}</span>
        </p>
        <p class="py-2">
            <span class="font-bold">Telefonszám: </span>
            <span>{{ supplier.phone_number }}</span>
        </p>
        <p class="py-2">
            <span class="font-bold">Adószám: </span>
            <span>{{ supplier.tax_number }}</span>
        </p>
        <p class="py-2">
            <span class="font-bold">Cégjegyzékszám: </span>
            <span>{{ supplier.registration_number }}</span>
        </p>
    </div>
</template>

<script setup>
const { supplier } = defineProps({
    supplier: Object,
})
</script>