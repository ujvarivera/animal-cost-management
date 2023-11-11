<template>
    <Head title="Állatorvos adatainak szerkesztése" />

    <AuthenticatedLayout>
        <template #header>
            {{ vet.name }} állatorvos adatainak szerkesztése
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

            <form @submit.prevent="form.put(route('vets.update', vet))" class="mt-6 space-y-6">
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
                <div>
                    <InputLabel for="zipcode" value="Irányítószám" />

                    <TextInput
                        id="zipcode"
                        type="number"
                        class="mt-1 block w-full"
                        v-model="form.zipcode"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.zipcode" />
                </div>
                <div>
                    <InputLabel for="city" value="Város" />

                    <TextInput
                        id="city"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.city"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.city" />
                </div>
                <div>
                    <InputLabel for="street" value="Utca" />

                    <TextInput
                        id="street"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.street"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.street" />
                </div>
                <div>
                    <InputLabel for="street_number" value="Utcaszám" />

                    <TextInput
                        id="street_number"
                        type="number"
                        class="mt-1 block w-full"
                        v-model="form.street_number"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.street_number" />
                </div>
                <div>
                    <InputLabel for="phone_number" value="Telefonszám" />

                    <TextInput
                        id="phone_number"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.phone_number"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.phone_number" />
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

const { vet } = defineProps({
    vet: Object
})

const form = useForm({
    name: vet.name,
    zipcode: vet.zipcode,
    city: vet.city,
    street: vet.street,
    street_number: vet.street_number,
    phone_number: vet.phone_number,
});
</script>