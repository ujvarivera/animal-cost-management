<template>
    <Head title="Új vizsgálat hozzáadása" />

    <AuthenticatedLayout>
        <template #header>
            Új vizsgálat hozzáadása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

            <div class="font-bold text-xl">Vizsgálat adatai:</div>
            <form @submit.prevent="submitForm" class="mt-6 space-y-6">
                <div>
                    <InputLabel for="description" value="Név*" />

                    <TextInput
                        id="description"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.description"
                        required
                        autofocus
                    />

                    <InputError class="mt-2" :message="form.errors.description" />
                </div>
                <div>
                    <InputLabel for="animal_id" value="Állat neve*" />
                    <select v-model="form.animal_id" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                        <option v-for="animal in props.animals" :value="animal.id">
                            {{ animal.name }}
                        </option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.animal_id" />
                </div>
                <div>
                    <InputLabel for="vet_id" value="Vizsgálatot elvégző orvos*" />
                    <select v-model="form.vet_id" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                        <option v-for="vet in props.vets" :value="vet.id">
                            {{ vet.name }}
                        </option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.vet_id" />
                </div>
                <div>
                    <InputLabel for="examination_date" value="Vizsgálat dátuma*" />

                    <TextInput
                        id="examination_date"
                        type="date"
                        class="mt-1 block w-full"
                        v-model="form.examination_date"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.examination_date" />
                </div>
                <div>
                    <InputLabel for="next_examination" value="Következő esedékes vizsgálat dátuma" />

                    <TextInput
                        id="next_examination"
                        type="date"
                        class="mt-1 block w-full"
                        v-model="form.next_examination"
                    />

                    <InputError class="mt-2" :message="form.errors.next_examination" />
                </div>

                <div class="font-bold text-xl">Vizsgálat részletei, kezelések:</div>

                <div v-for="(row, index) in rows" :key="index">
                    <div>
                        <InputLabel :for="'examination_name_' + index" value="Kezelés neve" />
                        <TextInput
                        :id="'examination_name_' + index"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="row.examination_name"
                        required
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel :for="'cost_' + index" value="Kezelés költsége" />
                        <TextInput
                        :id="'cost_' + index"
                        type="number"
                        class="mt-1 block w-full"
                        v-model="row.cost"
                        required
                        />
                    </div>
                </div>

                <button type="button" @click="addNewRow">Kezelés hozzáadása</button>

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
    animals: Array,
    vets: Array
})

const form = useForm({
    description: null,
    examination_date: null,
    next_examination: null,
    total_cost: null,
    animal_id: 1,
    vet_id: 1,

    examination_names: [''],
    costs: [''],
});

const rows = ref([
  { examination_name: '', cost: '' },
]);

const addNewRow = () => {
  // Add a new row with empty values
  rows.value.push({ examination_name: '', cost: '' });
};

function submitForm() {
    form.examination_names = rows.value.map((row) => row.examination_name)
    form.costs = rows.value.map((row) => row.cost)
    form.total_cost = form.costs.reduce((accumulator, currentValue) => accumulator + Number(currentValue), 0);
    form.post(route('medical-records.store'))
}
</script>