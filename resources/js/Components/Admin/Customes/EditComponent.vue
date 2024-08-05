<script setup>
	import { ref } from 'vue';
	
	import {useForm,usePage,Link,router} from '@inertiajs/vue3';
	const props = defineProps({customer:Object});
	const lodding = ref("<strong>Processing...</strong>");
	
	const getCustomer = () => {
		return props.customer;
	}
	const form = useForm({
		id:getCustomer().id,
	    name:getCustomer().name,
	    customer_id:getCustomer().customer_id,
	    phone:getCustomer().phone,
	    email:getCustomer().email,
	    village:getCustomer().village,
	    nationals:getCustomer().national,
	    father:getCustomer().father,
	    mother:getCustomer().mother,
	    mobile:'',
	    mail:'',
	    img:getCustomer().avatar,
	    file:''
	});
	const editPreImg = ref('')
	const imgPreview = (event)=>{
       const file = event.target.files[0];
       form.img = file;
       form.file = file;
       editPreImg.value = URL.createObjectURL(file);
	}
	const update = ()=>{
		const updateBtn = document.querySelector(".updateBtn");
		router.post(route("customers.update",form.id),{
			 _method: 'put',
			 form,
			 preserveScroll: true,
			onBefore:()=>{
				updateBtn.innerHTML = lodding.value;
			},
			onSuccess:()=>{
				updateBtn.innerHTML = "Update";
		   },
		   onError:()=>{
		   	Toastify({
	            text: "Submit Error",
	            gravity: "bottom",
	            position: "center",
	            className: "error",
	            style: {
	                background: "linear-gradient(to right, #ff0e11, #b91a1a)",
	            }
	        }).showToast();
			
			updateBtn.innerHTML = "Update";
		   }
		})
	}
	
</script>
<template>
	<article>
		<p>{{form.img}}</p>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h4>New Customers</h4>

						<img class="customerimg ms-auto" v-if="editPreImg" :src="editPreImg">
                        <img class="customerimg ms-auto" v-else='' :src="form.img" >
					</div>
					<div class="card-body">
						<form @submit.prevent="update()">
							<div class="row">
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="img">Photo:</label>
									<input @input="imgPreview($event)" type="file" name="file" accept="image/*" id="file" class="form-control" >
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="name">Name:</label>
									<input v-model="form.name" type="text" name="name" id="name" class="form-control" >
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="customer_id">Customer Id:</label>
									<input v-model="form.customer_id" type="text" name="customer_id" id="customer_id" class="form-control">
									
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="phone">Phone:</label>
									<input v-model="form.phone" type="text" name="phone" id="phone" class="form-control">
									
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="email">Email:</label>
									<input v-model="form.email" type="email" name="email" id="email" class="form-control" >
									
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label  for="village">Village:</label>
									<input v-model="form.village" type="text" name="village" id="village" class="form-control">
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="nationals">National Number:</label>
									<input v-model="form.nationals" type="text" name="nationals" id="nationals" class="form-control">
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="father">Father:</label>
									<input v-model="form.father" type="text" name="father" id="father" class="form-control" >
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="mother">Mother:</label>
									<input v-model="form.mother" type="text" name="mother" id="mother" class="form-control">
								</div>
								
								<div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4">
									<input v-model="form.mobile" type="checkbox" name="mobile" id="mobile"> 
									<label for="mobile" class="ms-1">
										Are You Mobile Send SMS:
									</label>
									
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4">
									<input v-model="form.mail" type="checkbox" name="mail" id="mail"> 
									<label for="mail" class="ms-1">
										Are You Email Send SMS:
									</label>
									
								</div>
								<div class="col-12 mt-3">
									<button type="submit" class="btn btn-outline-primary form-control updateBtn">Update</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</article>
</template>