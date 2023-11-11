<template>
    <Head title="Készletváltozás" />

    <AuthenticatedLayout>
        <template #header>
            Készletváltozás felvitele
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

            <form @submit.prevent="form.post(route('supplies.store'))" class="mt-6 space-y-6">
                <div>
                    <InputLabel for="suppliable_type" value="Termék fajtája*" />

                    <select v-model="form.suppliable_type" @change="changeProducts()" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                        <option v-for="suppliable in suppliableTypes" :value="suppliable.type">
                            {{ suppliable.name }}
                        </option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.suppliable_type" />
                </div>
                <div>
                    <InputLabel for="suppliable_id" value="Termék neve*" />

                    <select v-model="form.suppliable_id" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                        <option v-for="suppliable in changeable" :value="suppliable.id">
                            {{ suppliable.name }}
                        </option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.suppliable_id" />
                </div>
                <div>
                    <InputLabel for="supply_type" value="Bejövő / Kimenő termék *" />

                    <select v-model="form.supply_type" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                        <option value="IN">Bejövő</option>
                        <option value="OUT">Kimenő</option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.supply_type" />
                </div>
                <div>
                    <InputLabel for="quantity" value="Mennyiség*" />

                    <TextInput
                        id="quantity"
                        type="number"
                        class="mt-1 block w-full"
                        v-model="form.quantity"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.quantity" />
                </div>
                <div>
                    <InputLabel for="unit_price" value="Egységár (Bejövő termék esetén)" />

                    <TextInput
                        id="unit_price"
                        type="number"
                        max="9999"
                        class="mt-1 block w-full"
                        v-model="form.unit_price"
                    />

                    <InputError class="mt-2" :message="form.errors.unit_price" />
                </div>
                <div v-if="form.supply_type=='IN'">
                    <InputLabel for="supplier_id" value="Beszállító neve (Bejövő termék esetén)" />

                    <select v-model="form.supplier_id" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                        <option :value="null">Beszállítás esetén a beszállító neve...</option>
                        <option v-for="supplier in suppliers" :value="supplier.id">
                            {{ supplier.name }}
                        </option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.supplier_id" />
                </div>
                <div v-if="form.supply_type=='OUT'">
                    <InputLabel for="animal_id" value="Állat neve (Kimenő termék esetén)" />
                    
                    <select v-model="form.animal_id" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                        <option :value="null">Ha ki lett adva állatnak, az állat neve...</option>
                        <option v-for="animal in animals" :value="animal.id">
                            {{ animal.name }}
                        </option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.animal_id" />
                </div>                
                <div>
                    <InputLabel for="date" value="Dátum*" />

                    <TextInput
                        id="date"
                        type="date"
                        class="mt-1 block w-full"
                        v-model="form.date"
                    />

                    <InputError class="mt-2" :message="form.errors.date" />
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
import { ref } from 'vue';

const props = defineProps({
    suppliableTypes: Array,
    animals: Array,
    suppliers: Array,
    equipments: Array,
    nourishments: Array, 
    medicines: Array
})

const form = useForm({
    suppliable_type: 'App\\Models\\Equipment', // suppliableTypes[0].type,
    suppliable_id: 1,
    supply_type: "IN",
    quantity: null,
    unit_price: null,
    date: null,
    animal_id: null,
    supplier_id: null,
});

const changeable = ref(props.equipments);

function changeProducts() {
    switch(form.suppliable_type) {
        case 'App\\Models\\Equipment':
            changeable.value = props.equipments;
            form.suppliable_id = 1
            break;
        case 'App\\Models\\Nourishment':
            changeable.value = props.nourishments;
            form.suppliable_id = 1
            break;
        case 'App\\Models\\Medicine':
            changeable.value = props.medicines;
            form.suppliable_id = 1
            break;
        default:
            form.suppliable_id = 1
        }
}
</script>