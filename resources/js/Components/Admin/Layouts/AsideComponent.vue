
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
	      <!-- Start Customers Nav -->
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
	      <!-- End Customers Nav -->
	      <!-- Start Invoice Nav -->
	    <li class="nav-item">
	        <a class="nav-link collapsed" data-bs-target="#inv-nav" data-bs-toggle="collapse" href="#">
	          <i class="bi bi-users"></i><span>Daily Invoice</span><i class="bi bi-chevron-down ms-auto"></i>
	        </a>
	        <ul id="inv-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	          <li>
	            <Link :href="route('invoice.create')" :active="route().current('invoice.create')"> 
	              <i class="bi bi-circle"></i><span>Create Invoice</span>
	            </Link>

	          </li>
	          <li>
	            <Link :href="route('invoice.index')" :active="route().current('invoice.index')"> 
	              <i class="bi bi-circle"></i><span>Today Invoice</span>
	            </Link>
	          </li>
	          <li>
	            <Link :href="route('invoice.list')" :active="route().current('invoice.list')"> 
	              <i class="bi bi-circle"></i><span>All Invoice</span>
	            </Link>
	          </li>
	        </ul>
	    </li>
	      <!-- End Invoice Nav -->
	       <!-- Start Invoice Nav -->
	    <li class="nav-item">
	        <a class="nav-link collapsed" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
	          <i class="bi bi-users"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
	        </a>
	        <ul id="product-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	          <li>
	            <Link :href="route('product.create')" :active="route().current('product.create')"> 
	              <i class="bi bi-circle"></i><span>Add Product</span>
	            </Link>
	          </li>
	          <li>
	            <Link :href="route('product.index')" :active="route().current('product.index')"> 
	              <i class="bi bi-circle"></i><span>View Product</span>
	            </Link>
	          </li>
	          <li>
	            <Link :href="route('product.index')" :active="route().current('product.index')"> 
	              <i class="bi bi-circle"></i><span>Product Update</span>
	            </Link>
	          </li>
	        </ul>
	    </li>
	      <!-- End Invoice Nav -->
	    </ul>


	  </aside><!-- End Sidebar-->
	</article>
</template>