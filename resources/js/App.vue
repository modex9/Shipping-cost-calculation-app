<template>
    <div
        class="rounded-t-lg overflow-hidden border-t border-l border-r border-gray-400 px-3 py-10 bg-gray-200 flex justify-center">
        <div class="w-full max-w-md">
            <div class="w-full max-w-md">
                <div v-for="error in errors" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">Klaida!</span> {{ error }}
                </div>
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit="formSubmit" ref="formRef">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Transporto skyrius
                        </label>
                        <select v-model="transport_department" name='transport_department'
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option disabled value="">Pasirinkite transporto skyrių</option>
                            <option value="car_carrier">Autovežis</option>
                            <option value="cargo_truck">Vilkikas su tentine priekaba</option>
                        </select>
                    </div>
                    <div v-if="transport_department === 'car_carrier'">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Automobilių kiekis
                            </label>
                            <input v-model="num_cars"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="number" name="num_cars" placeholder="Automobilių kiekis">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Atstumas (km)
                            </label>
                            <input v-model="distance"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="number" name="distance" step="0.1" placeholder="Atstumas (km)">
                        </div>
                    </div>
                    <div v-if="transport_department === 'cargo_truck'">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Krovinio svoris
                            </label>
                            <input v-model="cargo_weight"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="number" name="cargo_weight" step="0.1" placeholder="Krovinio svoris">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Atstumas (km)
                            </label>
                            <input v-model="distance"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="number" name="distance" step="0.1" placeholder="Atstumas (km)">
                        </div>
                        <div class="mb-4">
                            <fieldset>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Pavojingas krovinys</label>

                                <input v-model="fragile_goods" type="radio" name="fragile_goods" value="1" id="fragile_goods_yes"/>
                                <label class="text-gray-700 text-sm font-bold mb-2 mr-2 ml-1" for="fragile_goods_yes">Taip</label>

                                <input v-model="fragile_goods" type="radio" name="fragile_goods" value="0" id="fragile_goods_no"/>
                                <label class="text-gray-700 text-sm font-bold mb-2 mr-2 ml-1" for="fragile_goods_no">Ne</label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline disabled:bg-slate-500"
                            >
                            Skaičiuoti
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <shipment-table :key="shipmentTableKey"></shipment-table>
</template>

<script>
import ShipmentTable from './ShipmentTable.vue';
export default {
    data() {
        return {
            transport_department: '',
            num_cars: '',
            distance: '',
            cargo_weight: '',
            fragile_goods: '',
            errors: '',
            shipmentTableKey: 0,
        };
    },
    components: {
        ShipmentTable
    },
    computed: {
            isCarCarrierFormFilled() {
                return !!this.num_cars && !!this.distance;
            },
            isCargoTruckFormFilled() {
                return !!this.cargo_weight && !!this.distance && !!this.fragile_goods;
            },
            isFormFilled() {
                if(this.transport_department == 'car_carrier') {
                    return this.isCarCarrierFormFilled;
                }
                if(this.transport_department == 'cargo_truck') {
                    return this.isCargoTruckFormFilled;
                }
                return false;
            }
    },
    methods: {
        formSubmit(e) {
            e.preventDefault();
            this.errors = [];
            let currentObj = this;
            let formData = {
                transport_department: this.transport_department,
            };

            if(this.transport_department == 'car_carrier') {
                formData.num_cars = this.num_cars;
                formData.distance = this.distance;
            }
            else if(this.transport_department == 'cargo_truck') {
                formData.cargo_weight = this.cargo_weight;
                formData.distance = this.distance;
                formData.fragile_goods = this.fragile_goods;
            }
            else {
                alert('Pasirinkite transporto skyrių.');
                return;
            }

            this.axios.post('http://localhost:8000/calculate', formData)
            .then(function (response) {
                if(response.data.errors) {
                    currentObj.errors = response.data.errors;
                }
                else {
                    currentObj.refresh();
                }
            })
            .catch(function (error) {
                if(typeof(error.response) == "undefined") {
                    return;
                }
                Object.values(error.response.data.errors)[0][0]
                if(typeof(error.response.data.errors) !== 'undefined') {
                    currentObj.errors = [];
                    Object.values(error.response.data.errors).forEach((el) =>
                        currentObj.errors.push(el[0])
                    );
                }
            });
        },
        refresh() {
            this.shipmentTableKey += 1;
        }
    }
};

</script>
