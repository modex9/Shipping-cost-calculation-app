<template>
        <label class="mx-2">
            Showing per page
        </label>
        <select name="per_page" v-model="form.perPage" @change="form.post(perPageUrl)" class="shadow border rounded py-2 px-3 mx-2">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
        </select>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';1

const pageProps = usePage().props.value;

const form = useForm({
    perPage: pageProps.perPage,
    controller: pageProps.controller,
});

const perPageUrl = computed(() => '/per-page/' + form.perPage);

</script>
