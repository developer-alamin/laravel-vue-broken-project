<script setup>
	import { Head, Link } from '@inertiajs/vue3';
	import InvoiceShowComp from "@/Components/Admin/Invoice/ShowComponent.vue";
	const props = defineProps({data:Object});
</script>
<template>
	<Head title="Invoice Show Page" />
    <AdminLayout>
       <InvoiceShowComp :data="props.data"></InvoiceShowComp>
    </AdminLayout>
	
</template>