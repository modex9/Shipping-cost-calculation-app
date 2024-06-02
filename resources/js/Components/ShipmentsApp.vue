<template>
    <ShipmentCalcForm/>
    <ShipmentsList :shipments="shipments"></ShipmentsList>
</template>

<script setup>
    import ShipmentsList from "./ShipmentsList.vue";
    import ShipmentCalcForm from "./ShipmentCalcForm.vue";
    const props = defineProps({
        shipments: Object
    });
</script>
