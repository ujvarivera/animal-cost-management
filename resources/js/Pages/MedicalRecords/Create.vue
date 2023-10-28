<template>
    <Head title="Új állatfaj hozzáadása" />

    <AuthenticatedLayout>
        <template #header>
            Új állatfaj hozzáadása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

            <form @submit.prevent="form.post(route('animaltypes.store'))" class="mt-6 space-y-6">
                <div>
                    <InputLabel for="name" value="Név*" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
               
                <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing">Mentés</PrimaryButton>

                    <Transition
                        enter-active-class="transition ease-in-out"
                        enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out"
                        leave-to-class="opacity-0"
                    >
                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Sikeresen mentve.</p>
                    </Transition>
                </div>
            </form>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    description: null,
    examination_date: null,
    next_examination: null,
    total_cost: null,
    animal_id: null,
    vet_id: null
});
</script>