<template>
    <Head title="Állat megtekintése" />

    <AuthenticatedLayout>
        <template #header>
            {{ props.animal.name }} megtekintése
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="pb-10">
                    <p>Születésnap: {{ animal.birthday }}</p>
                    <p>Hímnemű: {{ animal.is_male == 1 ? 'Igen' : 'Nem' }}</p>
                    <p>Állatfaj: {{ animal.animal_type.name }}</p>
                </div>

                <img :src="showImage() + animal.image" alt="Image about the animal" class="w-80 h-80">

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    animal: Object
})

function showImage() {
    return "/storage/";
}
</script>
