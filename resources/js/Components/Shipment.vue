<template>
    <div>
      <Head title="Shipments" />
      <h1 class="mb-8 text-3xl font-bold">Shipments</h1>

      <div class="bg-white rounded-md shadow overflow-x-auto">
        <table class="w-full whitespace-nowrap">
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">ID</th>
            <th class="pb-4 pt-6 px-6">Transport Department</th>
            <th class="pb-4 pt-6 px-6">Distance</th>
            <th class="pb-4 pt-6 px-6">Num cars</th>
            <th class="pb-4 pt-6 px-6">Cargo Weight</th>
          </tr>
          <tr v-for="shipment in $page.props.shipments" :key="shipment.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
            <td class="border-t">
                {{ shipment.id }}
            </td>
            <td class="border-t">
                {{ shipment.transport_department }}
            </td>
            <td class="border-t">
                {{ shipment.distance }}
            </td>
            <td class="border-t">
                {{ shipment.num_cars }}
            </td>
            <td class="border-t">
                {{ shipment.cargo_weight }}
            </td>
          </tr>
        </table>
      </div>
    </div>
  </template>

  <script>
  import { Head, Link } from '@inertiajs/inertia-vue3'

  export default {
    components: {
      Head,
      Link,
    },
  }
  </script>
