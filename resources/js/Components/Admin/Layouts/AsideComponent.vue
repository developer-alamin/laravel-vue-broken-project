
<script setup>
	import Link from '@/Components/Custom/NavLink.vue';
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
	          <i class="bi bi-menu-button-wide"></i><span>Student Id</span><i class="bi bi-chevron-down ms-auto"></i>
	        </a>
	        <ul id="StuId-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	          <li>
	            <Link :href="route('Admin.View.Id.Page')" :active="route().current('Admin.View.Id.Page')"> 
	              <i class="bi bi-circle"></i><span>View Student Id</span>
	            </Link>
	          </li>
	        </ul>
	      </li>
	      <!-- End Class Nav -->
	      <!-- Start Class Nav -->
	      <li class="nav-item">
	        <a class="nav-link collapsed" data-bs-target="#Class-nav" data-bs-toggle="collapse" href="#">
	          <i class="bi bi-menu-button-wide"></i><span>Class</span><i class="bi bi-chevron-down ms-auto"></i>
	        </a>
	        <ul id="Class-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	          <li>
	            <Link :href="route('Admin.Class.View.Page')" :active="route().current('Admin.Class.View.Page')">
	              <i class="bi bi-circle"></i><span>View Class</span>
	            </Link>
	          </li>
	          
	        </ul>
	      </li>
	      <!-- End Class Nav -->
	      <!-- Start Department Nav -->
	      <li class="nav-item">
	        <a class="nav-link collapsed" data-bs-target="#Department-nav" data-bs-toggle="collapse" href="#">
	          <i class="bi bi-menu-button-wide"></i><span>Department </span><i class="bi bi-chevron-down ms-auto"></i>
	        </a>
	        <ul id="Department-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	          <li>
	            <a href="">
	              <i class="bi bi-circle"></i><span>Department Add</span>
	            </a>
	          </li>
	          <li>
	            <a href="">
	              <i class="bi bi-circle"></i><span>Department List</span>
	            </a>
	          </li>
	        </ul>
	      </li>
	      <!-- End Department Nav -->
	      <!-- Start Taka Nav -->
	      <li class="nav-item">
	        <a class="nav-link collapsed" data-bs-target="#Taka-nav" data-bs-toggle="collapse" href="#">
	          <i class="bi bi-menu-button-wide"></i><span>Taka </span><i class="bi bi-chevron-down ms-auto"></i>
	        </a>
	        <ul id="Taka-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	          <li>
	            <a href="">
	              <i class="bi bi-circle"></i><span>View Taka</span>
	            </a>
	          </li>
	        </ul>
	      </li>
	      <!-- End Taka Nav -->
	      <!-- Start Student Nav -->
	      <li class="nav-item">
	        <a class="nav-link collapsed" data-bs-target="#Student-nav" data-bs-toggle="collapse" href="#">
	          <i class="bi bi-menu-button-wide"></i><span>Student </span><i class="bi bi-chevron-down ms-auto"></i>
	        </a>
	        <ul id="Student-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	          <li>
	            <a href="">
	              <i class="bi bi-circle"></i><span>View Student</span>
	            </a>
	          </li>
	        </ul>
	      </li>
	      <!-- End Student Nav -->
	      <!-- Start Invoise Payment Nav -->
	      <li class="nav-item">
	        <a class="nav-link collapsed" data-bs-target="#InvPayment-nav" data-bs-toggle="collapse" href="#">
	          <i class="bi bi-menu-button-wide"></i><span>Invoise Payment</span><i class="bi bi-chevron-down ms-auto"></i>
	        </a>
	        <ul id="InvPayment-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	          <li>
	            <a href="">
	              <i class="bi bi-circle"></i><span>Payment Paid</span>
	            </a>
	          </li>
	           <li>
	            <a href="">
	              <i class="bi bi-circle"></i><span>Payment Unpaid</span>
	            </a>
	          </li>
	           <li>
	            <a href="">
	              <i class="bi bi-circle"></i><span>Payment Invoice</span>
	            </a>
	          </li>
	        </ul>
	      </li>
	      <!-- End Student Nav -->


	    </ul>

	  </aside><!-- End Sidebar-->
	</article>
</template>