<template>
    <ShipmentCalcForm/>
    <ShipmentsList :shipments="shipments" :paginationLinks="paginationLinks"></ShipmentsList>
</template>

<script setup>
    import ShipmentsList from "./ShipmentsList.vue";
    import ShipmentCalcForm from "./ShipmentCalcForm.vue";
    const props = defineProps({
        shipments: Object,
        paginationLinks: String,
    });
</script>
