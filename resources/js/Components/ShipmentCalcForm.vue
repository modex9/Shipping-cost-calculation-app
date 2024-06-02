<template>
        <div
        class="rounded-t-lg overflow-hidden border-t border-l border-r border-gray-400 px-3 py-10 bg-gray-200 flex justify-center">
        <div class="w-full max-w-md">
            <div class="w-full max-w-md">
                <div v-for="error in errors"
                    class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">Klaida!</span> {{ error }}
                </div>
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit="formSubmit" ref="formRef">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Transporto skyrius
                        </label>
                        <select v-model="transport_department" name='transport_department' @change="clearFormData"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option disabled value="">Pasirinkite transporto skyrių</option>
                            <option value="car_carrier">Autovežis</option>
                            <option value="cargo_truck">Vilkikas su tentine priekaba</option>
                        </select>
                    </div>
                    <CarCarrier v-if="transport_department === 'car_carrier'" @form-data="updateFormData"></CarCarrier>
                    <CargoTruck v-if="transport_department === 'cargo_truck'" @form-data="updateFormData"></CargoTruck>

                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline disabled:bg-slate-500">
                            Skaičiuoti
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
    import CarCarrier from './CarrierForms/CarCarrier.vue';
    import CargoTruck from './CarrierForms/CargoTruck.vue';

    import { ref } from 'vue';

    const errors = ref([]);
    const transport_department = ref(String);

</script>
