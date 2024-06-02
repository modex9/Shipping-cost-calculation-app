<template>
    <div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Krovinio svoris
            </label>
            <input v-model="cargo_weight" @input="updateFormData"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="number" name="cargo_weight" step="0.1" placeholder="Krovinio svoris">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Atstumas (km)
            </label>
            <input v-model="distance" @input="updateFormData"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="number" name="distance" step="0.1" placeholder="Atstumas (km)">
        </div>
        <div class="mb-4">
            <fieldset>
                <label class="block text-gray-700 text-sm font-bold mb-2">Pavojingas krovinys</label>

                <input v-model="fragile_goods" type="radio" name="fragile_goods" value="1" @input="updateFormData"
                    id="fragile_goods_yes" />
                <label class="text-gray-700 text-sm font-bold mb-2 mr-2 ml-1"
                    for="fragile_goods_yes">Taip</label>

                <input v-model="fragile_goods" type="radio" name="fragile_goods" value="0" @input="updateFormData"
                    id="fragile_goods_no" />
                <label class="text-gray-700 text-sm font-bold mb-2 mr-2 ml-1"
                    for="fragile_goods_no">Ne</label>
            </fieldset>
        </div>
    </div>
</template>

<script>
import { ref, defineExpose } from 'vue';

export default {
    setup(_, { emit }) {
        const cargo_weight = ref('');
        const distance = ref('');
        const fragile_goods = ref('');

        const updateFormData = (event) => {
            emit('form-data', { [event.target.name]: event.target.value });
        };

        defineExpose({
            cargo_weight,
            distance,
            fragile_goods
        });

        return {
            updateFormData
        };
    }
};
</script>
