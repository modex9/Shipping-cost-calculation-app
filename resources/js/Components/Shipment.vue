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
      </div>
    </div>
  </template>

  <script setup>
    import { ref, watch } from 'vue';
    import { Head } from '@inertiajs/inertia-vue3'
    const filter = ref('');
    watch(filter, function(query) {
        props.shipments.data.forEach(shipment => {
        const type = shipment.transport_department.toString().toLowerCase();
        const searchTerm = query.toLowerCase();
        shipment.visible = type.includes(searchTerm);
      });
    });
    const props = defineProps({
        shipments: Object
    });
  </script>
