<script setup>
    import moment from "moment";
    import {ref,reactive} from 'vue';
    import {lodding} from "@/data/Custom.js";
    import {useForm,usePage,Link,router} from '@inertiajs/vue3';
    const page = usePage();
    const props = defineProps({errors:Object,classData:Object});
    const classCreateToggle = ref(false);
    const classUpdateToggle = ref(false);
    $(document).ready( function () {
		$('#Table').DataTable(
			{
			responsive: true,
			pageLenght: [5],
			lengthMenu: [5, 10, 25, 50, 100],
			}
		);
	});
    const form = useForm({
        name:''
    });

    const CreateClass = ()=>{
        const CreateClassBtn = document.querySelector(".CreateClassBtn");
        form.post(route('Admin.Class.Create.Page'),{
            onBefore:()=>{
                CreateClassBtn.innerHTML = lodding.value
            },
            onSuccess:()=>{
                Swal.fire({
                    title: "Success!",
                    text: "Your Class Created Success !",
                    icon: "success"
                });
                form.reset();
                CreateClassBtn.innerHTML = "Create";
                classCreateToggle.value = false;
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
                form.reset();
                CreateClassBtn.innerHTML = "Create";
            }
        });
    }
    const getClass = ()=>{
        return props.classData;
    }
    const edit = useForm({
        edit:''
    });
    const classEditModal = (i)=>{
        classUpdateToggle.value = !classUpdateToggle.value;
        edit.edit = props.classData[i];
    }

    const classUpdateBtn = ()=>{
        const UpdateClassBtn = document.querySelector(".UpdateClassBtn");
       edit.post(route("Admin.Class.Update.Page"),{
            preserveScroll:true,
            onBefore:()=>{
                UpdateClassBtn.innerHTML = lodding.value;
            },
            onSuccess:()=>{
                Toastify({
                    text: "Updated Success",
                    gravity: "bottom",
                    position: "center",
                    className: "error",
                    style: {
                        background: "linear-gradient(to right, #20ef3b, #41ad0b)",
                    }
                }).showToast();
                UpdateClassBtn.innerHTML = "Update";
                classUpdateToggle.value = false;
            },
            onError:()=>{
                UpdateClassBtn.innerHTML = "Update";
                Toastify({
                    text: "Update Error",
                    gravity: "bottom",
                    position: "center",
                    className: "error",
                    style: {
                        background: "linear-gradient(to right, #ff0e11, #b91a1a)",
                    }
                }).showToast();
                classUpdateToggle.value = false;
            }
       });
    }
    const Delete = reactive({
		id:''
	});
    const classDeleteBtn = (id)=>{
        Delete.id = id;
		Swal.fire({
			title: "Are you sure?",
			text: "You won't be able to Delete this!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes",
			
		}).then((result) => {
		if (result.isConfirmed) {
			router.post(route("Admin.Class.Delete.Page"),Delete,{
				preserveScroll: true,
				onSuccess:()=>{
					Swal.fire({
						title: "Deleted!",
						text: "Your Data has been deleted.",
						icon: "success"
					});
				}
			});
		}
		});
		
	}

</script>
<template>
    <article>
        <div class="row" v-if="classCreateToggle">
            <div class="col-12 col-md-8 col-lg-6 m-auto">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Class:</label>
                                    <input v-model="form.name" type="text"  class="form-control" placeholder="Enter Class Name...">
                                    <span class="errors" v-if="$page.props.errors.name"><i class="fa fa-exclamation-circle"></i> {{ $page.props.errors.name }}</span>

                                </div>
                                <div class="col-12 mt-2">
                                    <button @click.prevent="CreateClass()" type="submit" class="CreateClassBtn btn btn-outline-primary form-control">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-if="classUpdateToggle">
            <div class="col-12 col-md-8 col-lg-6 m-auto">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Name:</label>
                                    <input v-model="edit.edit.name" type="text"  class="form-control" placeholder="Enter Class Name...">
                                </div>
                                <div class="col-12">
                                    <label for="">Status:</label>
                                    <select v-model="edit.edit.status" class="form-select">
                                        <option value="active">Active</option>
                                        <option value="deactive">Deactive</option>
                                    </select>
                                </div>
                                <div class="col-12 mt-2">
                                    <button @click.prevent="classUpdateBtn()" type="submit" class="UpdateClassBtn btn btn-outline-primary form-control">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center ">
                        <h4>Class List And Create</h4>
                        <button v-if="!classUpdateToggle" @click="classCreateToggle = !classCreateToggle" Class="btn btn-outline-primary ms-auto">Create</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="Table" class="table table-bordered  table-hover table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sr</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Create</th>
                                        <th>Update</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="classTbody">
                                    <tr v-for="(data,i) in getClass()" :key="i" class="text-center">
                                        <td>{{i+1}}</td>
                                        <td>{{data.name}}</td>
                                        <td><p :class="data.status">{{data.status}}</p></td>
                                        <td>{{ moment(data.created_at).format("DD-MM-yy") }}</td>
                                        <td>{{moment(data.updated_at).format("DD-MM-yy")}}</td>
                                        <td class="actionTd">
											<button @click="classEditModal(i)" class="btn btn-outline-success">
												<i class="fa fa-edit"></i>
											</button>
											<Link :href="route('Admin.Class.Users.Show.Page',data.id)" class="btn btn-outline-primary">
												<i class="fa fa-eye"></i>
											</Link>
											<button @click="classDeleteBtn(data.id)" class="btn btn-outline-danger">
												<i class="fa fa-trash"></i>
											</button>
										</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</template>

<style scoped>
    
</style>