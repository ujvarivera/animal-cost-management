<template>
    <Head title="Beszállító adatainak módosítása" />

    <AuthenticatedLayout>
        <template #header>
            {{ supplier.name }} beszállító adatainak módosítása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

            <form @submit.prevent="form.put(route('suppliers.update', supplier))" class="mt-6 space-y-6">
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
                    <InputLabel for="tax_number" value="Adószám" />

                    <TextInput
                        id="tax_number"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.tax_number"
                    />

                    <InputError class="mt-2" :message="form.errors.tax_number" />
                </div>
                <div>
                    <InputLabel for="registration_number" value="Cégjegyzékszám" />

                    <TextInput
                        id="registration_number"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.registration_number"
                    />

                    <InputError class="mt-2" :message="form.errors.registration_number" />
                </div>
                <div>
                    <InputLabel for="zipcode" value="Irányítószám" />

                    <TextInput
                        id="zipcode"
                        type="number"
                        max="9999"
                        class="mt-1 block w-full"
                        v-model="form.zipcode"
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
                    />

                    <InputError class="mt-2" :message="form.errors.street" />
                </div>
                <div>
                    <InputLabel for="street_number" value="Utcaszám" />

                    <TextInput
                        id="street_number"
                        type="number"
                        max="100"
                        class="mt-1 block w-full"
                        v-model="form.street_number"
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

const { supplier } = defineProps({
    supplier: Object
})

const form = useForm({
    name: supplier.name,
    tax_number: supplier.tax_number,
    registration_number: supplier.registration_number,
    zipcode: supplier.zipcode,
    city: supplier.city,
    street: supplier.street,
    street_number: supplier.street_number,
    phone_number: supplier.phone_number
});
</script>