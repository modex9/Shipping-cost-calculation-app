<template>
    <div>
      <Head title="Shipments" />
      <h1 class="mb-8 text-3xl font-bold">Shipments</h1>

      <div class="bg-white rounded-md shadow overflow-x-auto">
        <div class="w-full">
            <div class="grid grid-cols-4 pb-3">
                <div class="col-span-1"></div>
                <div class="col-span-1">
                    <input type="text" placeholder="Filtruoti pagal tipą" v-model="filter"
                        class="block p-2 ps-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" />
                </div>
                <div class="col-span-1"></div>
                <div class="col-span-1"></div>
            </div>
        </div>
        <table class="border-collapse table-fixed w-full text-sm">
            <thead>
                <tr>
                    <th class="border-b dark:border-slate-600 font-medium p-3 pl-8 pt-0 text-slate-400 dark:text-slate-200 text-left">Data</th>
                    <th class="border-b dark:border-slate-600 font-medium p-3 pt-0 text-slate-400 dark:text-slate-200 text-left">Transport Department</th>
                    <th class="border-b dark:border-slate-600 font-medium p-3 pr-8 pt-0 text-slate-400 dark:text-slate-200 text-left">Cargo Data</th>
                    <th class="border-b dark:border-slate-600 font-medium p-3 pr-8 pt-0 text-slate-400 dark:text-slate-200 text-left">Price</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-800">
                <tr v-for="{created_at, transport_department, cargoData, price, visible} in shipments.data" v-show="visible" class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-b border-slate-100 dark:border-slate-700 p-2 pl-8 text-slate-500 dark:text-slate-400">
                        {{ created_at }}
                    </td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-2 text-slate-500 dark:text-slate-400">
                        {{ transport_department }}
                    </td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-2 pr-8 text-slate-500 dark:text-slate-400">
                        {{ cargoData }}
                    </td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-2 pr-8 text-slate-500 dark:text-slate-400">
                        {{ price }} EUR
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-html="paginationLinks"> </div>

        <nav aria-label="Page navigation example">
        <ul class="inline-flex -space-x-px text-sm m-4">
            <li v-for="({active, label, url}, index) in shipments.meta.links" :key="index">
                <Link
                    as="button"
                    :href="url"
                    :disabled="!url || active"
                    :class="getPaginationClasses(active, index)"
                    >
                    {{ decodeEntities(label) }}
                </Link>
            </li>
        </ul>
        </nav>
      </div>
    </div>
  </template>

  <script setup>
    import { ref, watch } from 'vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    const filter = ref('');
    watch(filter, function(query) {
        props.shipments.data.forEach(shipment => {
        const type = shipment.transport_department.toString().toLowerCase();
        const searchTerm = query.toLowerCase();
        shipment.visible = type.includes(searchTerm);
      });
    });
    const props = defineProps({
        shipments: Object,
        paginationLinks: String,
    });
    const getPaginationClasses = (active, index) => {
        let baseClasses = 'flex items-center justify-center px-3 h-8 border border-gray-300 dark:bg-gray-800 dark:border-gray-700';
        if (index == 0) {
            baseClasses += " ms-0 border-e-0 rounded-s-lg";
        } else if (props.shipments.meta.links.length - 1 == index) {
            baseClasses += " rounded-e-lg";
        }
        if (active) {
            baseClasses += " text-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white";
        } else {
            baseClasses += " leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white";
        }
        return baseClasses;
    };
    const decodeEntities = (encodedString) => {
        let textArea = document.createElement('textarea');
        textArea.innerHTML = encodedString;
        return textArea.value;
    }

  </script>
