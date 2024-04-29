<script setup>
	import IdAddComponent from "@/Components/Admin/Id/ViewIdComponent.vue";
	import { Head, Link } from '@inertiajs/vue3';
  const props = defineProps({viewId:Object});
</script>
<template>
	<Head title="Student Id Page" />
    <AdminLayout>
      <IdAddComponent :viewId="props.viewId"></IdAddComponent>
    </AdminLayout>
	
</template>