<template>
    <div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Automobilių kiekis
            </label>
            <input v-model="form.num_cars"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="number" name="num_cars" placeholder="Automobilių kiekis">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Atstumas (km)
            </label>
            <input v-model="form.distance"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="number" name="distance" step="0.1" placeholder="Atstumas (km)">
        </div>
    </div>
</template>

<script setup>
defineProps({
    form: Object,
});
</script>
