<script setup>
	import { Head, Link } from '@inertiajs/vue3';
	import InvoiceListComp from "@/Components/Admin/Invoice/ListComponent.vue";
	const props = defineProps({invoice:Object});
</script>
<template>
	<Head title="Invoice All List Page" />
    <AdminLayout>
       <InvoiceListComp :invoice="props.invoice"></InvoiceListComp>
    </AdminLayout>
	
</template>