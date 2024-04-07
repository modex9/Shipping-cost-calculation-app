<template>
    <div class="shadow-sm overflow-hidden my-5">
        <table v-if="shipments.length != 0" class="border-collapse table-fixed w-full text-sm">
            <thead>
            <tr>
                <th class="border-b dark:border-slate-600 font-medium p-3 pl-8 pt-0 text-slate-400 dark:text-slate-200 text-left">Data</th>
                <th class="border-b dark:border-slate-600 font-medium p-3 pt-0 text-slate-400 dark:text-slate-200 text-left">Tipas</th>
                <th class="border-b dark:border-slate-600 font-medium p-3 pr-8 pt-0 text-slate-400 dark:text-slate-200 text-left">Krovinio informacija</th>
                <th class="border-b dark:border-slate-600 font-medium p-3 pr-8 pt-0 text-slate-400 dark:text-slate-200 text-left">Pervežimo kaina</th>
            </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-800">
            <tr v-for="shipment in shipments">
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ shipment.created_at }}</td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ shipment.transport_department }}</td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">{{ shipment.cargoData }}</td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">{{ shipment.price }} EUR</td>
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
        shipments: []
      };
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
