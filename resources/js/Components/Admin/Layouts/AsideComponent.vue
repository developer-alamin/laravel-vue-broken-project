
<script setup>
	import Link from '@/Components/Custom/NavLink.vue';
	import { ref, onMounted } from 'vue';
	onMounted(()=>{
		const active = document.querySelector(".nav-link.active");
		
		if (active) {
	
			const patentActive = active.parentElement.parentElement.parentElement;
			patentActive.classList.add("parent");
			console.log(active)
		}
		
		console.log("asd")
		
	})
</script>
<template>
	<article>
		<!-- ======= Sidebar ======= -->
	  <aside id="sidebar" class="sidebar">

	    <ul class="sidebar-nav" id="sidebar-nav">
	    	<!-- Start Dashboard Nav -->
	    	<li class="nav-item">
	    		<Link :href="route('Admin.Home.Page')" :active="route().current('Admin.Home.Page')">
	              <i class="bi bi-grid"></i>
	            	<span>Dashboard</span>
	         	 </Link>
	    	</li>
	      <!-- End Dashboard Nav -->
	      <!-- Start Student Id Nav -->
	      <li class="nav-item">
	        <a class="nav-link collapsed" data-bs-target="#StuId-nav" data-bs-toggle="collapse" href="#">
	          <i class="bi bi-users"></i><span>Customers</span><i class="bi bi-chevron-down ms-auto"></i>
	        </a>
	        <ul id="StuId-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	          <li>
	            <Link :href="route('customers.create')" :active="route().current('customers.create')"> 
	              <i class="bi bi-circle"></i><span>Add Customer</span>
	            </Link>

	          </li>
	          <li>
	            <Link :href="route('customers.index')" :active="route().current('customers.index')"> 
	              <i class="bi bi-circle"></i><span>View Customer</span>
	            </Link>
	          </li>
	        </ul>
	      </li>
	      <!-- End Class Nav -->
	    </ul>


	  </aside><!-- End Sidebar-->
	</article>
</template>