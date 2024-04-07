<template>
    <div v-if="shipments.length != 0" class="shadow-sm overflow-hidden my-5">
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
                    <th
                        class="border-b dark:border-slate-600 font-medium p-3 pl-8 pt-0 text-slate-400 dark:text-slate-200 text-left">
                        Data</th>
                    <th
                        class="border-b dark:border-slate-600 font-medium p-3 pt-0 text-slate-400 dark:text-slate-200 text-left">
                        Tipas</th>
                    <th
                        class="border-b dark:border-slate-600 font-medium p-3 pr-8 pt-0 text-slate-400 dark:text-slate-200 text-left">
                        Krovinio informacija</th>
                    <th
                        class="border-b dark:border-slate-600 font-medium p-3 pr-8 pt-0 text-slate-400 dark:text-slate-200 text-left">
                        Pervežimo kaina</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-800">
                <tr v-for="shipment in filteredShipments">
                    <td
                        class="border-b border-slate-100 dark:border-slate-700 p-2 pl-8 text-slate-500 dark:text-slate-400">
                        {{ shipment.created_at }}</td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-2 text-slate-500 dark:text-slate-400">
                        {{ shipment.transport_department }}</td>
                    <td
                        class="border-b border-slate-100 dark:border-slate-700 p-2 pr-8 text-slate-500 dark:text-slate-400">
                        {{ shipment.cargoData }}</td>
                    <td
                        class="border-b border-slate-100 dark:border-slate-700 p-2 pr-8 text-slate-500 dark:text-slate-400">
                        {{ shipment.price }} EUR</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            shipments: [],
            filter: '',
        };
    },
    computed: {
        filteredShipments() {
            return this.shipments.filter(shipment => {
                const type = shipment.transport_department.toString().toLowerCase();
                const searchTerm = this.filter.toLowerCase();
                return type.includes(searchTerm);
            });
        }
    },
    created() {
        this.fetchShipments();
    },
    methods: {
        fetchShipments() {
            axios.get('/api/shipments')
                .then(response => {
                    this.shipments = response.data;
                })
                .catch(error => {
                    console.error('Error fetching shipments:', error);
                });
        }
    }
};
</script>
