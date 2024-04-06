<template>
    <div
        class="rounded-t-lg overflow-hidden border-t border-l border-r border-gray-400 px-3 py-10 bg-gray-200 flex justify-center">
        <div class="w-full max-w-md">
            <div class="w-full max-w-md">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="transport_department">
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
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="n_vehicles">
                                Automobilių kiekis
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="number" name="n_vehicles" min="1" max="8" placeholder="Automobilių kiekis">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="distance">
                                Atstumas (km)
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="number" name="distance" min="0" placeholder="Atstumas (km)">
                        </div>
                    </div>
                    <div v-if="transport_department === 'cargo_truck'">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="cargo_weight">
                                Krovinio svoris
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="number" name="cargo_weight" min="500" placeholder="Krovinio svoris">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="distance">
                                Atstumas (km)
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="number" name="distance" min="0" placeholder="Atstumas (km)">
                        </div>
                        <div class="mb-4">
                            <fieldset>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Pavojingas krovinys</label>

                                <input type="radio" name="fragile_goods" value="1" id="fragile_goods_yes"/>
                                <label class="text-gray-700 text-sm font-bold mb-2 mr-2 ml-1" for="fragile_goods_yes">Taip</label>

                                <input type="radio" name="fragile_goods" value="0" id="fragile_goods_no"/>
                                <label class="text-gray-700 text-sm font-bold mb-2 mr-2 ml-1" for="fragile_goods_no">Ne</label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="button">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            transport_department: ''
        };
    }
};
</script>
