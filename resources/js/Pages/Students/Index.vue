<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link,useForm} from '@inertiajs/vue3';
import { Result } from 'postcss';
import Swal from 'sweetalert2';

const props=defineProps({
    students:{type:Object}
});
//Constante para usar el formulario
const form=useForm({
    id:''
});
const deleteStudents=(id,name)=>{
    const alert=Swal.mixin({
        buttonsStyling:true
    });
    alert.fire({
        title:'Are you sure delete   '+name+' ?',
        icon:'question',showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i>yes,delete',
        cancelButtonText:'<i class="fa-solid fa-ban"></i>Cancel'

    }).then((result)=>{
        if(result.isConfirmed){
            form.delete(route('Students.destroy',id ));
        }
    });
}
</script>
<template>
    <Head title="Students" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students</h2>
        </template>

        <div class="py-12"> 
            <div class="bg-white grid v-screen place-items-center">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="mt-3 mb-3 flex">
                        <Link :href="route('Students.create')"
                        :class="'px-4 py-2 bg-green-800 text-white border rounded-mb font-semibold text-xs'"             
                        >
                            <i class="fa-solid fa-plus-circle"></i>Add 
                        </Link>                     
                    </div>
                </div>
                <div class="bg-white grid v-screen place-items-justify" >
                    <table class="table-auto border border-gray-400">
                       <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-4">#</th>
                            <th class="px-4 py-4">Document</th>
                            <th class="px-4 py-4">Names</th>
                            <th class="px-4 py-4">Telephone</th>
                            <th class="px-4 py-4">Email</th>
                            <th class="px-4 py-4">Address </th>
                            <th class="px-4 py-4">City</th>
                            <th class="px-4 py-4">Semester</th>
                            <th class="px-4 py-4"></th>
                            <th class="px-4 py-4"></th>
                        </tr>
                       </thead>            
                    <tbody>
                        <tr v-for="std, i in students" :key="std.id">    
                            <td class="border border-gray-400 px-4 py-4">{{ i+1 }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ std.Document }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ std.Names }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ std.Telephone }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ std.Email }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ std.Address }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ std.City }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ std.Semester }}</td>
                            <td class="border border-gray-400 px-4 py-4"> 
                                <Link :href="route('Students.edit',std.id)"
                                    :class="'px-4 py-2 bg-yellow-400 text-white border rounded-mb font-semibold text-xs'">
                                    <i class="fa-solid fa-edit"></i> 
                                </Link> 
                            </td>
                            <td class="border border-gray-400 px-4 py-4"> 
                                <DangerButton @click="deleteStudents(std.id,std.Names)">
                                    <i class="fa-solid fa-trash"></i>
                                </DangerButton>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
