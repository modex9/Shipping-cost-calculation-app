<template>
    <div>
      <Head title="Shipments" />
      <h1 class="mb-8 text-3xl font-bold">Shipments</h1>

      <div class="bg-white rounded-md shadow overflow-x-auto">
        <table class="w-full whitespace-nowrap">
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6">Data</th>
            <th class="pb-4 pt-6">Transport Department</th>
            <th class="pb-4 pt-6">Cargo Data</th>
            <th class="pb-4 pt-6">Price</th>
          </tr>
          <tr v-for="{created_at, transport_department, cargoData, price} in $page.props.shipments.data" :key="{id}" class="hover:bg-gray-100 focus-within:bg-gray-100">

            <td class="border-t">
                {{ created_at }}
            </td>
            <td class="border-t">
                {{ transport_department }}
            </td>
            <td class="border-t">
                {{ cargoData }}
            </td>
            <td class="border-t">
                {{ price }} EUR
            </td>
          </tr>
        </table>
      </div>
    </div>
  </template>

  <script setup>
    import { Head, Link } from '@inertiajs/inertia-vue3'
  </script>
